<?php	
	class Article_model extends CI_Model{
		private $table = 'article';
		public function __construct(){
			$this->load->database();
		}
		
		//Custom query : SELECT
		public function article_list(){
			//Mengambil lengkap berserta nama status. Left join ke tabel artikel
			$query = $this->base_query()."ORDER BY article_time ASC";
			$sql = $this->db->query($query);
			return $sql->result_array();
		}
		
		public function retrieve_article($id){
			//Seperti query diatas tapi hanya menghasilkan satu baris
			$query = $this->base_query()."WHERE article_id = '$id'";
			$sql = $this->db->query($query);
			return $sql->row_array();
		}
		
		public function retrieve_section(){
			return $this->db->get('section')->result_array();
		}
		
		private function check_section($id){
			return $this->db->get_where('section', ['section_id'=>$id])->result_array();
		}
		//END
		
		//article query. mengambil semua baris polosan
		public function read_article($id){
			return $this->db->get_where($this->table, ['article_id'=>$id])->row_array();
		}
		
		public function remove_article($id, $penulis_id){
			//Eksekusi oleh wartawan. Cek apakah artikel ada. maka lanjutkan
			$check = $this->read_article($id);
			if($check && $check['article_penulis'] == $penulis_id && $check['article_status'] == 1){
				$this->db->where('article_id', $id);
				$this->db->delete($this->table);
				return TRUE;
			}else{
				return FALSE;
			}	
		}
			
		public function create_article($title, $content, $section, $creator){
			if($this->check_section($section)){
				//TRUE jika terdapat kategori tersebut dalam daftar
				$this->article_judul = $title;
				$this->article_konten = $content;
				$this->article_penulis = $creator;
				$this->article_section = $section;
				$this->db->insert($this->table, $this);
				return TRUE;
			}else{
				//FALSE bila kategori tersebut tidak ada
				return FALSE;
			}	
		}
		
		public function edit_article($id, $title, $content, $section){
			$check = $this->read_article($id);
			if($check){
				$this->article_judul = $title;
				$this->article_konten = $content;
				$this->article_section = $section;
				$this->db->where(['article_id'=>$id]);
				$this->db->update($this->table, $this);
				return TRUE;
			}else{
				return FALSE;
			}	
		}
		//END
		
		//Article status changer
		public function submit_article($id, $penulis_id){
			//Eksekusi oleh wartawan. Cek apakah artikel ada. maka lanjutkan
			$check = $this->read_article($id);
			if($check && $check['article_penulis'] == $penulis_id && $check['article_status'] == 1){
				$this->article_status = 2;
				$this->db->where(['article_id'=>$id]);
				$this->db->update($this->table, $this);
				$check2 = $this->original_check($id);
				if($check2){
					$this->original_update($check);
					return TRUE;	
				}else{
					$this->original_backup($check);
					return TRUE;	
				}
			}else{
				return FALSE;
			}	
		}
		
		public function unsubmit_article($id, $penulis_id){
			//Eksekusi oleh wartawan. Cek apakah artikel ada. maka lanjutkan
			$check = $this->read_article($id);
			if($check && $check['article_penulis'] == $penulis_id && $check['article_status'] == 2){
				$this->article_status = 1;
				$this->db->where(['article_id'=>$id]);
				$this->db->update($this->table, $this);
				return TRUE;
			}else{
				return FALSE;
			}	
		}
		
		public function claim_article($id, $editor_id){
			//Eksekusi oleh redaktur. 
			$check = $this->null_check($id);
			//Jika nilai NULL ditemukan pada article_editor, maka artikel tsb bisa diklaim
			if($check && $check['article_status'] == 2){
				$this->article_status = 3;
				$this->article_editor = $editor_id;
				$this->db->where(['article_id'=>$id]);
				$this->db->update($this->table, $this);
				return TRUE;
			}else{
				return FALSE;
			}
		}
		
		public function unclaim_article($id, $editor_id){
			//Eksekusi oleh redaktur
			$check = $this->null_check($id);
			//Jika true - artikel adalah null - maka FALSE
			if($check){
				return FALSE;
			}else{
				$process = $this->rollback_article($id, $editor_id);
				if($process){
					$this->article_status = 2;
					$this->article_editor = NULL;
					$this->db->where(['article_id'=>$id]);
					$this->db->update($this->table, $this);
				return TRUE;
				}else{
					return FALSE;
				}	
			}
		}
		
		public function accept_article($id, $editor_id){
			//Eksekusi oleh redaktur
			$check = $this->retrieve_article($id);
			//Jika nilai $editor_id tidak sama dengan $check (TRUE), maka return FALSE, atau
			//Jika nilai status artikel bukan '3' (TRUE), maka return FALSE
			if($check['article_editor'] != $editor_id || $check['article_status'] != 3){
				return FALSE;
			}else{
				$this->article_status = 4;
				$this->db->where(['article_id'=>$id]);
				$this->db->update($this->table, $this);
				return TRUE;
			}
		}
		
		public function downgrade_article($id, $editor_id){
			//Eksekusi oleh redaktur
			$check = $this->retrieve_article($id);
			//Jika nilai $editor_id tidak sama dengan $check, maka FALSE
			if($check['article_editor'] != $editor_id || $check['article_status'] < 4){
				return FALSE;
			}else{
				$this->article_status = 3;
				$this->db->where(['article_id'=>$id]);
				$this->db->update($this->table, $this);
				return TRUE;
			}
		}
		
		public function reject_article($id, $editor_id){
			//Eksekusi oleh redaktur
			$check = $this->retrieve_article($id);
			//Jika nilai $editor_id tidak sama dengan $check, maka FALSE
			if($check['article_editor'] != $editor_id || $check['article_status'] != 3){
				return FALSE;
			}else{
				//Rollback dahulu
				$process = $this->rollback_article($id, $editor_id);
				if($process){
					$this->article_status = 5;
					$this->db->where(['article_id'=>$id]);
					$this->db->update($this->table, $this);
					return TRUE;
				}else{
					return FALSE;
				}
				
			}
		}
		
		public function rollback_article($id, $editor_id){
			//Eksekusi oleh redaktur. Untuk kembali ke data original.
			$check = $this->retrieve_article($id);
			//Jika status artikel bukan draft atau pending DAN dimiliki oleh editor terkait, Maka jalankan fungsi rollback-nya
			if($check['article_status'] > 2 && $check['article_editor'] == $editor_id){
				$origi = $this->original_retrieve($id);
				//tabel original dan article memiliki relasi 1 to 1. Jika ditemukan data menggunakan key dari article_id
				if($origi){
					$this->article_judul = $origi['ori_judul'];
					$this->article_konten = $origi['ori_konten'];
					$this->article_section = $origi['ori_section'];
					$this->db->where(['article_id'=>$id]);
					$this->db->update($this->table, $this);
					return TRUE;
				}else{
					//Jika tidak ditemukan (Mungkin karena dihapus secara eksplisit pada tabel original langsung dari konsol database)
					//Maka, buat salinan baru dari data artikel terakhir.
					$this->original_backup($check);
					//Return TRUE secara terpaksa.
					return TRUE;
				}
			}else{
				//False jika kondisi tidak sesuai
				return FALSE;
			}
		}
		//END

	//PRIVATE FUNCTION
		//For custom query : SELECT
		private function base_query(){
			return 'SELECT article_id, article_judul, article_konten, article_penulis, penulis.acc_name AS wartawan, article_editor, editor.acc_name AS redaktur, article_section, wilayah.section_name AS domain, article_status, kode.status_name AS status, article_time FROM article LEFT JOIN account as penulis ON penulis.acc_id = article.article_penulis LEFT JOIN account as editor ON editor.acc_id = article.article_editor LEFT JOIN status as kode ON kode.status_id = article.article_status LEFT JOIN section as wilayah ON wilayah.section_id = article.article_section ';
		}
		
		private function null_check($id){
			$query = $this->base_query()."WHERE article_id = '$id' AND article_editor IS NULL";
			$sql = $this->db->query($query);
			return $sql->row_array();
		}
		
		private function original_check($id){
			$query = "SELECT * FROM original WHERE ori_id = '$id'";
			$sql = $this->db->query($query);
			return $sql->row_array();
		}
		
		//Menyalin beberapa data artikel dari wartawan aslinya ke tabel original. Agar redaktur bisa rollback kesalahannya ke state ini.
		private function original_backup($data = array()){
			$field['ori_id'] = $data['article_id'];
			$field['ori_judul'] = $data['article_judul'];
			$field['ori_konten'] = $data['article_konten'];
			$field['ori_section'] = $data['article_section'];
			$this->db->insert('original', $field);
		}
		
		private function original_update($data = array()){
			$field['ori_judul'] = $data['article_judul'];
			$field['ori_konten'] = $data['article_konten'];
			$field['ori_section'] = $data['article_section'];
			$this->db->where(['ori_id'=>$data['article_id']]);
			$this->db->update('original', $field);
		}
		
		//Mengambil data artikel dari tabel original
		private function original_retrieve($id){
			return $this->db->get_where('original', ['ori_id'=>$id])->row_array();
		}
		//END
	}