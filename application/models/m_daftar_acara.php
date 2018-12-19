<?php
    class m_daftar_acara extends CI_Model{

        function __construct() {
            parent::__construct();

        }

        function select() {
            $query  = $this->db->query("SELECT * FROM tabel_acara");
            return $query->result();
        }
		
		
		public function record_count() {
			return $this->db->count_all("tabel_acara");
		}

		public function halaman($limit, $start) {
		$this->db->limit($limit, $start);
		$query = $this->db->get("tabel_acara");
		if($query->num_rows() > 0) {
			foreach($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

        function insert($data) {
            $this->isbn = $data['isbn'];
            $this->judul_buku = $data['judul_buku'];
            $this->pengarang_buku = $data['pengarang_buku'];
            $this->tahun_terbit = $data['tahun_terbit'];
            $this->stok_buku = $data['stok_buku'];
            $this->penerbit_buku = $data['penerbit_buku'];
            $this->kolasi = $data['kolasi'];
            $this->bahasa = $data['bahasa'];
            $this->deskripsi = $data['deskripsi'];
            $this->memakai = $data['memakai'];
            $this->keyakinan = $data['keyakinan'];
            $this->penjelasan = $data['penjelasan'];
            $this->lain = $data['lain'];
            $this->kondisi = $data['kondisi'];
            $this->gambar = $data['gambar'];
            $this->id_jenis_buku = $data['id_jenis_buku'];
            $this->tanggal_pengadaan = $data['tanggal_pengadaan'];

            $this->db->insert('tabel_acara', $this);
        }
        function delete($id) {
            $this->db->delete('tabel_acara', array('id_pelanggan' => $id));
        }

        function update($data) {
          $this->isbn = $data['isbn'];
          $this->judul_buku = $data['judul_buku'];
          $this->pengarang_buku = $data['pengarang_buku'];
          $this->tahun_terbit = $data['tahun_terbit'];
          $this->stok_buku = $data['stok_buku'];
          $this->penerbit_buku = $data['penerbit_buku'];
          $this->kolasi = $data['kolasi'];
          $this->bahasa = $data['bahasa'];
          $this->deskripsi = $data['deskripsi'];
		  $this->memakai = $data['memakai'];
            $this->keyakinan = $data['keyakinan'];
            $this->penjelasan = $data['penjelasan'];
            $this->lain = $data['lain'];
            $this->kondisi = $data['kondisi'];
          $this->gambar = $data['gambar'];
          $this->id_jenis_buku = $data['id_jenis_buku'];
          $this->tanggal_pengadaan = $data['tanggal_pengadaan'];
            $this->db->update('tabel_acara', $this, array('id_pelanggan'=>$data['id_pelanggan']));
        }

        function get($id){
            $this->db->where('id_pelanggan', $id);
            $query = $this->db->get('tabel_acara', 1);
            return $query->result();
        }

        function cari($key){
          $this->db->like("judul_buku", $key);
          $this->db->or_like("pengarang_buku", $key);
          $this->db->or_like("penerbit_buku", $key);
          $query = $this->db->get("tabel_acara");
            return $query->result();
        }
		
		function search($key){
          $this->db->like("judul_buku", $key);
          $this->db->or_like("pengarang_buku", $key);
          $this->db->or_like("penerbit_buku", $key);
          $query = $this->db->get("tabel_acara");
            return $query->result();
        }
		

    }
?>
