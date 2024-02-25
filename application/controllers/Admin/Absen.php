<?php defined('BASEPATH') or exit('No direct script access allowed');

class Absen  extends CI_Controller
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


    public function absen_guru()
    {
        $data['data_guru'] = $this->M_data_absen->tampil_data_absen_guru();

        $this->load->view('Admin/List.AbsenGuru.php', $data);
    }


    public function absen_siswa()
    {
        $data['data_siswa'] = $this->M_data_absen->tampil_data_absen_siswa();

        $this->load->view('Admin/List.AbsenSiswa.php', $data);
    }

    public function tambah_absen_siswa()
    {
        $nisn =  $this->input->post('nisn');
        $nama_siswa = $this->input->post('nama_lengkap');
        $cek_data =  $this->M_siswa->cek_nisn($nisn, $nama_siswa)->result();
        

        if ($cek_data == TRUE) {

           date_default_timezone_set("Asia/Jakarta");
        $config['upload_path'] = './assets/upload/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
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

                $file = $gbr['file_name'];

                $nisn = $this->input->post('nisn');
                $nama_lengkap = $this->input->post('nama_lengkap');
                $keterangan =  $this->input->post('keterangan');
                $jam_absen = $this->input->post('jam_absen');
                $status = 'siswa';

                $data = array(

                    'nisn' => $nisn,
                    'nama_lengkap' => $nama_lengkap,
                    'keterangan' => $keterangan,
                    'jam_absen' => $jam_absen,
                    'status' => $status,
                    'foto' => $foto


                );
                $this->M_data_absen->input_data($data, 'tbl_data_absen');
                echo $this->session->set_flashdata('msg', 'success');
                redirect('Admin/Absen/absen_siswa');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/Absen/absen_siswa');
            }
        } else {

         $nisn = $this->input->post('nisn');
         $nama_lengkap = $this->input->post('nama_lengkap');
         $keterangan =  $this->input->post('keterangan');
         $jam_absen = $this->input->post('jam_absen');
         $status = 'siswa';

         $data = array(

            'nisn' => $nisn,
            'nama_lengkap' => $nama_lengkap,
            'keterangan' => $keterangan,
            'jam_absen' => $jam_absen,
            'status' => $status
        );
         $this->M_data_absen->input_data($data, 'tbl_data_absen');
         echo $this->session->set_flashdata('msg', 'success');
         redirect('Admin/Absen/absen_siswa');
     }

 }else{

     echo $this->session->set_flashdata('msg', 'warning-absen');
     redirect('Admin/Absen/absen_siswa');

 }
}

public function tambah_absen_guru()
{
    $nip =  $this->input->post('nip');
    $nama_guru = $this->input->post('nama_lengkap');
    $cek_data =  $this->M_guru->cek_nip($nip, $nama_guru)->result();

    if ($cek_data == TRUE) {

       date_default_timezone_set("Asia/Jakarta");
        $config['upload_path'] = './assets/upload/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
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

                $file = $gbr['file_name'];

                $nisn = $this->input->post('nip');
                $nama_lengkap = $this->input->post('nama_lengkap');
                $keterangan =  $this->input->post('keterangan');
                $jam_absen = $this->input->post('jam_absen');
                $status = 'guru';

                $data = array(

                    'nisn' => $nisn,
                    'nama_lengkap' => $nama_lengkap,
                    'keterangan' => $keterangan,
                    'jam_absen' => $jam_absen,
                    'status' => $status,
                    'foto' => $foto


                );
                $this->M_data_absen->input_data($data, 'tbl_data_absen');
                echo $this->session->set_flashdata('msg', 'success');
                redirect('Admin/Absen/absen_siswa');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/Absen/absen_siswa');
            }
        } else {

            $nisn = $this->input->post('nip');
            $nama_lengkap = $this->input->post('nama_lengkap');
            $keterangan =  $this->input->post('keterangan');
            $jam_absen = $this->input->post('jam_absen');
            $status = 'guru';

            $data = array(

                'nisn' => $nisn,
                'nama_lengkap' => $nama_lengkap,
                'keterangan' => $keterangan,
                'jam_absen' => $jam_absen,
                'status' => $status
            );
            $this->M_data_absen->input_data($data, 'tbl_data_absen');
            echo $this->session->set_flashdata('msg', 'success');
            redirect('Admin/Absen/absen_siswa');
        }

    }else{

     echo $this->session->set_flashdata('msg', 'warning-absen');
     redirect('Admin/Absen/absen_siswa');

 }
}


public function delete_absen_siswa($id_absen)
{
    $id_absen = $this->input->post('id_absen');
    $this->M_data_absen->delete_data($id_absen);
    echo $this->session->set_flashdata('msg', 'deleted');
    redirect('Admin/Absen/absen_siswa');
}

public function delete_absen_guru($id_absen)
{
    $id_absen = $this->input->post('id_absen');
    $this->M_data_absen->delete_data($id_absen);
    echo $this->session->set_flashdata('msg', 'deleted');
    redirect('Admin/Absen/absen_guru');
}



public function update_absen_siswa()
{
    date_default_timezone_set("Asia/Jakarta");
        $config['upload_path'] = './assets/upload/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config['max_size']  = 100000; //Batas Ukuran

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

                $file = $gbr['file_name'];
                $id_absen = $this->input->post('id_absen');
                $nisn = $this->input->post('nisn');
                $nama_lengkap = $this->input->post('nama_lengkap');
                $jam_absen = $this->input->post('jam_absen');
                $keterangan = $this->input->post('keterangan');
                $waktu =  date('Y-m-d h:i:s');

                $data = array(
                    'nisn' => $nisn,
                    'nama_lengkap' => $nama_lengkap,
                    'jam_absen' => $jam_absen,
                    'keterangan' => $keterangan,
                    'file' => $file,
                    'waktu' => $waktu
                );

                $where = array(
                    'id_absen' => $id_absen
                );

                $this->M_data_absen->update_data($where,$data,'tbl_data_absen');
                echo $this->session->set_flashdata('msg', 'update');
                redirect('Admin/Absen/absen_siswa');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/Absen/absen_siswa');
            }

        } else {

          $id_absen = $this->input->post('id_absen');
          $nisn = $this->input->post('nisn');
          $nama_lengkap = $this->input->post('nama_lengkap');
          $jam_absen = $this->input->post('jam_absen');
          $keterangan = $this->input->post('keterangan');
          $waktu =  date('Y-m-d h:i:s');



          $data = array(
            'nisn' => $nisn,
            'nama_lengkap' => $nama_lengkap,
            'jam_absen' => $jam_absen,
            'keterangan' => $keterangan,
            'waktu' => $waktu
        );



          $where = array(
            'id_absen' => $id_absen
        );

          $cek = $this->M_data_absen->update_data($where,$data,'tbl_data_absen');
          echo $this->session->set_flashdata('msg', 'update');
          redirect('Admin/Absen/absen_siswa');
      }
  }


  public function update_absen_guru()
  {
    date_default_timezone_set("Asia/Jakarta");
        $config['upload_path'] = './assets/upload/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config['max_size']  = 100000; //Batas Ukuran

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

                $file = $gbr['file_name'];
                $id_absen = $this->input->post('id_absen');
                $nisn = $this->input->post('nip');
                $nama_lengkap = $this->input->post('nama_guru');
                $jam_absen = $this->input->post('jam_absen');
                $keterangan = $this->input->post('keterangan');
                $waktu =  date('Y-m-d h:i:s');

                $data = array(
                    'nisn' => $nisn,
                    'nama_lengkap' => $nama_lengkap,
                    'jam_absen' => $jam_absen,
                    'keterangan' => $keterangan,
                    'file' => $file,
                    'waktu' => $waktu
                );

                $where = array(
                    'id_absen' => $id_absen
                );

                $this->M_data_absen->update_data($where,$data,'tbl_data_absen');
                echo $this->session->set_flashdata('msg', 'update');
                redirect('Admin/Absen/absen_guru');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/Absen/absen_guru');
            }

        } else {

          $id_absen = $this->input->post('id_absen');
          $nisn = $this->input->post('nip');
          $nama_lengkap = $this->input->post('nama_guru');
          $jam_absen = $this->input->post('jam_absen');
          $keterangan = $this->input->post('keterangan');
          $waktu =  date('Y-m-d h:i:s');



          $data = array(
            'nisn' => $nisn,
            'nama_lengkap' => $nama_lengkap,
            'jam_absen' => $jam_absen,
            'keterangan' => $keterangan,
            'waktu' => $waktu
        );



          $where = array(
            'id_absen' => $id_absen
        );

          $cek = $this->M_data_absen->update_data($where,$data,'tbl_data_absen');
          echo $this->session->set_flashdata('msg', 'update');
          redirect('Admin/Absen/absen_guru');
      }
  }
}
