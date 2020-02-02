<?php

Class M_divisi extends CI_Model{

    public function getDivisi()
    {
        $query = $this->db->query("SELECT * FROM divisi");
        return $query->result();
    }

    public function hitungDivisi()
    {
        $query = $this->db->query("SELECT COUNT(*) AS totaldivisi FROM divisi");
        return $query->result();
    }

    public function getDivisiIT()
    {
        $query = $this->db->query("SELECT * FROM divisi WHERE id_divisi='1'");
        return $query->result();
    }
}