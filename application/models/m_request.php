<?php
    class m_request extends CI_Model{

        function __construct() {
            parent::__construct();

        }

        function select_inbox(){
          $query = $this->db->query("SELECT * FROM inbox WHERE Processed='false'");
          return $query->result();
        }

        function get_peminjaman($nim){
          $query = $this->db->query("SELECT p.*, b.judul_buku, a.telepon_anggota, j.denda, a.status FROM
            tabel_peminjam p LEFT JOIN tabel_anggota a ON
            p.id_anggota=a.id_anggota LEFT JOIN tabel_pelanggan b ON
            p.id_pelanggan=b.id_pelanggan LEFT JOIN tabel_jenis_buku j ON j.id_segmentasi=b.id_segmentasi WHERE a.nim_nip='$nim'  AND p.status_peminjaman='dipinjam'");
          return $query->result();

        }
        function get_buku($data){
          $f= substr($data,1);
          $this->db->like("judul_buku", $f);
          $this->db->limit(1);
          $query = $this->db->get("tabel_pelanggan");
          //$query = $this->db->query("SELECT * FROM tabel_pelanggan WHERE judul_buku LIKE '%.$data.%'");
          return $query->result();

        }
        function sms_peminjaman($data) {
            $this->DestinationNumber = $data['DestinationNumber'];
            $this->TextDecoded = $data['TextDecoded'];

            $this->db->insert('outbox', $this);
        }
        function sms_dibalas($data) {
            $query = $this->db->query("UPDATE inbox SET Processed='true'  WHERE SenderNumber='$data'");

        }

    }



?>
