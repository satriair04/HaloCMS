<?php
	class Laporan_model extends CI_Model{
		
		private $table = "article";
		
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		
		//All user by their role - COUNTING FUNCTION - START -
		/*
		*	Melihat informasi pekerjaan artikel yang dilakukan oleh semua pengguna yang memiliki kode role tertentu.
		*	Berdasarkan kode role ataupun lebih spesifik dengan bulan dan tahun tertentu.
		*	Hanya mengambil semua akun yang memiliki role tertentu (Redaktur & Wartawan).
		*/
		public function role_count_status($role_id, $bulan, $tahun){
			//Cek kode role & deklarasi variabel
			$final_data = array();
			$counter_data = 0;
			$pre_data = $this->role_retrieve($role_id);
			//Loop
			foreach($pre_data as $key => $value){
				//Deklarasi & reset-per-loop
				$result = NULL;
				$total = NULL;
				//Checking
				if($bulan == NULL || $tahun == NULL){
					//Total keseluruhan tanpa batasan waktu
					$result = $this->user_total_status($pre_data[$counter_data]['acc_id']);
					$total = $this->user_total_article($pre_data[$counter_data]['acc_id']);
				}else{
					//Dengan batasan waktu
					$result = $this->user_count_status($pre_data[$counter_data]['acc_id'], $bulan, $tahun);
					$total = $this->user_count_article($pre_data[$counter_data]['acc_id'], $bulan, $tahun);
				}
				//Membuat array data
				$final_data[$counter_data]['acc_id'] 	= $pre_data[$counter_data]['acc_id'];
				$final_data[$counter_data]['acc_name'] 	= $pre_data[$counter_data]['acc_name'];
				$final_data[$counter_data]['acc_role'] 	= $pre_data[$counter_data]['acc_role'];
				$final_data[$counter_data]['banned'] 	= $pre_data[$counter_data]['banned'];
				//karena $result berasal result_array() suatu query. Maka, index $result dimulai dari nol. Bukan merepresentasikan status_id.
				$final_data[$counter_data]['draft'] 	= $result[0]['jumlah'];
				$final_data[$counter_data]['pending'] 	= $result[1]['jumlah'];
				$final_data[$counter_data]['process'] 	= $result[2]['jumlah'];
				$final_data[$counter_data]['accepted'] 	= $result[3]['jumlah'];
				$final_data[$counter_data]['rejected'] 	= $result[4]['jumlah'];
				$final_data[$counter_data]['total'] 	= $total[0]['total_artikel'];
				$counter_data++;
			}
			return $final_data;
		}
		
		public function role_count_section($role_id, $bulan, $tahun){
			//Cek kode role & deklarasi variabel
			$final_data = array();
			$counter_data = 0;
			$pre_data = $this->role_retrieve($role_id);
			//Loop
			foreach($pre_data as $key => $value){
				//Deklarasi & reset-per-loop
				$result = NULL;
				$total = NULL;
				//Checking
				if($bulan == NULL || $tahun == NULL){
					//Total keseluruhan tanpa batasan waktu
					$result = $this->user_total_section($pre_data[$counter_data]['acc_id']);
					$total = $this->user_total_article($pre_data[$counter_data]['acc_id']);
				}else{
					//Dengan batasan waktu
					$result = $this->user_count_section($pre_data[$counter_data]['acc_id'], $bulan, $tahun);
					$total = $this->user_count_article($pre_data[$counter_data]['acc_id'], $bulan, $tahun);
				}
				//Membuat array data
				$final_data[$counter_data]['acc_id'] 			= $pre_data[$counter_data]['acc_id'];
				$final_data[$counter_data]['acc_name'] 			= $pre_data[$counter_data]['acc_name'];
				$final_data[$counter_data]['acc_role'] 			= $pre_data[$counter_data]['acc_role'];
				$final_data[$counter_data]['banned'] 			= $pre_data[$counter_data]['banned'];
				//karena $result berasal result_array() suatu query. Maka, index $result dimulai dari nol. Bukan merepresentasikan section_id.
				$final_data[$counter_data]['pekanbaru'] 		= $result[0]['jumlah'];
				$final_data[$counter_data]['dumai'] 			= $result[1]['jumlah'];
				$final_data[$counter_data]['indragiri_hulu'] 	= $result[2]['jumlah'];
				$final_data[$counter_data]['kuansing'] 			= $result[3]['jumlah'];
				$final_data[$counter_data]['indragiri_hilir'] 	= $result[4]['jumlah'];
				$final_data[$counter_data]['kampar'] 			= $result[5]['jumlah'];
				$final_data[$counter_data]['pelalawan'] 		= $result[6]['jumlah'];
				$final_data[$counter_data]['rokan_hulu'] 		= $result[7]['jumlah'];
				$final_data[$counter_data]['bengkalis'] 		= $result[8]['jumlah'];
				$final_data[$counter_data]['siak'] 				= $result[9]['jumlah'];
				$final_data[$counter_data]['rokan_hilir'] 		= $result[10]['jumlah'];
				$final_data[$counter_data]['meranti'] 			= $result[11]['jumlah'];
				$final_data[$counter_data]['indonesia'] 		= $result[12]['jumlah'];
				$final_data[$counter_data]['internasional'] 	= $result[13]['jumlah'];
				$final_data[$counter_data]['uncategorized'] 	= $result[14]['jumlah'];
				$final_data[$counter_data]['total']				= $total[0]['total_artikel'];
				$counter_data++;
			}
			return $final_data;
		}
		//All user by role - COUNTING FUNCTION - END -
		
		
		//SINGLE USER : Redaktur & Wartawan - COUNTING FUNCTION - START -
		/*
		*	Melihat informasi pekerjaan artikel pengguna.
		*	Berdasarkan kode akun pengguna ataupun lebih spesifik dengan bulan dan tahun tertentu.
		*	Hanya mengambil informasi pada SATU kode akun.
		*/
		public function user_count_status($acc_id, $bulan, $tahun){
			$check = $this->id_checker($acc_id);
			if($check == FALSE){
				return FALSE;
			}
			$query = $this->status_query()." AND $check = $acc_id AND MONTH(article_time) = '$bulan' AND YEAR(article_time) = '$tahun' GROUP BY status_id ORDER BY status_id";
			$sql = $this->db->query($query);
			return $sql->result_array();
		}
		
		public function user_total_status($acc_id){
			$check = $this->id_checker($acc_id);
			if($check == FALSE){
				return FALSE;
			}
			$query = $this->status_query()." AND $check = $acc_id GROUP BY status_id ORDER BY status_id";
			$sql = $this->db->query($query);
			return $sql->result_array();
		}
		
		public function user_count_section($acc_id, $bulan, $tahun){
			$check = $this->id_checker($acc_id);
			if($check == FALSE){
				return FALSE;
			}
			$tahun = (int)$tahun;
			$bulan = (int)$bulan;
			$query = $this->section_query()." AND $check = $acc_id AND MONTH(article_time) = '$bulan' AND YEAR(article_time) = '$tahun' GROUP BY section_id ORDER BY section_id;";
			$sql = $this->db->query($query);
			return $sql->result_array();
		}
		
		public function user_total_section($acc_id){
			$check = $this->id_checker($acc_id);
			if($check == FALSE){
				return FALSE;
			}
			$query = $this->section_query()." AND $check = $acc_id GROUP BY section_id ORDER BY section_id;";
			$sql = $this->db->query($query);
			return $sql->result_array();
		}
		
		public function user_count_article($acc_id, $bulan, $tahun){
			$check = $this->id_checker($acc_id);
			if($check == FALSE){
				return FALSE;
			}
			$query = $this->counting_query()." WHERE $check = $acc_id AND MONTH(article_time) = '$bulan' AND YEAR(article_time) = '$tahun'";
			$sql = $this->db->query($query);
			return $sql->result_array();
		}

		public function user_total_article($acc_id){
			$check = $this->id_checker($acc_id);
			if($check == FALSE){
				return FALSE;
			}
			$query = $this->counting_query()." WHERE $check = $acc_id ";
			$sql = $this->db->query($query);
			return $sql->result_array();
		}		
		//PER-SINGLE Redaktur & Wartawan - COUNTING FUNCTION - END - 
		
		//GLOBAL COUNTING FUNCTION - START - 
		/*
		*	Eksekusi query untuk menghitung
		*/
		public function global_count_status(){	
		//Menghitung keseluruhan
			$query = $this->status_query()."GROUP BY status_id ";
			$sql = $this->db->query($query);
			return $sql->result_array();
		}
		
		public function global_count_section(){	
			$query = $this->section_query()."GROUP BY section_id ";
			$sql = $this->db->query($query);
			return $sql->result_array();
		}
		
		public function global_count_article(){
			$query = $this->counting_query();
			$sql = $this->db->query($query);
			return $sql->result_array();
		}
		
		//GLOBAL COUNTING FUNCTION - END - 
		
		
		//PRIVATE FUNCTION
		/*
		*	Return nilai berupa string mentahan query
		*/
		
		private function status_query(){
			//Query untuk menampilkan jumlah artikel berdasarkan status proses masing - masingnya
			//Key : status_id, status_name, jumlah
			return "SELECT DISTINCT keterangan.status_id, keterangan.status_name, COUNT(article.article_status) AS jumlah FROM article RIGHT JOIN status as keterangan ON keterangan.status_id = article.article_status ";
		}
		
		
		private function section_query(){
			//Query untuk menampilkan jumlah artikel berdasarkan section wilayah masing - masingnya
			//Key : section_id, section_name, jumlah
			return "SELECT DISTINCT keterangan.section_id, keterangan.section_name, COUNT(article.article_status) AS jumlah FROM article RIGHT JOIN section as keterangan ON keterangan.section_id = article.article_section ";
		}
		
		
		private function counting_query(){
			//Query untuk menghitung jumlah artikel yang ada pada database
			//Key : total_artikel
			return "SELECT COUNT(*) AS total_artikel FROM article ";
		}
		
		//CHECKER
		/*
		*	Pengecekkan peran pengguna dan untuk memanipulasi string dalam query
		*/
		private function id_checker($pre_id){
			//Mengambil parameter "acc_role" dari suatu pengguna
			$this->db->select('acc_id, acc_name, acc_email, acc_role');
			$check = $this->db->get_where('account', ['acc_id'=>$pre_id])->row_array();
			//Lakukan pemeriksaan lalu kembalikan nilai
			if($check['acc_role'] == 3){
				return "article_penulis";
			}elseif($check['acc_role'] == 2){
				return "article_editor";
			}else{
				return FALSE;
			}
		}
		
		private function role_retrieve($role_id){
			//Mengembalikan beberapa pengguna yang memiliki role tertentu
			$this->db->where(['acc_role'=>$role_id]);
			return $this->db->get('account')->result_array();
		}
	}
	
//Fail query 1: "SELECT COUNT(article_status = 1)AS draft, COUNT(article_status = 2)AS pending, COUNT(article_status = 3)AS process, COUNT(article_status = 4)AS accepted, COUNT(article_status = 5)AS rejected FROM article ";

		
//Fail query 2: "SELECT DISTINCT article_penulis, COUNT(article_status = 1)AS total, COUNT(article_status = 1)AS draft, COUNT(article_status = 2)AS pending, COUNT(article_status = 3)AS process, COUNT(article_status = 4)AS accepted, COUNT(article_status = 5)AS rejected FROM article GROUP BY article_status ORDER BY article_penulis ";

//Good query 1:"SELECT * FROM article WHERE MONTH(article_time) = 2 AND YEAR(article_time) = 2019"; - Spesifik dengan bulan dan tahun