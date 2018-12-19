<?php
    class m_denda extends CI_Model{

        function __construct() {
            parent::__construct();

        }

        function select() {
            $query  = $this->db->query("SELECT a.*, d.total_denda, d.id_denda FROM tabel_anggota a INNER JOIN tabel_denda d ON a.id_anggota=d.id_anggota");
            return $query->result();
        }

        function insert($data) {
            $this->id_anggota = $data['id_anggota'];
            $this->total_denda= $data['total_denda'];


            $this->db->insert('tabel_denda', $this);
        }
        function delete($id) {
            $this->db->delete('tabel_denda', array('id_denda' => $id));
        }

        function update($data) {
            $this->id_anggota = $data['id_anggota'];
            $this->total_denda= $data['total_denda'];
            $this->db->update('tabel_denda', $this, array('id_denda'=>$data['id_denda']));
        }
        function bayar_denda($data) {
            $this->total_denda= $data['total_denda'];
            $this->db->update('tabel_denda', $this, array('id_denda'=>$data['id_denda']));
        }



        function get($id){
            $this->db->where('id_anggota', $id);
            $query = $this->db->get('tabel_denda', 1);
            return $query->result();
        }

    }



?>
