<?php
	class Profile extends CI_Controller{
		
		private $account;
		private $laporan;
		
		public function __construct(){
			parent::__construct();
			if(!$this->session->userdata('status_login')){
				redirect(site_url(''));
			}
			$this->load->model('Account_model');
			$this->load->model('Laporan_model');
			$this->load->library('form_validation');
			$this->account = new $this->Account_model;
			$this->laporan = new $this->Laporan_model;
		}
		
		public function index(){
			$acc_id = $this->session->userdata('acc_id');
			$this->user($acc_id);
			if(isset($_POST['btnSubmit'])){
				$this->password();
			}
		}
		
		public function user($acc_id = NULL){
			$pre_data['result'] = $this->account->retrieve_acc($acc_id);
			if(!$pre_data['result'] || $acc_id == NULL){
				$this->session->set_flashdata('account_not_found', 'Akun ini tidak ditemukan');
				redirect(site_url('access/laporan'));
			}
			$bulan = (int) date('n', time());
			$tahun = (int) date('Y', time());
			$last_bulan = date("n",strtotime("-1 month"));
			$last_tahun = date("Y",strtotime("-1 month"));
			$pre_data['overall'] = $this->laporan->user_total_status($acc_id);
			$pre_data['thismonth'] = $this->laporan->user_count_status($acc_id, $bulan, $tahun);
			$pre_data['lastmonth'] = $this->laporan->user_count_status($acc_id, $last_bulan, $last_tahun);
			$data['view'] = $this->load->view('page/_profile/profile_read', $pre_data, TRUE);
			$this->load->view('_baseweb', $data);
		}
		
		private function password(){
			//Untuk ganti password
			/*
			*	Form ubah password : view/page/_profile/profile_password.php
			*	Form diatas muncul tergantung kondisi pada load view di : view/page/_profile/profile_read.php
			*/
			$validate = new $this->form_validation;
			$validate->set_rules('oldname', 'Username', 'required');
			$validate->set_rules('oldpass', 'oldPassword', 'required');
			$validate->set_rules('newpass', 'newPassword', 'required');
			$validate->set_rules('conpass', 'comparePassword', 'required');
			if($validate->run()){
				$form = $this->input->post();
				$username = $form['oldname'];
				$old_pwd = $form['oldpass'];
				$new_pwd = $form['newpass'];
				$chk_pwd = $form['conpass'];
				if($new_pwd == $chk_pwd){
					$check = $this->account->update_password($username, $old_pwd, $new_pwd);
					if($check){
						$this->session->set_flashdata('pwd_change_success', 'Password kamu berhasil diubah');
						redirect(site_url('access/profile/index'));
					}elseif(!$check){
						$this->session->set_flashdata('pwd_change_failed', 'Akun tidak valid. Password baru gagal diterapkan');
						redirect(site_url('access/profile/index'));
					}
				}else{
					$this->session->set_flashdata('pwd_confirm_failed', 'Terjadi kesalahan dalam mengkonfirmasi password baru');
					redirect(site_url('access/profile/index'));
				}
			}
		}
		
		//END CLASS
	}