<?php
class M_data_absen extends CI_Model
{

    private $_table = "tbl_data_absen";

    function tampil_data()
    {
        return $this->db->get('tbl_data_absen');
    }
    function tampil_data_absen_siswa()
    {
        $this->db->select('
            a.id_siswa,
            b.id_absen,
            a.nisn,
            a.nama_siswa,
            a.jenis_kelamin,
            a.kelas,
            b.jam_absen,
            b.keterangan,
            b.status');
        $this->db->from('tbl_data_siswa as a');
        $this->db->where('b.status','siswa');
        $this->db->join('tbl_data_absen as b', 'b.nisn = a.nisn','left');
        $query = $this->db->get();
        return $query;

    }
    function tampil_data_absen_guru()
    {
        $this->db->select('
            a.id_guru,
            b.id_absen,
            a.nip,
            a.nama_guru,
            a.jenis_kelamin,
            a.mapel,
            b.jam_absen,
            b.keterangan,
            b.status');
        $this->db->from('tbl_data_guru as a');
        $this->db->where('b.status','guru');
        $this->db->join('tbl_data_absen as b', 'b.nisn = a.nip','left');
        $query = $this->db->get();
        return $query;
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

    function tampil_data_absen_byTanggal($tanggal1,$tanggal2)
    {
        $this->db->select('
            a.id_siswa,
            b.id_absen,
            a.nisn,
            a.nama_siswa,
            a.jenis_kelamin,
            a.kelas,
            b.jam_absen,
            b.keterangan,
            b.status,
            b.waktu');
        $this->db->from('tbl_data_siswa as a');
        $this->db->where('b.waktu >=',$tanggal1);
        $this->db->where('b.waktu  <=',$tanggal2);
        $this->db->where('b.status','siswa');
        $this->db->join('tbl_data_absen as b', 'b.nisn = a.nisn','left');
        $query = $this->db->get();
        return $query;

    }

}
