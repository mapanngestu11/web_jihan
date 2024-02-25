<?php defined('BASEPATH') or exit('No direct script access allowed');

class Laporan  extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('M_guru');
        $this->load->model('M_siswa');
        $this->load->model('M_data_absen');
        $this->load->helper('url');
        $this->load->library('upload');

        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Login Terlebih Dahulu ! </div>');
            $url = base_url('login');
            redirect($url);
        }
    }


    public function index()
    {


        $data['data_siswa'] = $this->M_data_absen->tampil_data_absen_siswa();
        $this->load->view('Admin/List.Laporan.php', $data);
    }

    public function cetak()
    {
        $tanggal1 = $this->input->post('tanggal1');
        $tanggal2 = $this->input->post('tanggal2');

        $data['data_laporan'] = $this->M_data_absen->tampil_data_absen_byTanggal($tanggal1,$tanggal2);

        $this->load->view('Admin/Cetak_laporan.php', $data);

    }



}
