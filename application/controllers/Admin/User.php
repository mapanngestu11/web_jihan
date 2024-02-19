<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
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
		$data['data_user'] = $this->M_user->tampil_data();
		$this->load->view('Admin/List.User.php',$data);
	}

	public function add()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$nama_lengkap = $this->input->post('nama_lengkap');
		$hak_akses = $this->input->post('hak_akses');
		$status = '0';

		// $user = $this->session->userdata('user');

		$data = array(
			'username' => $username,
			'password' => $password,
			'nama_lengkap' => $nama_lengkap,
			'hak_akses' => $hak_akses,
			'status' => $status
		);

		$this->M_user->input_data($data, 'tbl_user');
		echo $this->session->set_flashdata('msg', 'success');
		redirect('Admin/User');
	}

	public function update()
	{
		date_default_timezone_set("Asia/Jakarta");
		$id_user = $this->input->post('id_user');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$nama_lengkap = $this->input->post('nama_lengkap');
		$hak_akses = $this->input->post('hak_akses');
		$status = '0';

		$data = array(
			'username' => $username,
			'password' => $password,
			'nama_lengkap' => $nama_lengkap,
			'hak_akses' => $hak_akses,
			'status' => $status
		);

		$where = array(
			'id_user' => $id_user
		);

		$this->M_user->update_data($where, $data, 'tbl_user');
		echo $this->session->set_flashdata('msg', 'update');
		redirect('Admin/User');
	}

	public function delete($id_user)
	{
		$id_user = $this->input->post('id_user');
		$this->M_user->delete_data($id_user);
		echo $this->session->set_flashdata('msg', 'deleted');
		redirect('Admin/User');
	}

}
