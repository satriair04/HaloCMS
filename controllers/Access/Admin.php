<?php
	class Admin extends CI_Controller{
		
		private $account;
		
		public function __construct(){
			parent::__construct();
			if($this->session->userdata('acc_role') != 1){
				redirect(site_url(''));
			}
			$this->load->helper('date');
			$this->load->model('Account_model');
			$this->load->library('form_validation');
			$this->account = new $this->Account_model;
			
		}
		
		public function index(){
			$this->read_data();
		}
		
		private function read_data(){
			$pre_data['result'] = $this->account->retrieve_all();
			$data['view'] = $this->load->view('page/_admin/admin_read', $pre_data, TRUE);
			$this->load->view('_baseweb', $data);
		}
		
		//Terlalu beresiko. Tidak dipake
		//private function _remove($id){
		//	$this->account->acc_remove($id);
		//	redirect(site_url('access/admin'));
		//}
		
		//Solusi function remove, toogling banned
		public function banned($acc_id){
			$status = $this->account->acc_banned($acc_id);
			if($status == 'x'){
				$this->session->set_flashdata('toggling_failed', 'Akun dengan kode '.$acc_id.' tidak ditemukan.');
				redirect(site_url('access/admin/index'));
			}else{
				if($status == '1'){
					$this->session->set_flashdata('banned_success', 'Akun dengan kode '.$acc_id.' berhasil dikunci.');
					redirect(site_url('access/admin/index'));
				}else{
					$this->session->set_flashdata('unbanned_success', 'Akun dengan kode '.$acc_id.' diaktifkan kembali.');
					redirect(site_url('access/admin/index'));	
				}
			}	
		}
		
		public function pwd_reset($acc_id){
			$check = $this->account->acc_reset($acc_id);
			if($check){
				$this->session->set_flashdata('pwd_reset_success', 'Password akun dengan kode '.$acc_id.' telah direset.');
				redirect(site_url('access/admin/index'));
			}else{
				$this->session->set_flashdata('pwd_reset_failed', 'Password akun dengan kode '.$acc_id.' gagal direset.');
				redirect(site_url('access/admin/index'));	
			}	
		}
		
		public function create(){
			$validate = new $this->form_validation;
			$validate->set_rules('name', 'Nama', 'required');
			$validate->set_rules('email', 'Email', 'required');
			$validate->set_rules('usrname', 'Username', 'required');
			$data['view'] = $this->load->view('page/_admin/admin_create', '', TRUE);
			$this->load->view('_baseweb', $data);
			if($validate->run()){
				$form = $this->input->post();
				$nama = $form['name'];
				$email = $form['email'];
				$username = $form['usrname'];
				$role = $form['role'];
				if($this->account->acc_create($nama, $email, $username, $role)){
					$role_str = 'Akun '.($role == '2' ? 'Redaktur' : 'Wartawan');
					$this->session->set_flashdata('account_create_success', $role_str.' berhasil dibuat');
					redirect(site_url('access/admin/index'));
				}else{
					$this->session->set_flashdata('account_create_error', 'Username atau E-Mail sudah digunakan');
					redirect(site_url('access/admin/create'));
				}
				
			}
		}
		
		public function update($acc_id = NULL){
			//Set rule
			$validate = new $this->form_validation;
			$validate->set_rules('change_name', 'Nama', 'required');
			$validate->set_rules('change_email', 'Email', 'required');
			//retrieve n check acc_id
			$pre_data['result'] = $this->account->retrieve_acc($acc_id);
			if(!$pre_data['result']){
				$this->session->set_flashdata('account_error', 'Akun tidak dapat diproses');
					redirect(site_url('access/admin/index'));
			}
			$data['view'] = $this->load->view('page/_admin/admin_update', $pre_data, TRUE);
			$this->load->view('_baseweb', $data);
			//validate
			if($validate->run()){
				$form = $this->input->post();
				$nama = $form['change_name'];
				$email = $form['change_email'];
				if($this->account->acc_update($acc_id, $nama, $email) == TRUE){
					$this->session->set_flashdata('account_update_success', 'Akun berhasil diubah');
					redirect(site_url('access/admin/index'));
				}else{
					$this->session->set_flashdata('account_update_error', 'Email sudah digunakan akun lain. Gagal diubah');
					redirect(site_url('access/admin/update/'.$acc_id));
				}
			}
		}
	}
