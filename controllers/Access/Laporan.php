<?php
	class Laporan extends CI_Controller{
		
		private $laporan;

		public function __construct(){
			parent::__construct();
			if($this->session->userdata('status_login') != TRUE){
				redirect(site_url(''));
			}
			date_default_timezone_set("Asia/Jakarta");
			$this->load->model('Laporan_model');
			$this->laporan = $this->Laporan_model;
		}
		
		public function index(){	
			$this->overview();
		}

		private function overview(){
			//$date = new DateTime();
			//$bulanx = $date->format('n');
			//$tahunx = $date->format('Y');
			//bulan = (String) date('n', time());
			//$tahun = (String) date('Y', time());
			//$conc = $bulan."-".$tahun;
			//$pre_data['date_total'] = $conc;
			$pre_data['global_count_status'] = $this->laporan->global_count_status();
			$pre_data['global_count_section'] = $this->laporan->global_count_section();
			$pre_data['global_count_article'] = $this->laporan->global_count_article();
			$pre_data['wartawan_count_section_total'] = $this->laporan->role_count_section(3, NULL, NULL);
			$pre_data['wartawan_count_status_total'] = $this->laporan->role_count_status(3, NULL, NULL);
			$pre_data['redaktur_count_section_total'] = $this->laporan->role_count_section(2, NULL, NULL);
			$pre_data['redaktur_count_status_total'] = $this->laporan->role_count_status(2, NULL, NULL);
			$data['view'] = $this->load->view('page/_laporan/laporan_basic', $pre_data, TRUE);
			$this->load->view('_baseweb', $data);
		}
		
		public function generate(){
			$pre_data = array();
			$form = $this->input->post();
			$pre_data['type']	= $form['type'];
			$pre_data['role']	= $form['role'];
			$pre_data['bulan']	= $form['month'];
			$pre_data['tahun'] 	= $form['year'];
			
			if($pre_data['type'] == 'status'){
				$pre_data['result'] = $this->laporan->role_count_status($pre_data['role'], $pre_data['bulan'], $pre_data['tahun']);
			}elseif($pre_data['type'] == 'section'){
				$pre_data['result'] = $this->laporan->role_count_section($pre_data['role'], $pre_data['bulan'], $pre_data['tahun']);
			}else{
				redirect(site_url('access/laporan'));
			}
			$data['view'] = $this->load->view('page/_laporan/laporan_generate', $pre_data, TRUE);
			$this->load->view('_baseweb', $data);
		}
	}
	
	//PERHATIAN : Class ini belum dilakukan pengecekkan session
	//Bisa diakses langsung pada http://localhost/halocms/index.php/access/laporan
	//Sudah ada session, fixed