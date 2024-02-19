<?php defined('BASEPATH') or exit('No direct script access allowed');

class Galeri  extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('M_galeri');
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
        $data['data_gambar'] = $this->M_galeri->tampil_data();
        $this->load->view('Admin/List.galeri.php', $data);
    }

    public function delete($id_galeri)
    {
        $id_galeri = $this->input->post('id_galeri');
        $this->M_galeri->delete_data($id_galeri);
        echo $this->session->set_flashdata('msg', 'deleted');
        redirect('Admin/Galeri');
    }

    public function add()
    {
       date_default_timezone_set("Asia/Jakarta");
        $config['upload_path'] = './assets/upload/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config['max_size']  = 10000; //Batas Ukuran

        $this->upload->initialize($config);
        if (!empty($_FILES['gambar']['name'])) {

            if ($this->upload->do_upload('gambar')) {
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

                $gambar = $gbr['file_name'];
                $nama_gambar = $this->input->post('nama_gambar');
                $keterangan = $this->input->post('keterangan');
                $waktu =  date('Y-m-d h:i:s');

                $data = array(

                    'nama_gambar' => $nama_gambar,
                    'keterangan' => $keterangan,
                    'gambar' => $gambar,
                    'waktu' => $waktu

                );
                $this->M_galeri->input_data($data, 'tbl_galeri');
                echo $this->session->set_flashdata('msg', 'success');
                redirect('Admin/Galeri');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/Galeri');
            }
        } else {

            redirect('Admin/Galeri');
        }
    }

    public function update()
    {
        date_default_timezone_set("Asia/Jakarta");
        $config['upload_path'] = './assets/upload/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config['max_size']  = 100000; //Batas Ukuran

        $this->upload->initialize($config);
        if (!empty($_FILES['gambar']['name'])) {

            if ($this->upload->do_upload('gambar')) {
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

                $gambar = $gbr['file_name'];
                $id_galeri = $this->input->post('id_galeri');
                $nama_gambar = $this->input->post('nama_gambar');
                $keterangan = $this->input->post('keterangan');
                $waktu =  date('Y-m-d h:i:s');

                $data = array(

                    'nama_gambar' => $nama_gambar,
                    'keterangan' => $keterangan,
                    'gambar' => $gambar,
                    'waktu' => $waktu

                );

                
                $where = array(
                    'id_galeri' => $id_galeri
                );

                $this->M_galeri->update_data($where,$data,'tbl_galeri');
                echo $this->session->set_flashdata('msg', 'update');
                redirect('Admin/Galeri');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/Galeri');
            }

        } else {

          $id_galeri = $this->input->post('id_galeri');
          $nama_gambar = $this->input->post('nama_gambar');
          $keterangan = $this->input->post('keterangan');
          $waktu =  date('Y-m-d h:i:s');


          $data = array(

            'nama_gambar' => $nama_gambar,
            'keterangan' => $keterangan,
            'waktu' => $waktu

        );



          $where = array(
            'id_galeri' => $id_galeri
        );

          $cek = $this->M_galeri->update_data($where,$data,'tbl_galeri');
          echo $this->session->set_flashdata('msg', 'update');
          redirect('Admin/Galeri');
      }
  }
}
