<?php
    class m_user extends CI_Model{

        function __construct() {
            parent::__construct();

        }

        function select() {
            $query  = $this->db->query("SELECT * FROM tabel_user");
            return $query->result();
        }

        function insert($data) {
            $this->username = $data['username'];
            $this->password = $data['password'];
            $this->nama_user = $data['nama_user'];
            $this->level = $data['level'];


            $this->db->insert('tabel_user', $this);
        }
        function delete($id) {
            $this->db->delete('tabel_user', array('id_user' => $id));
        }

        function update($data) {
            $this->username = $data['username'];
            $this->password = $data['password'];
            $this->nama_user = $data['nama_user'];
            $this->level = $data['level'];
            $this->db->update('tabel_user', $this, array('id_user'=>$data['id_user']));
        }



        function get($id){
            $this->db->where('id_user', $id);
            $query = $this->db->get('tabel_user', 1);
            return $query->result();
        }

    }



?>
