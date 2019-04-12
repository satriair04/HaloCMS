<?php
	class Image_model extends CI_Model{
		private $table = 'images';
		private $directory_name = '/uploads/';
		
		public function __construct(){
			parent::__construct();
			$this->load->database();	
		}
		
		public function get_path(){
			return $this->directory_name;
		}
		
		public function show_list(){
			$query = $this->list_query();
			$sql = $this->db->query($query);
			return $sql->result_array();
		}
		
		//Tampil semua isi tabel - kelihatannya tidak terpakai
		public function show_images(){
			return $this->db->get($this->table)->result_array();
		}
		
		//Tampil semua data yang memiliki article_source yang sama
		public function article_files($article_id){
			return $this->db->get_where($this->table, ['article_source'=>$article_id])->result_array();
		}
		
		//Mengambil string path file gambar yang sudah jadi
		public function retrieve_path($article_id){
			//Ambil data & siapkan variabel penampung
			$pre_data = $this->article_files($article_id);
			$final_data = array();
			
			//$key adalah index angka, $value adalah
			foreach($pre_data as $key => $value){
				$final_data[$key] = "".base_url($this->get_path().$article_id.'/'.$value['image_name']);
			}
			return $final_data;
		}
		
		//Tampilkan 1 baris data
		public function get_image($image_id){
			return $this->db->get_where($this->table, ['image_id'=>$image_id])->row_array();
		}
		
		public function insert_image($article, $filename, $komentar){
			$this->article_source = $article;
			$this->image_name = $filename;
			$this->image_komentar = $komentar;
			$this->db->insert($this->table, $this);
		}
		
		// fungsi dibawah hanya bisa menghapus satu gambar.
		public function remove_image($image_id){
			$search = $this->get_image($image_id);
			$path = FCPATH.$this->get_path().$search['article_source']."/".$search['image_name'];
			if($search){
				$this->db->where('image_id', $image_id);
				$this->db->delete($this->table);
				unlink($path);
				return TRUE;
			}else{
				return FALSE;
			}
		}
		
		// ON DELETE CASCADE - bila artikel dihapus maka gambar yang punya fk dari artikel juga dihapus
		// jalankan fungsi ini dengan parameter kedua true bila ingin menghapus foldernya juga.
		/*
		//Kelihatannya tidak dipakai
		public function destroy_dir($art_id, $ops = FALSE){
			if($ops == TRUE){
				$path = FCPATH.$this->get_path().$art_id;
				//kayaknya dua baris ini tidak akan dipakai
				$this->db->where('article_id', $art_id);
				$this->db->delete($this->table);
				delete_files($path, TRUE);
				rmdir($path);
				return TRUE;
			}else{
				return FALSE;
			}
		}
		*/
		//Menampilkan artikel dari tabelnya saja.
		private function list_query(){
			return 'SELECT DISTINCT images.article_source AS kode_artikel, judul.article_judul as judul_artikel, COUNT(images.article_source) AS jumlah_gambar, kode_wartawan.article_penulis AS wartawan, kode_status.article_status AS status FROM images LEFT JOIN article as judul ON judul.article_id = images.article_source LEFT JOIN article AS kode_wartawan ON kode_wartawan.article_id = images.article_source LEFT JOIN article AS kode_status ON kode_status.article_id = images.article_source GROUP BY article_source ';
		}
	}