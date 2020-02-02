<?php

Class M_anggota extends CI_Model{

    public function getAnggota()
    {
        $query = $this->db->query("SELECT * FROM anggota JOIN divisi ON anggota.divisi_id = divisi.id_divisi");
        return $query->result();
    }

    public function getLimitAnggota()
    {
        $query = $this->db->query("SELECT * FROM anggota JOIN divisi ON anggota.divisi_id = divisi.id_divisi LIMIT 5");
        return $query->result();
    }

    public function hitungAnggota()
    {
        $query = $this->db->query("SELECT COUNT(*) AS totalanggota FROM anggota");
        return $query->result();
    }
}