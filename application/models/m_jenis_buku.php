<?php
    class m_jenis_buku extends CI_Model{

        function __construct() {
            parent::__construct();

        }

        function select() {
            $query  = $this->db->query("SELECT * FROM tabel_jenis_buku");
            return $query->result();
        }

        function insert($data) {
            $this->nama_segmentasi = $data['nama_segmentasi'];
            $this->nomor_rak = $data['nomor_rak'];
            $this->denda = $data['denda'];


            $this->db->insert('tabel_jenis_buku', $this);
        }
        function delete($id) {
            $this->db->delete('tabel_jenis_buku', array('id_segmentasi' => $id));
        }

        function update($data) {

            $this->nama_segmentasi = $data['nama_segmentasi'];
            $this->nomor_rak = $data['nomor_rak'];
            $this->denda = $data['denda'];
            $this->db->update('tabel_jenis_buku', $this, array('id_segmentasi'=>$data['id_segmentasi']));
        }



        function get($id){
            $this->db->where('id_segmentasi', $id);
            $query = $this->db->get('tabel_jenis_buku', 1);
            return $query->result();
        }

    }



?>
