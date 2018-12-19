<?php
    class m_buku extends CI_Model{

        function __construct() {
            parent::__construct();

        }

		 function select_baru() {
            $query  = $this->db->query("SELECT * FROM tabel_acara");
            return $query->result();
        }
		
		 function select_baru1($id_klaim) {
            $query  = $this->db->query("SELECT * FROM tabel_acara Where id_klaim = '$id_klaim'");
            return $query->result();
        }
		
        function select() {
            $query  = $this->db->query("SELECT b.*, j.nama_segmentasi FROM tabel_pelanggan as b INNER JOIN tabel_jenis_buku as j
              ON b.id_segmentasi=j.id_segmentasi");
            return $query->result();
        }
		
		function sembarang($id) {
            $query  = $this->db->query("SELECT b.*, j.nama_segmentasi FROM tabel_pelanggan as b INNER JOIN tabel_jenis_buku as j
              ON b.id_segmentasi=j.id_segmentasi Where b.id_pelanggan = '$id'");
            return $query->result();
        }
		
		public function record_count() {
			return $this->db->count_all("tabel_pelanggan");
		}

		public function halaman($limit, $start) {
		$this->db->limit($limit, $start);
		$query = $this->db->get("tabel_pelanggan");
		if($query->num_rows() > 0) {
			foreach($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	
	function insert_baru($data){
			$this->waktu = $data['waktu'];
            $this->nama = $data['nama'];
            $this->alamat = $data['alamat'];
            $this->telepon = $data['telepon'];
            $this->internet = $data['internet'];
            $this->alasan = $data['alasan'];
            $this->restitusi = $data['restitusi'];
		
		  $this->db->insert('tabel_acara', $this);
		
	}
	
        function insert($data) {
            $this->nama_pelanggan = $data['nama_pelanggan'];
            $this->alamat = $data['alamat'];
            $this->nama_langganan = $data['nama_langganan'];
            $this->pesawat = $data['pesawat'];
            $this->telp = $data['telp'];
            $this->bulan = $data['bulan'];
            $this->status = $data['status'];
            $this->tagihan = $data['tagihan'];
            $this->TLD = $data['TLD'];
            $this->memakai = $data['memakai'];
            $this->keyakinan = $data['keyakinan'];
            $this->penjelasan = $data['penjelasan'];
            $this->lain = $data['lain'];
            $this->kondisi = $data['kondisi'];
            $this->gambar = $data['gambar'];
            $this->id_segmentasi = $data['id_segmentasi'];
            $this->tanggal_pengadaan = $data['tanggal_pengadaan'];

            $this->db->insert('tabel_pelanggan', $this);
        }
        function delete($id) {
            $this->db->delete('tabel_pelanggan', array('id_pelanggan' => $id));
        }
		
		function delete_lagi($id) {
            $this->db->delete('tabel_acara', array('id_klaim' => $id));
        }

		function update_baru($data) {
          $this->waktu = $data['waktu'];
          $this->nama = $data['nama'];
          $this->alamat = $data['alamat'];
          $this->telepon = $data['telepon'];
          $this->internet = $data['internet'];
          $this->alasan = $data['alasan'];
          $this->restitusi= $data['restitusi'];
          
		  $this->db->update('tabel_acara', $this, array('id_klaim'=>$data['id_klaim']));
        }
		
		
        function update($data) {
          $this->nama_pelanggan = $data['nama_pelanggan'];
          $this->alamat = $data['alamat'];
          $this->nama_langganan = $data['nama_langganan'];
          $this->pesawat = $data['pesawat'];
          $this->telp = $data['telp'];
          $this->bulan = $data['bulan'];
          $this->status = $data['status'];
          $this->tagihan = $data['tagihan'];
          $this->TLD = $data['TLD'];
		  $this->memakai = $data['memakai'];
            $this->keyakinan = $data['keyakinan'];
            $this->penjelasan = $data['penjelasan'];
            $this->lain = $data['lain'];
            $this->kondisi = $data['kondisi'];
          $this->gambar = $data['gambar'];
          $this->id_segmentasi = $data['id_segmentasi'];
          $this->tanggal_pengadaan = $data['tanggal_pengadaan'];
            $this->db->update('tabel_pelanggan', $this, array('id_pelanggan'=>$data['id_pelanggan']));
        }

        function get($id){
            $this->db->where('id_pelanggan', $id);
            $query = $this->db->get('tabel_pelanggan', 1);
            return $query->result();
        }

        function cari($key){
          $this->db->like("alamat", $key);
          $this->db->or_like("nama_langganan", $key);
          $this->db->or_like("bulan", $key);
          $query = $this->db->get("tabel_pelanggan");
            return $query->result();
        }
		
		function search($key){
          $this->db->like("alamat", $key);
          $this->db->or_like("nama_langganan", $key);
          $this->db->or_like("bulan", $key);
          $query = $this->db->get("tabel_pelanggan");
            return $query->result();
        }
		

    }
?>
