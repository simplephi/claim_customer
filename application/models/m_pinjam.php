<?php
    class m_pinjam extends CI_Model{

        function __construct() {
            parent::__construct();

        }

        function select() {
            $query  = $this->db->query("SELECT p.*, b.alamat, b.id_pelanggan, j.*, a.nama_anggota FROM tabel_peminjam p INNER JOIN tabel_pelanggan b ON p.id_pelanggan=b.id_pelanggan INNER JOIN tabel_anggota a ON p.id_anggota=a.id_anggota INNER JOIN tabel_jenis_buku j ON b.id_segmentasi=j.id_segmentasi");
            return $query->result();
        }
        function select_sms(){
          $query = $this->db->query("SELECT p.*, b.alamat, j.*, a.nama_anggota, a.telepon_anggota FROM tabel_peminjam p LEFT JOIN tabel_pelanggan b ON p.id_pelanggan=b.id_pelanggan LEFT JOIN tabel_anggota a ON p.id_anggota=a.id_anggota LEFT JOIN tabel_jenis_buku j ON b.id_segmentasi=j.id_segmentasi");
          return $query->result();
        }
        function select_inbox(){
          $query = $this->db->query("SELECT * FROM inbox WHERE Processed='false'");
          return $query->result();
        }
        function select_kembali($id_pinjam) {
            $query  = $this->db->query("SELECT p.*, b.alamat, j.*, a.nama_anggota, a.status, ADDDATE(p.tanggal_pinjam, INTERVAL 7 DAY) as tanggal_batas FROM tabel_peminjam p INNER JOIN tabel_pelanggan b ON p.id_pelanggan=b.id_pelanggan INNER JOIN tabel_anggota a ON p.id_anggota=a.id_anggota INNER JOIN tabel_jenis_buku j ON b.id_segmentasi=j.id_segmentasi WHERE p.id_pinjam='$id_pinjam'");
            return $query->result();
        }

        function sisa_buku($entry){
          $stokbuku=$entry->telp;
          $this1->telp=$stokbuku-1;
          $this->db->update('tabel_pelanggan', $this1, array('id_pelanggan'=>$entry->id_pelanggan));
        }

        function sisa_edit($entry){
          $stokbuku=$entry->telp;
          $this2->telp=$stokbuku+1;
          $this->db->update('tabel_pelanggan', $this2, array('id_pelanggan'=>$entry->id_pelanggan));
        }

        function kembali($data){
          $this->tanggal_kembali=$data['tanggal_kembali'];
          $this->bayar_denda=$data['bayar_denda'];
          $this->status_peminjaman=$data['status_peminjaman'];
          $this->db->update('tabel_peminjam', $this, array('id_pinjam'=>$data['id_pinjam']));

        }

        function insert($data) {
            $this->id_anggota = $data['id_anggota'];
            $this->id_pelanggan = $data['id_pelanggan'];
            $this->tanggal_pinjam = $data['tanggal_pinjam'];
            $this->tanggal_batas = $data['tanggal_batas'];
            $this->status_peminjaman= $data['status_peminjaman'];


            $this->db->insert('tabel_peminjam', $this);
        }
        function sms_batas($data) {
            $this->DestinationNumber = $data['DestinationNumber'];
            $this->TextDecoded = $data['TextDecoded'];

            $this->db->insert('outbox', $this);
        }
        function delete($id) {
            $this->db->delete('tabel_peminjam', array('id_pinjam' => $id));
        }
        function update_sms($data) {
          //$this1->sms_deadline = $data['sms_deadline'];
          $nilai=$data['sms_deadline'];
          $id_pinjam=$data['id_pinjam'];
          $this->db->query("UPDATE tabel_peminjam SET sms_deadline='$nilai' WHERE id_pinjam='$id_pinjam'");
          //$this->db->update('tabel_peminjam', $this1, array('id_pinjam'=>$data['id_pinjam']));
        }

        function update($data) {
          $this->id_anggota = $data['id_anggota'];
          $this->id_pelanggan = $data['id_pelanggan'];
          $this->tanggal_pinjam = $data['tanggal_pinjam'];
          $this->tanggal_batas = $data['tanggal_batas'];


          $this->db->update('tabel_peminjam', $this, array('id_pinjam'=>$data['id_pinjam']));
        }



        function get($id){
            $this->db->where('id_pinjam', $id);
            $query = $this->db->get('tabel_peminjam', 1);
            return $query->result();
        }
        function denda(){
          $query = $this->db->query('SELECT a.*, b.* FROM tabel_peminjam a LEFT JOIN tabel_anggota b ON a.id_anggota=b.id_anggota WHERE a.bayar_denda!="0"');
          return $query->result();
        }

    }



?>
