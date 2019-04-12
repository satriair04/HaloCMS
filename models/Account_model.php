<?php
	class Account_model extends CI_Model{
		
		private $table = 'account';
		private $default_password = 'halocms123';
		//md5: 4bc9da39584a5ce05e63102c713a6648
		
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		
		//FUNGSI DENGAN RETURN DATA
		public function retrieve_all(){
			$this->db->select('acc_id, acc_name, acc_email, acc_username, acc_role, acc_date, banned, reset');
			return $this->db->get($this->table)->result_array();
		}
		
		public function retrieve_acc($id){
			$this->db->select('acc_id, acc_name, acc_email, acc_username, acc_role, acc_date, banned, reset');
			return $this->db->get_where($this->table, ['acc_id'=>$id])->row_array();
		}
		
		//PRIVATE
		private function check_username($username){
			//Untuk cek apakah ada username ada. return TRUE bila ada
			return $this->db->get_where($this->table, ['acc_username'=>$username])->row_array();
		}
		
		private function check_email($email){
			//Untuk cek apakah ada username ada. return TRUE bila ada
			return $this->db->get_where($this->table, ['acc_email'=>$email])->row_array();
		}
		//END
		
		//FUNGSI MODIF DATA - UNTUK ROLE ADMINISTRATOR
		public function acc_create($nama, $email, $username, $role){
			$this->acc_name = $nama;
			$this->acc_email = $email;
			$this->acc_username = $username;
			$this->acc_role = $role;
			if($this->check_username($username) || $this->check_email($email)){
				//FALSE jika terdapat username yang sama dalam field acc_username
				return FALSE;
			}else{
				//TRUE bila username unik dan pembuatan akun selesai
				$this->db->insert($this->table, $this);
				return TRUE;
			}	
		}
		
		public function acc_update($id, $nama, $email){
			$check = $this->retrieve_acc($id);
			//Apakah id valid ?
			if($check){
				//Jika valid dan emailnya tidak berubah
				if($check['acc_email'] == $email){
					$this->db->where('acc_id', $id);
					$this->db->update($this->table, ['acc_name'=>$nama]);
					return TRUE;
				//Jika valid tetapi emailnya berubah
				}else{
					//Apakah email perubahan sudah ada di db ?
					if($this->check_email($email)){
						return FALSE;
					}else{
						$this->db->where('acc_id', $id);
						$this->db->update($this->table, ['acc_name'=>$nama, 'acc_email'=>$email]);
						return TRUE;
					}
				}
			}else{
				return FALSE;
			}		
		}
		
		
		public function update_password($username, $old_pwd, $new_pwd){
			$check = $this->auth_check($username, $old_pwd);
			if(!$check){
				return FALSE;
			}else{
				$this->db->where(['acc_username'=>$username, 'acc_password'=>md5($old_pwd)]);
				$this->db->update($this->table, ['acc_password'=>md5($new_pwd)]);
				return TRUE;	
			}	
		}
		
		//Function berbahaya.
		/*
		private function _acc_remove($id){
			$check = $zthis->retrieve_acc($id);
			if($check){
				$zthis->db->where('acc_id', $id);
				$zthis->db->delete($this->table);
			}
		}
		*/
		
		public function acc_banned($id){
			$check = $this->retrieve_acc($id);
			if(!$check){
				return 'x';
			}
			//Sistem toogling. 1 ke 0 atau 0 ke 1
			if($check['banned'] == '1'){
				//Unbanned
				$this->db->where('acc_id', $id);
				$this->db->update($this->table, ['banned'=>'0']);
				return '0';
			}else{
				//Banned
				$this->db->where('acc_id', $id);
				$this->db->update($this->table, ['banned'=>'1']);
				return '1';
			}
		}
		
		//Function untuk Auth.php
		public function auth_check($usr, $pwd){
			//mengembalikan 1 baris secara lengkap tanpa username dan password.
			//BERBAHAYA. Jangan ada field username dan password pada fungsi db->select()
			//Maksimal 4 field
			$this->db->select('acc_id, acc_name, acc_email, acc_role, banned, reset');
			return $this->db->get_where($this->table, ['acc_username'=>$usr, 'acc_password'=>md5($pwd)])->row_array();
		}
		
		//Untuk pengajuan reset ulang password pengguna
		public function reset_request($username, $email){
			$check_user = $this->check_username($username);
			$check_mail = $this->check_email($email);
			if($check_user['acc_id'] != $check_mail['acc_id']){
				return FALSE;
			}else{
				$check = $this->retrieve_acc($check_user['acc_id']);
				if($check['banned'] == 1){
					return FALSE;
				}else{
					if($check['reset'] == 1){
						return FALSE;
					}else{
						$this->db->where('acc_id', $check['acc_id']);
						$this->db->update($this->table, ['reset'=>'1']);
						return $check;
					}
				}
			}
		}
		
		//Untuk pengajuan reset ulang password pengguna
		public function acc_reset($id){
			$check = $this->retrieve_acc($id);
			if($check['reset'] == '0'){
				return FALSE;
			}else{
				$this->db->where('acc_id', $id);
				$this->db->update($this->table, ['reset'=>'0', 'acc_password'=>md5($this->default_password)]);
				return $check;
			}
		}
	}