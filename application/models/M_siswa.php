<?php
class M_siswa extends CI_Model
{

    private $_table = "tbl_data_siswa";

    function tampil_data()
    {
        return $this->db->get('tbl_data_siswa');
    }
    function detail_user($id_siswa)
    {
        $this->db->where('id_siswa',$id_siswa);
        return $this->db->get('tbl_data_siswa');
    }
    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function delete_data($id_siswa)
    {
        $hsl = $this->db->query("DELETE FROM tbl_data_siswa WHERE id_siswa='$id_siswa'");
        return $hsl;
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function update_status($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function jumlah_data()
    {
        $this->db->select('count(tbl_data_siswa.id_siswa) as jumlah');
        $hsl = $this->db->get('tbl_data_siswa');
        return $hsl;
    }

    function cek_nis($cek)
    {
        $this->db->where('nisn',$cek);
        return $this->db->get('tbl_data_siswa');
    }
}
