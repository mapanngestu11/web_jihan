<?php
class M_data_absen extends CI_Model
{

    private $_table = "tbl_data_absen";

    function tampil_data()
    {
        return $this->db->get('tbl_data_absen');
    }
    function detail_user($id_absen)
    {
        $this->db->where('id_absen',$id_absen);
        return $this->db->get('tbl_data_absen');
    }
    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function delete_data($id_absen)
    {
        $hsl = $this->db->query("DELETE FROM tbl_data_absen WHERE id_absen='$id_absen'");
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

    function jumlah_data_siswa()
    {
        $this->db->select('count(tbl_data_absen.id_absen) as jumlah');
        $this->db->where('status','siswa');
        $this->db->where('keterangan','Tepat Waktu');
        $hsl = $this->db->get('tbl_data_absen');
        return $hsl;
    }
    function jumlah_data_siswa_telat()
    {
        $this->db->select('count(tbl_data_absen.id_absen) as jumlah');
        $this->db->where('status','siswa');
        $this->db->where_not_in('keterangan','Tepat Waktu');
        $hsl = $this->db->get('tbl_data_absen');
        return $hsl;
    }
}
