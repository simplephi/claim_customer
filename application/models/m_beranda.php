<?php
    class m_user extends CI_Model{

        function __construct() {
            parent::__construct();

        }

        function count_buku() {
            $query  = $this->db->query("SELECT COUNT(judul_buku ) FROM tabel_pelanggan");
            return $query->result();
        }
        function count_anggota() {
            $query  = $this->db->query("SELECT COUNT(nama_anggota ) FROM tabel_anggota");
            return $query->result();
        }
        function count_douku(){
          
        }


    }



?>
