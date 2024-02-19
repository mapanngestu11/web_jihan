<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('M_guru');
		$this->load->helper('url');


	}


	public function index()
	{

		$data['data_guru'] = $this->M_guru->tampil_data();
		$this->load->view('Guru.php',$data);
	}
}
