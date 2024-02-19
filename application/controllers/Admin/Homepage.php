<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_data_absen');
		$this->load->model('M_siswa');
		$this->load->helper('url');
		$this->load->library('upload');

		if ($this->session->userdata('masuk') != TRUE) {
			$this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert" style="color:white">Login Terlebih Dahulu ! </div>');
			$url = base_url('Login');
			redirect($url);
		}
	}

	

	public function index()
	{
		$data['jumlah_data_absen_siswa'] =  $this->M_data_absen->jumlah_data_siswa()->result();
		$data['jumlah_data_absen_siswa_terlambat'] =  $this->M_data_absen->jumlah_data_siswa_telat()->result();
		$data['jumlah_siswa'] =  $this->M_siswa->jumlah_data()->result();
		$this->load->view('Admin/Homepage.php',$data);
	}
}
