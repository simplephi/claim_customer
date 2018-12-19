<?php if (! defined('BASEPATH')) exit('no direct script allowed');

class c_buku extends CI_Controller{
	function __construct(){
		parent::__construct();
		  $this->load->helper(array('form', 'url'));
		  $this->load->library('upload');
	}
    function index() {

    }
	
	//  $this->load->view('m_buku');
	
	
    public function input() {
		
		$file_name = $this->input->post('nama_pelanggan'); // $_POST =['alamat']
		
        $this->load->model('m_buku');
        
		$config['upload_path'] = './assets/gambar/';
		$config['allowed_types'] = "gif|jpg|jpeg|png";
		$config['overwrite']="true";
		$config['max_size']="20000000";
		$config['max_width']="10000";
		$config['max_height']="10000";
		$config['file_name'] = ''.$file_name;
		$this->upload->initialize($config);

		if(!$this->upload->do_upload()){
			echo  $this->upload->display_errors();

		}
		else {
		$dat = $this->upload->data();
		$data['nama_pelanggan']=  $this->input->post('nama_pelanggan');
        $data['alamat']=  $this->input->post('alamat');
        $data['nama_langganan']=  $this->input->post('nama_langganan');
        $data['pesawat']=  $this->input->post('pesawat');
        $data['telp']=  $this->input->post('telp');
        $data['status']=  $this->input->post('status');
        $data['tagihan']=  $this->input->post('tagihan');
        $data['TLD']=  $this->input->post('TLD');
        $data['memakai']=  $this->input->post('memakai');
        $data['keyakinan']=  $this->input->post('keyakinan');
        $data['penjelasan']=  $this->input->post('penjelasan');
        $data['lain']=  $this->input->post('lain');
        $data['kondisi']=  $this->input->post('kondisi');
        $data['gambar']= $dat['file_name'];
        $data['bulan']=  $this->input->post('bulan');
        $data['id_segmentasi']=  $this->input->post('id_segmentasi');
        $data['tanggal_pengadaan']= date("Y-m-d");
        $this->m_buku->insert($data);
        redirect('admin/tambah_buku');
			
		}
		
    }

    public function delete() {
            $this->load->model('m_buku');
            if($this->uri->segment(3,0)!="") {
                $this->m_buku->delete($this->uri->segment(3, 0));
            }
            redirect('admin/tambah_buku');
    }

	  public function delete_baru() {
            $this->load->model('m_buku');
            if($this->uri->segment(3,0)!="") {
                $this->m_buku->delete_lagi($this->uri->segment(3, 0));
            }
            redirect('admin/daftar_acara');
    }
	
	public function input_baru(){
		
		$this->load->model('m_buku');
		$data['waktu']=  date("Y-m-d");
		$data['nama']=  $this->input->post('nama');
        $data['alamat']=  $this->input->post('alamat');
        $data['telepon']=  $this->input->post('telepon');
        $data['internet']=  $this->input->post('internet');
        $data['alasan']=  $this->input->post('alasan');
        $data['restitusi']=  $this->input->post('restitusi');
        
		$this->m_buku->insert_baru($data);
        redirect('admin/daftar_acara');
		
	}
	
	public function edit_baru(){
		
		$this->load->model('m_buku');
		$data['id_klaim']=  $this->input->post('id_klaim');
		$data['waktu']=  $this->input->post('waktu');
		$data['nama']=  $this->input->post('nama');
        $data['alamat']=  $this->input->post('alamat');
        $data['telepon']=  $this->input->post('telepon');
        $data['internet']=  $this->input->post('internet');
        $data['alasan']=  $this->input->post('alasan');
        $data['restitusi']=  $this->input->post('restitusi');
        
		$this->m_buku->update_baru($data);
        redirect('admin/daftar_acara');
		
	}
	
	
    public function edit() {
        
	$file_name = $this->input->post('nama_pelanggan');
		
        $this->load->model('m_buku');
        
		$config['upload_path'] = './assets/gambar/';
		$config['allowed_types'] = "gif|jpg|jpeg|png";
		$config['overwrite']="true";
		$config['max_size']="20000000";
		$config['max_width']="10000";
		$config['max_height']="10000";
		$config['file_name'] = ''.$file_name;
		$this->upload->initialize($config);

			if(!$this->upload->do_upload()){
			echo  $this->upload->display_errors();

		}
		else{

		
		$dat = $this->upload->data();
            $data['id_pelanggan']= $this->input->post('id_pelanggan');
            $data['nama_pelanggan']=  $this->input->post('nama_pelanggan');
            $data['alamat']=  $this->input->post('alamat');
            $data['nama_langganan']=  $this->input->post('nama_langganan');
            $data['pesawat']=  $this->input->post('pesawat');
            $data['telp']=  $this->input->post('telp');
            $data['status']=  $this->input->post('status');
            $data['tagihan']=  $this->input->post('tagihan');
            $data['TLD']=  $this->input->post('TLD');
			$data['memakai']=  $this->input->post('memakai');
			$data['keyakinan']=  $this->input->post('keyakinan');
			$data['penjelasan']=  $this->input->post('penjelasan');
			$data['lain']=  $this->input->post('lain');
			$data['kondisi']=  $this->input->post('kondisi');
            $data['gambar']=  $dat['file_name'];
            $data['bulan']=  $this->input->post('bulan');
            $data['id_segmentasi']=  $this->input->post('id_segmentasi');
            $data['tanggal_pengadaan']= $this->input->post('tanggal_pengadaan');
            $this->m_buku->update($data);
            redirect('admin/tambah_buku');
        }
	}

}
?>
