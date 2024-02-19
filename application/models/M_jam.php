<?php
class M_jam extends CI_Model
{

    private $_table = "tbl_jam";

    function tampil_data()
    {
        return $this->db->get('tbl_jam');
    }
    function detail_user($id_jam)
    {
        $this->db->where('id_jam',$id_jam);
        return $this->db->get('tbl_jam');
    }
    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function delete_data($id_jam)
    {
        $hsl = $this->db->query("DELETE FROM tbl_jam WHERE id_jam='$id_jam'");
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
        $this->db->select('count(tbl_jam.id_jam) as jumlah');
        $hsl = $this->db->get('tbl_jam');
        return $hsl;
    }
}
