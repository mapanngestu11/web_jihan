<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('M_siswa');
		$this->load->helper('url');


	}


	public function index()
	{

		$data['data_siswa'] = $this->M_siswa->tampil_data();
		$this->load->view('Siswa.php',$data);
	}
}
