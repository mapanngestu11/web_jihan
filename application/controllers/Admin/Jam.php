<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jam extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_jam');
		$this->load->helper('url');


		if ($this->session->userdata('masuk') != TRUE) {
			$this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert" style="color:white">Login Terlebih Dahulu ! </div>');
			$url = base_url('Login');
			redirect($url);
		}
	}

	

	public function index()
	{
		$data['data_jam'] = $this->M_jam->tampil_data();
		$this->load->view('Admin/List.jam.php',$data);
	}

	public function update()
	{
		date_default_timezone_set("Asia/Jakarta");
		$id_jam = $this->input->post('id_jam');
		$jam_masuk = $this->input->post('jam_masuk');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'jam_masuk' => $jam_masuk,
			'keterangan' => $keterangan

		);

		$where = array(
			'id_jam' => $id_jam
		);

		$this->M_jam->update_data($where, $data, 'tbl_jam');
		echo $this->session->set_flashdata('msg', 'update');
		redirect('Admin/Jam');
	}



}
