<?php
	class Auth extends CI_Controller{
		
		private $account;
		
		public function __construct(){
			parent::__construct();
			$this->load->model('Account_model');
			$this->account = new $this->Account_model;
		}
		
		//cek session dan routing halaman. index() dijalankan secara default.
		public function index(){
			// Cek apakah status_login memiliki nilai
			if($this->session->has_userdata('status_login')){
				//Jika true
				$this->switchers();
			}else{
				//jika NULL
				$this->login();
			}
		}
		
		private function switchers(){
			if($this->session->has_userdata('status_login')){
				//Redirecting ke kontroller via URI, akses method index
				switch($this->session->userdata('acc_role')){
					case '1' :redirect(site_url('access/admin/index'));
					break;
					case '2' :redirect(site_url('access/redaktur/index'));
					break;
					case '3' :redirect(site_url('access/wartawan/index'));
					break;
				}
				
			}else{
				//jika tidak ada session akan kembali ke kontroller ini (default)
				redirect(site_url());
			}
		}
		
		private function login(){
			//cek session. Untuk menghindari penimpaan nilai session lama. 
			if($this->session->has_userdata('status_login')){
				//Jika sudah ada kembali ke index.
				redirect(site_url());
			}else{
				//Tampil form login. Jika form login selesai disini maka action form mengarah ke check()
				$this->load->view('login_view');
			}
		}
		
		public function forgot(){
			//cek session. Bila sudah login tak perlu akses function ini
			if($this->session->has_userdata('status_login')){
				//Kembali ke index.
				redirect(site_url());
			}else{
				//Tampil form reset password
				$this->load->view('forgot_view');
			}
		}
		
		public function request(){
			//Set rules
			$validate = new $this->form_validation;	
			$validate->set_rules('usr_name', 'Username', 'required|alpha_numeric');
			$validate->set_rules('usr_mail', 'Email', 'required');
			// validasi form apakah sesuai aturan. mencegah injeksi sql
			if($validate->run()){
				$post = $this->input->post();
				$user = $post['usr_name'];
				$mail = $post['usr_mail'];
				//Mengambil result dalam bentuk row array dengan kunci asosiatifnya adalah nama field database
				$result = $this->account->reset_request($user, $mail);
				//apakah akun ada ? jika ada buat session
				if($result){
					if($result['acc_role'] == 1){
						$this->session->set_flashdata('extreme_reset', 'Akun administrator kamu dikunci untuk sementara. Silahkan ubah password kamu dengan fungsi hash md5 dan atur boolean reset kembali ke 0 secara eksplisit di database.');
					}else{
						$this->session->set_flashdata('request_success', 'Permintaan reset password telah diajukan');
					}
				}else{
					$this->session->set_flashdata('request_failed', 'Permintaan reset password ditolak');
				}
			}
			// Arahkan kembali ke index untuk di cek lagi. 
			redirect(site_url('Auth'));	
		}
		
		//sesuai dengan pada form login_view, perintah ini dijalankan. setelah selesai akan langsung redirect
		public function check(){
			//Set rules	
			$validate = new $this->form_validation;	
			$validate->set_rules('usr_name', 'Username', 'required|alpha_numeric');
			$validate->set_rules('usr_pass', 'Password', 'required|alpha_numeric');
			// validasi form apakah sesuai aturan. mencegah injeksi sql
			if($validate->run()){
				$post = $this->input->post();
				$usr = $post['usr_name'];
				$pwd = $post['usr_pass'];
				//Mengambil result dalam bentuk row array dengan kunci asosiatifnya adalah nama field database
				$result = $this->account->auth_check($usr, $pwd);
				//apakah akun ada ? jika ada buat session
				if($result){ 
					if($result['banned'] == 1 || $result['reset'] == 1){
						$this->session->set_flashdata('acc_locked', 'Untuk sementara administrator mengunci akun ini. Kamu tidak dapat mengakses sistem');
					}else{
						$result['status_login'] = TRUE;
						$this->session->set_userdata($result);
					}
				}else{
					$this->session->set_flashdata('wrong_password', 'Sepertinya username atau password kamu salah. Coba lagi.');
				}
			}
			// Arahkan kembali ke index untuk di cek lagi. 
			redirect(site_url('Auth'));	
		}
		
		public function close(){
			//Hapus semua session dan kembali ke auth/index untuk diperiksa
			$this->session->unset_userdata('status_login');
			$this->session->sess_destroy();
			redirect(site_url('Auth'));
		}
	}
