<?php
    class m_anggota extends CI_Model{

        function __construct() {
            parent::__construct();

        }

        function select() {
            $query  = $this->db->query("SELECT * FROM tabel_anggota");
            return $query->result();
        }
        function insert_member($entry) {
            $this1->username = $entry->nim_nip;
            $this1->password = $entry->password_anggota;
            $this1->level='member';

            $this->db->insert('tabel_user', $this1);
        }
        function insert($data) {
            $this->nama_anggota = $data['nama_anggota'];
            $this->alamat_anggota = $data['alamat_anggota'];
            $this->telepon_anggota = $data['telepon_anggota'];
            $this->email_anggota = $data['email_anggota'];
            $this->tanggal_daftar = $data['tanggal_daftar'];
            $this->tanggal_expired = $data['tanggal_expired'];
            $this->nim_nip = $data['nim_nip'];
            $this->status = $data['status'];
            $this->password_anggota = $data['password_anggota'];
            $this->anggota = $data['anggota'];

            $this->db->insert('tabel_anggota', $this);
        }
        function delete($id) {
            $this->db->delete('tabel_anggota', array('id_anggota' => $id));
        }

        function update($data) {

          $this->nama_anggota = $data['nama_anggota'];
          $this->alamat_anggota = $data['alamat_anggota'];
          $this->telepon_anggota = $data['telepon_anggota'];
          $this->email_anggota = $data['email_anggota'];
          $this->nim_nip = $data['nim_nip'];
          $this->status = $data['status'];

          $this->anggota = $data['anggota'];
            $this->db->update('tabel_anggota', $this, array('id_anggota'=>$data['id_anggota']));
        }
        function accept($data){
            $this->anggota = $data['anggota'];
            $this->db->update('tabel_anggota', $this, array('id_anggota'=>$data['id_anggota']));
        }



        function get($id){
            $this->db->where('id_anggota', $id);
            $query = $this->db->get('tabel_anggota', 1);
            return $query->result();
        }

    }



?>
