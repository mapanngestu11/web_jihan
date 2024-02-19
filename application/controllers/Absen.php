<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller {



	function __construct()
	{
		parent::__construct();
		$this->load->model('M_guru');
		$this->load->model('M_data_absen');
		$this->load->model('M_jam');
		$this->load->model('M_siswa');
		$this->load->helper('url');
		$this->load->library('upload');


	}


	public function Cek()
	{
		date_default_timezone_set("Asia/Jakarta");
		$cek = $this->input->post('data_nis');

		$cek_siswa  =  $this->M_siswa->cek_nis($cek)->result();
		$cek_guru  =  $this->M_guru->cek_nip($cek)->result();

		$cek_jam  = $this->M_jam->tampil_data()->result_array();




		if ($cek_siswa == TRUE) {

			$waktu_input = date('h:i:s');
			$batas_waktu = $cek_jam[0]['jam_masuk'];

			if($waktu_input >= $batas_waktu){
				

				echo $this->session->set_flashdata('msg', 'info-telat');
				redirect('Form');

			}elseif($waktu_input <= $batas_waktu){

				$nisn       = $this->input->post('data_nis');
				$keterangan = 'Tepat Waktu';
				$jam_absen  = $waktu_input ;
				$status     = 'siswa';

				$data = array(
					'nisn' => $nisn,
					'keterangan' => $keterangan,
					'status' => $status,
					'jam_absen' => $jam_absen
				);

				$this->M_data_absen->input_data($data, 'tbl_data_absen');
				echo $this->session->set_flashdata('msg', 'success');
				redirect('Homepage');

			}
		}if($cek_guru == TRUE){
			
			$waktu_input = date('h:i:s');
			$batas_waktu = $cek_jam[0]['jam_masuk'];

			if($waktu_input >= $batas_waktu){

				echo $this->session->set_flashdata('msg', 'info-telat');
				redirect('Form');

			}elseif($waktu_input <= $batas_waktu){

				$nisn       = $this->input->post('data_nis');
				$keterangan = 'Tepat Waktu';
				$jam_absen  = $waktu_input ;
				$status     = 'guru';

				$data = array(
					'nisn' => $nisn,
					'keterangan' => $keterangan,
					'status' => $status,
					'jam_absen' => $jam_absen
				);

				$this->M_data_absen->input_data($data, 'tbl_data_absen');
				echo $this->session->set_flashdata('msg', 'success');
				redirect('Homepage');

			}
		}else{

			echo $this->session->set_flashdata('msg', 'not-found');
			redirect('Homepage');
		}

		
	}

	public function form(){
		
		date_default_timezone_set("Asia/Jakarta");
        $config['upload_path'] = './assets/upload/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config['max_size']  = 10000; //Batas Ukuran

        $this->upload->initialize($config);
        if (!empty($_FILES['file']['name'])) {

        	if ($this->upload->do_upload('file')) {
        		$gbr = $this->upload->data();
                //Compress Image
        		$config['image_library'] = 'gd2';
        		$config['source_image'] = './assets/upload/' . $gbr['file_name'];
        		$config['create_thumb'] = FALSE;
        		$config['maintain_ratio'] = FALSE;
        		$config['quality'] = '100%';

        		$config['new_image'] = './assets/upload/' . $gbr['file_name'];
        		$this->load->library('image_lib', $config);
        		$this->image_lib->resize();

        		$file_lampiran = $gbr['file_name'];

        		$nisn = $this->input->post('nisn');
        		$nama_lengkap = $this->input->post('nama_lengkap');
        		$status = $this->input->post('status');
        		$keterangan = $this->input->post('keterangan');
        		$jam_absen = date('h:i:s');
        		

        		$data = array(

        			'nisn' => $nisn,
        			'nama_lengkap' => $nama_lengkap,
        			'status' => $status,
        			'keterangan' => $keterangan,
        			'jam_absen' => $jam_absen,
        			'file' => $file_lampiran


        		);
        		$this->M_data_absen->input_data($data, 'tbl_data_absen');
        		echo $this->session->set_flashdata('msg', 'success-izin');
        		redirect('Homepage');
        	} else {
        		echo $this->session->set_flashdata('msg', 'warning-format');
        		redirect('Homepage');
        	}
        } else {
        	$nisn = $this->input->post('nisn');
        	$nama_lengkap = $this->input->post('nama_lengkap');
        	$status = $this->input->post('status');
        	$keterangan = $this->input->post('keterangan');
        	$jam_absen = date('h:i:s');

        	$data = array(

        		'nisn' => $nisn,
        		'nama_lengkap' => $nama_lengkap,
        		'status' => $status,
        		'jam_absen' => $jam_absen,
        		'keterangan' => $keterangan,



        	);
        	$this->M_data_absen->input_data($data, 'tbl_data_absen');
        	echo $this->session->set_flashdata('msg', 'success-izin');
        	redirect('Homepage');
        }

    }
}
