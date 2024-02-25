<?php defined('BASEPATH') or exit('No direct script access allowed');

class Siswa  extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('M_siswa');
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
        $data['data_siswa'] = $this->M_siswa->tampil_data();
        $this->load->view('Admin/List.siswa.php', $data);
    }

    public function delete($id_siswa)
    {
        $id_siswa = $this->input->post('id_siswa');
        $this->M_siswa->delete_data($id_siswa);
        echo $this->session->set_flashdata('msg', 'deleted');
        redirect('Admin/Siswa');
    }

    public function add()
    {
       date_default_timezone_set("Asia/Jakarta");
        $config['upload_path'] = './assets/upload/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config['max_size']  = 10000; //Batas Ukuran

        $this->upload->initialize($config);
        if (!empty($_FILES['foto']['name'])) {

            if ($this->upload->do_upload('foto')) {
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

                $foto = $gbr['file_name'];

                $nisn = $this->input->post('nisn');
                $nama_siswa = $this->input->post('nama_siswa');
                $jenis_kelamin = $this->input->post('jenis_kelamin');
                $kelas = $this->input->post('kelas');
                $no_hp = $this->input->post('no_hp');
                $no_hp_ortu = $this->input->post('no_hp_ortu');
                $keterangan = $this->input->post('keterangan');
                $waktu =  date('Y-m-d h:i:s');

                $data = array(

                    'nisn' => $nisn,
                    'nama_siswa' => $nama_siswa,
                    'jenis_kelamin' => $jenis_kelamin,
                    'kelas' => $kelas,
                    'no_hp' => $no_hp,
                    'no_hp_ortu' => $no_hp_ortu,
                    'keterangan' => $keterangan,
                    'foto' => $foto,
                    'waktu' => $waktu

                );
                $this->M_siswa->input_data($data, 'tbl_data_siswa');
                echo $this->session->set_flashdata('msg', 'success');
                redirect('Admin/Siswa');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/Siswa');
            }
        } else {

            redirect('Admin/Siswa');
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
        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
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

                $foto = $gbr['file_name'];
                $id_siswa = $this->input->post('id_siswa');
                $nisn = $this->input->post('nisn');
                $nama_siswa = $this->input->post('nama_siswa');
                $jenis_kelamin = $this->input->post('jenis_kelamin');
                $kelas = $this->input->post('kelas');
                $no_hp = $this->input->post('no_hp');
                $no_hp_ortu = $this->input->post('no_hp_ortu');
                $keterangan = $this->input->post('keterangan');
                $waktu =  date('Y-m-d h:i:s');

                $data = array(
                    'nisn' => $nisn,
                    'nama_siswa' => $nama_siswa,
                    'jenis_kelamin' => $jenis_kelamin,
                    'kelas' => $kelas,
                    'no_hp' => $no_hp,
                    'no_hp_ortu' => $no_hp_ortu,
                    'keterangan' => $keterangan,
                    'foto' => $foto,
                    'waktu' => $waktu
                );

                $where = array(
                    'id_siswa' => $id_siswa
                );

                $this->M_siswa->update_data($where,$data,'tbl_data_siswa');
                echo $this->session->set_flashdata('msg', 'update');
                redirect('Admin/Siswa');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/Siswa');
            }

        } else {

          $id_siswa = $this->input->post('id_siswa');
          $nisn = $this->input->post('nisn');
          $nama_siswa = $this->input->post('nama_siswa');
          $jenis_kelamin = $this->input->post('jenis_kelamin');
          $kelas = $this->input->post('kelas');
          $no_hp = $this->input->post('no_hp');
          $no_hp_ortu = $this->input->post('no_hp_ortu');
          $keterangan = $this->input->post('keterangan');
          $waktu =  date('Y-m-d h:i:s');



          $data = array(
            'nisn' => $nisn,
            'nama_siswa' => $nama_siswa,
            'jenis_kelamin' => $jenis_kelamin,
            'kelas' => $kelas,
            'no_hp' => $no_hp,
            'no_hp_ortu' => $no_hp_ortu,
            'keterangan' => $keterangan,
            'waktu' => $waktu
        );



          $where = array(
            'id_siswa' => $id_siswa
        );

          $cek = $this->M_siswa->update_data($where,$data,'tbl_data_siswa');
          echo $this->session->set_flashdata('msg', 'update');
          redirect('Admin/Siswa');
      }
  }
}
