<?php
    class m_report extends CI_Model{

        function __construct() {
            parent::__construct();

        }

        function get_buku($bulan, $tahun) {

              $query = $this->db->query("SELECT b.*, j.nama_segmentasi  FROM
                tabel_pelanggan b LEFT JOIN tabel_jenis_buku j ON
                b.id_segmentasi=j.id_segmentasi WHERE b.tanggal_pengadaan LIKE
                '%$tahun-$bulan%'");

              return $query->result();
        }
        function get_anggota($bulan, $tahun) {

              $query = $this->db->query("SELECT * FROM
                tabel_acara WHERE waktu LIKE
                '%$tahun-$bulan%'");

              return $query->result();
        }
        function get_peminjaman($bulan, $tahun){
          $query = $this->db->query("SELECT p.*, b.judul_buku, b.id_pelanggan,
            j.*, a.nama_anggota, a.nim_nip FROM tabel_peminjam p INNER JOIN tabel_pelanggan
            b ON p.id_pelanggan=b.id_pelanggan INNER JOIN tabel_anggota a ON
            p.id_anggota=a.id_anggota INNER JOIN tabel_jenis_buku j ON
             b.id_segmentasi=j.id_segmentasi WHERE tanggal_kembali LIKE
             '%$tahun-$bulan%'");

             return $query->result();
        }

    }



?>
