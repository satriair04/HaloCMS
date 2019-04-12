<?php
	class Wartawan extends CI_Controller{
		
		private $article;
		private $image;
		
		public $kode_artikel;
		
		public function __construct(){
			parent::__construct();
			if($this->session->userdata('acc_role') != 3){
				redirect(site_url(''));
			}
			$this->load->model('Article_model');
			$this->load->model('Image_model');
			$this->load->library('form_validation');
			$this->article = new $this->Article_model;
			$this->image = new $this->Image_model;
		}
		
		public function index(){
			$this->show_list();
		}
		
		private function show_list(){
			$pre_data['result'] = $this->article->article_list();
			$data['view'] = $this->load->view('page/_wartawan/wartawan_list', $pre_data, TRUE);
			$this->load->view('_baseweb', $data);
		}
		
		public function read($article_id = NULL){
			//Retrieve n check article
			$pre_data['result'] = $this->article->retrieve_article($article_id);
			if(!$pre_data['result']){
				$this->session->set_flashdata('read_article_failed', 'Artikel tidak ditemukan.');
				redirect(site_url('access/wartawan/index/'));
			}
			
			//Check privilege
			if($pre_data['result']['article_penulis'] == $this->session->userdata('acc_id')){
				$pre_data['action'] = TRUE;
			}else{
				$pre_data['action'] = FALSE;
			}
			
			//Load page
			$pre_data['img_gallery'] = $this->image->article_files($article_id);
			$data['view'] = $this->load->view('page/_wartawan/wartawan_read', $pre_data, TRUE);
			$this->load->view('_baseweb', $data);
			
		}
		
		public function create(){
			//Set rules
			$validate = new $this->form_validation;
			$validate->set_rules('title', 'Artikel', 'required');
			$validate->set_rules('content', 'textEditor', 'required');
			
			//Retrieve section n load page
			$pre_data['section'] = $this->article->retrieve_section();
			$data['view'] = $this->load->view('page/_wartawan/wartawan_create', $pre_data, TRUE);
			$this->load->view('_baseweb', $data);
			
			//Form validate
			if($validate->run()){
				$form = $this->input->post();
				$title = $form['title'];
				$content = $form['content'];
				$section = $form['section'];
				$creator = $this->session->userdata('acc_id');
				if($this->article->create_article($title, $content, $section, $creator)){
					$this->session->set_flashdata('create_draft_success', 'Draft berhasil dibuat. ');
					redirect(site_url('access/wartawan/index/'));
				}
			}else{
				$this->session->set_flashdata('create_draft_failed', 'Draft tidak dapat disimpan. ');
			}
		}
		
		public function update($article_id = NULL){
			//Set rules
			$validate = new $this->form_validation;
			$validate->set_rules('content', 'Konten', 'required');
			
			//Validation n Retrieve
			$check = $this->article_validation($article_id);
			if(!$check || $check['article_status'] != 1){
				$this->session->set_flashdata('update_draft_failed', 'Artikel ini tidak dapat diubah.');
				redirect(site_url('access/wartawan/read/'.$article_id));
			}
			
			//Action if valid, load section n page
			$pre_data['result'] = $check;
			$pre_data['section'] = $this->article->retrieve_section();
			$data['view'] = $this->load->view('page/_wartawan/wartawan_update', $pre_data, TRUE);
			$this->load->view('_baseweb', $data);
			
			//Form validate
			if($validate->run()){
				$form = $this->input->post();
				$title = $form['artitle'];
				$content = $form['content'];
				$section = $form['section'];
				if($this->article->edit_article($article_id, $title, $content, $section)){
					$this->session->set_flashdata('edit_draft_success', 'Draft artikel kamu berhasil diubah.');
					redirect(site_url('access/wartawan/read/'.$article_id));
				}
			}else{
				$this->session->set_flashdata('edit_draft_error', 'Draft artikel kamu tidak dapat disimpan.');
			}
		}
		
		public function submit($article_id = NULL){
			$check = $this->article->submit_article($article_id, $this->session->userdata('acc_id'));
			if($check){
				$this->session->set_flashdata('article_submit_success', 'Artikel telah diajukan. Saatnya menunggu respon redaktur');
				redirect(site_url('access/wartawan/read/'.$article_id));	
			}else{
				$this->session->set_flashdata('submit_draft_failed', 'Artikel ini tidak dapat kamu ajukan.');
				redirect(site_url('access/wartawan/index/'));
			}
		}
		
		public function unsubmit($article_id = NULL){
			$check = $this->article->unsubmit_article($article_id, $this->session->userdata('acc_id'));
			if($check){
				$this->session->set_flashdata('article_unsubmit_success', 'Pengajuan artikel telah dibatalkan.');
				redirect(site_url('access/wartawan/read/'.$article_id));	
			}else{
				$this->session->set_flashdata('unsubmit_draft_failed', 'Kamu tidak berhak untuk membatalkan pengajuan artikel ini.');
				redirect(site_url('access/wartawan/index/'));
			}
		}
		
		public function remove($article_id = NULL){
			$check = $this->article->remove_article($article_id, $this->session->userdata('acc_id'));
			if($check){
				$this->session->set_flashdata('remove_success', 'Artikel berhasil dihapus.');
				redirect(site_url('access/wartawan/index/'));	
			}else{
				$this->session->set_flashdata('remove_failed', 'Artikel tidak bisa dihapus.');
				redirect(site_url('access/wartawan/index/'));
			}
		}
		
		//Cek apakah artikel masih draft dan asli milik si wartawan yang memiliki session loginnya saat itu
		private function article_validation($article_id = NULL){
			$data = $this->article->retrieve_article($article_id);
			if($data['article_penulis'] == $this->session->userdata('acc_id')){
				return $data;
			}else{
				return FALSE;
			}
		}
		
/*
*
*	//Baris dibawah ini adalah fungsi - fungsi untuk pengelolaan gambar
*
*/ 
		public function files($article_id = NULL){
			$check = $this->article_validation($article_id);
			if(!$check){
				$this->session->set_flashdata('files_failed', 'Kamu tidak adapat mengelola file gambar pada artikel ini.');
				redirect(site_url('access/wartawan/index/'));
			}else{
				$pre_data['result'] = $this->image->article_files($article_id);
				$pre_data['artikel'] = $check;
				$pre_data['kode'] = $check['article_id'];
				//set_flashdata untuk aksi form ke function upload()
				$this->session->set_flashdata('kode', $check['article_id']);
				$data['view'] = $this->load->view('page/_wartawan/wartawan_file_list', $pre_data, TRUE);
				$this->load->view("_baseweb", $data);
			}
			
		}
		
		public function upload(){
			//Load library
			$this->load->library('upload');
			
			//Lokasi : /uploads/[kodeartikel]/
			$kode = $this->session->flashdata('kode');
			$config['upload_path'] = '.'.$this->image->get_path().$kode."/";
			$config['allowed_types'] = 'jpg|png';
			$config['max_size'] = '20000';
			$config['file_name'] = 'Artikel_'.$kode.'_IMG_0.png';
			if(!is_dir($config['upload_path'])){
				mkdir($config['upload_path'], 0777, TRUE);
			}
			//Menetapkan konfigurasi upload file
			$this->upload->initialize($config);
			
			//Submit ditekan, form beraksi
			
			$form = $this->input->post();
			$komentar = $form['komentar'];
				
			if($this->upload->do_upload('fileUpload')){
					
			//Proses upload ke server dilakukan dan hasilnya juga disimpan ke $files['data']
			$files = $this->upload->data();
				
			//Simpan ke database
			$this->image->insert_image($kode, $files['file_name'], $komentar);
			$this->session->set_flashdata('upload_sukses', 'File kamu berhasil ditambahkan ke artikel');
			redirect(site_url('access/wartawan/files/'.$kode));
			}else{
				$this->session->set_flashdata('upload_gagal', 'File kamu tidak dapat ditambahkan ke artikel');
				redirect(site_url('access/wartawan/files/'.$kode));
			}
		}
		
		public function discard($img_id = NULL){
			$get_source = $this->image->get_image($img_id);
			$pre_check = $this->article->retrieve_article($get_source['article_source']);
			if($pre_check['article_penulis'] == $this->session->userdata('acc_id')){
				$check = $this->image->remove_image($img_id);
				if($check){
					$this->session->set_flashdata('img_discard_sukses', 'File pada draft ini telah dihapus');
					redirect(site_url('access/wartawan/files/'.$get_source['article_source']));
				}
			}else{
				$this->session->set_flashdata('img_discard_failed', 'Kamu tidak berhak untuk menghapus file ini');
				redirect(site_url('access/wartawan/index/'));
			}
		}
	}