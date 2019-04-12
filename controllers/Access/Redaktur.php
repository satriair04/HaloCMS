<?php
	class Redaktur extends CI_Controller{
		
		private $article;
		private $image;
		
		public function __construct(){
			parent::__construct();
			if($this->session->userdata('acc_role') != 2){
				redirect(site_url(''));
			}
			$this->load->model('Article_model');
			$this->load->model('Image_model');
			$this->load->library('form_validation');
			$this->article = new $this->Article_model;
			$this->image = new $this->Image_model;
		}
		
		//tampilkan semua list artikel dalam bentuk tab dgn urutan berikut
		public function index(){
			
			$this->load_list();
		}
		
		private function load_list(){
			$pre_data['result'] = $this->article->article_list();
			$data['view'] = $this->load->view('page/_redaktur/redaktur_list', $pre_data, TRUE);
			$this->load->view('_baseweb', $data);
		}
		
		public function read($article_id = NULL){
			//Retrieve data
			$pre_data['result'] = $this->article->retrieve_article($article_id);
			//Check availability
			if(!$pre_data['result']){
				$this->session->set_flashdata('read_article_failed', 'Artikel tidak ditemukan.');
				redirect(site_url('access/redaktur/index/'));
			}
			//Check article privilege
			if($pre_data['result']['article_editor'] == $this->session->userdata('acc_id')){
				$pre_data['action'] = TRUE;
			}else{
				$pre_data['action'] = FALSE;
			}
			//Send n load
			$pre_data['img_gallery'] = $this->image->article_files($article_id);
			$data['view'] = $this->load->view('page/_redaktur/redaktur_read', $pre_data, TRUE);
			$this->load->view('_baseweb', $data);
		}
		
		public function claim($article_id = NULL){
			$check = $this->article_validation($article_id);
			if($check){
				//Jika true maka berarti artikel ini memang miliknya. double claim
				$this->session->set_flashdata('double_claim', 'Anda sudah mengklaim artikel ini.');
				redirect(site_url('access/redaktur/read/'.$article_id));
			}else{
				$result = $this->article->claim_article($article_id, $this->session->userdata('acc_id'));
				if($result){
					$this->session->set_flashdata('claim_success', 'Kini kamu bisa memproses artikel ini.');
					redirect(site_url('access/redaktur/read/'.$article_id));
				}else{
					$this->session->set_flashdata('claim_failed', 'Artikel ini sedang diproses oleh redaktur lain. Kamu tidak bisa mengklaimnya.');
					redirect(site_url('access/redaktur/read/'.$article_id));
				}
			}
		}
		
		public function unclaim($article_id = NULL){
			$check = $this->article->unclaim_article($article_id, $this->session->userdata('acc_id'));
			if($check){
				$this->session->set_flashdata('unclaim_success', 'Kini kamu telah berhenti memproses artikel ini.');
				redirect(site_url('access/redaktur/read/'.$article_id));
			}else{
				$this->session->set_flashdata('unclaim_failed', 'Terjadi kesalahan. Kamu tidak bisa unclaim.');
				redirect(site_url('access/redaktur/read/'.$article_id));
			}
		}
		
		public function accept($article_id = NULL){
			$check = $this->article->accept_article($article_id, $this->session->userdata('acc_id'));
			if($check){
				$this->session->set_flashdata('accepting_success', 'Artikel telah diterima. Saatnya terbitkan ke portal berita.');
				redirect(site_url('access/redaktur/read/'.$article_id));
			}else{
				$this->session->set_flashdata('accepting_failed', 'Kamu tidak bisa menyetujui penerbitan artikel ini.');
				redirect(site_url('access/redaktur/read/'.$article_id));
			}
		}
		
		//belum di cek
		public function reject($article_id = NULL){
			$check = $this->article->reject_article($article_id, $this->session->userdata('acc_id'));
			if($check){
				$this->session->set_flashdata('rejection_success', 'Kamu menolak artikel ini untuk diterbitkan pada portal berita. Artikel telah direset');
				redirect(site_url('access/redaktur/read/'.$article_id));
			}else{
				$this->session->set_flashdata('rejection_failed', 'Kamu tidak berhak untuk menolak penerbitan artikel ini.');
				redirect(site_url('access/redaktur/read/'.$article_id));
			}
		}
		
		//belum di cek
		public function downgrade($article_id = NULL){
			$check = $this->article->downgrade_article($article_id, $this->session->userdata('acc_id'));
			if($check){
				$this->session->set_flashdata('downgrade_success', 'Artikel diturunkan, Silahkan proses ulang artikel ini.');
				redirect(site_url('access/redaktur/read/'.$article_id));
			}else{
				$this->session->set_flashdata('downgrade_failed', 'Kamu tidak berhak untuk menurunkan status artikel ini.');
				redirect(site_url('access/redaktur/read/'.$article_id));
			}
		}
		
		//belum di cek
		public function update($article_id = NULL){
			//Set rules
			$validate = new $this->form_validation;
			$validate->set_rules('title', 'Judul', 'required');
			$validate->set_rules('content', 'Konten', 'required');
			
			//Validation n Retrieve
			$check = $this->article_validation($article_id);
			if(!$check){
				$this->session->set_flashdata('update_error', 'Kamu tidak berhak untuk mengubah artikel ini.');
				redirect(site_url('access/redaktur/read/'.$article_id));
			}
			
			//Load page.
			$pre_data['result'] = $check;
			$pre_data['section'] = $this->article->retrieve_section();
			$data['view'] = $this->load->view('page/_redaktur/redaktur_update', $pre_data, TRUE);
			$this->load->view('_baseweb', $data);
			
			//Form validate
			if($validate->run()){
				$form = $this->input->post();				
				$title = $form['title'];
				$content = $form['content'];
				$section = $pre_data['result']['article_section'];
				if($this->article->edit_article($article_id, $title, $content, $section)){
					$this->session->set_flashdata('update_success', 'Artikel ini berhasil diubah.');
					redirect(site_url('access/redaktur/read/'.$article_id));
				}
			}else{
				$this->session->set_flashdata('update_failed', 'Artikel ini belum dapat disimpan.');
			}		
		}
		
		public function original($article_id = NULL){
			$check = $this->article->rollback_article($article_id, $this->session->userdata('acc_id'));
			if($check){
				$this->session->set_flashdata('rollback_success', 'Artikel ini berhasil diubah ke kondisi asli dari wartawan.');
				redirect(site_url('access/redaktur/update/'.$article_id));
			}else{
				$this->session->set_flashdata('rollback_failed', 'Artikel ini gagal diubah ke kondisi asli dari wartawan.');
				redirect(site_url('access/redaktur/update/'.$article_id));
			}
		}
		
		private function article_validation($article_id = NULL){
			$data = $this->article->retrieve_article($article_id);
			if($data['article_editor'] == $this->session->userdata('acc_id')){
				return $data;
			}else{
				return FALSE;
			}
		}
	}
	