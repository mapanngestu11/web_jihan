<?php
class M_galeri extends CI_Model
{

    private $_table = "tbl_galeri";

    function tampil_data()
    {
        return $this->db->get('tbl_galeri');
    }
    function detail_user($id_galeri)
    {
        $this->db->where('id_galeri',$id_galeri);
        return $this->db->get('tbl_galeri');
    }
    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function delete_data($id_galeri)
    {
        $hsl = $this->db->query("DELETE FROM tbl_galeri WHERE id_galeri='$id_galeri'");
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
        $this->db->select('count(tbl_galeri.id_galeri) as jumlah');
        $hsl = $this->db->get('tbl_galeri');
        return $hsl;
    }
}
