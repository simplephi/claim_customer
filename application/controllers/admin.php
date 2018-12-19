<?php  if ( ! defined('BASEPATH')) exit('no direct script access allowed');
session_start();
class admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('username')=="") {
			redirect('auth');
		}
		$this->sms_deadline();
		$this->request_sms();

	}
	public function request_sms(){
			$this->load->model("m_request");

			$sms=$this->m_request->select_inbox();

			foreach ($sms as $s) {
				$isi_sms=$s->TextDecoded;
				$sender_number=$s->SenderNumber;
				$ok=substr($isi_sms, 0,6);
				$ok=strtoupper($ok);
				if($ok=="PERPUS"){
						$explode=explode(" ",$isi_sms);
						$tipe_request=$explode[1];
						//echo $tipe_request;
						if(strtoupper($tipe_request)=="PEMINJAMAN"){
							$nim=$explode[2];
							$peminjaman=$this->m_request->get_peminjaman($nim);
							$nomor_telepon="+62".substr($peminjaman[0]->telepon_anggota,1);

							if($peminjaman!=null && $sender_number==$nomor_telepon){
								$balas_sms="Buku yang anda pinjam adalah ";
								foreach ($peminjaman as $k) {
									$buku="".$k->judul_buku." dengan batas pengembalian".$k->tanggal_batas.", ";
									$balas_sms = "".$balas_sms." ".$buku;
									$balas_sms = substr($balas_sms, 0, -2);
								}
							}else {
								$balas_sms="Anda tidak meminjam buku apapun";
							}
							$data['TextDecoded']=$balas_sms;
							$data['DestinationNumber']=$sender_number;
							//var_dump($data);
							$this->m_request->sms_peminjaman($data);

						$this->m_request->sms_dibalas($sender_number);

						}else if(strtoupper($tipe_request)=="DENDA"){
							$nim=$explode[2];
							$bayar_denda=0;
							$denda=$this->m_request->get_peminjaman($nim);
							//var_dump($denda);
							if($denda!=null){
								$bayar_denda=0;
								$balas_sms="Denda yang harus dibayar adalah ";
									foreach ($denda as $k) {
									$denda_buku=$k->denda;
					        $id_anggota=$k->id_anggota;
					        $d=$k->tanggal_batas;
					    		$r=date("Y-m-d");
					        $tanggal_kembali=strtotime("$r");
					        $tanggal_batas=strtotime("$d");
									if($tanggal_kembali>$tanggal_batas){
										$datediff=$tanggal_kembali-$tanggal_batas;
										$interval=floor($datediff/(60*60*24));
										if($interval>0 && $k->status!="dosen"){
											$bayar_denda=$bayar_denda+($interval*$denda_buku);
										}else{
											$bayar_denda=0;
										}
									}
								}
								$balas_sms = $balas_sms."Rp".$bayar_denda;

							}else {
								$balas_sms="Anda tidak meminjam buku apapun";
							}
							//echo $balas_sms;
							$data['TextDecoded']=$balas_sms;
							$data['DestinationNumber']=$sender_number;
							//var_dump($data);
							$this->m_request->sms_peminjaman($data);

							$this->m_request->sms_dibalas($sender_number);

						}else if(strtoupper($tipe_request)=="BUKU"){
							$buku="";
							$panjang=sizeof($explode);
							for($i=2;$i<$panjang;$i++){
								$buku=$buku." ".$explode[$i];
							}
							//echo $buku;
							$get_buku=$this->m_request->get_buku($buku);

							if($get_buku!=null){
								$judul_buku=$get_buku[0]->judul_buku;
								$stok=$get_buku[0]->stok_buku;
								$balas_sms="Stok buku ".$judul_buku." yang tersedia adalah ".$stok." Buku";

							}else {
								$balas_sms="Anda tidak meminjam buku apapun";
							}
							//echo $balas_sms;
							$data['TextDecoded']=$balas_sms;
							$data['DestinationNumber']=$sender_number;
							//var_dump($data);
							$this->m_request->sms_peminjaman($data);

							$this->m_request->sms_dibalas($sender_number);

						}
				}

			}


	}

	public function sms_deadline(){

		$this->load->model('m_pinjam');
		$peminjaman=$this->m_pinjam->select_sms();

		foreach ($peminjaman as $k) {
			$now=date('Y-m-d');
			$batas=$k->tanggal_batas;

			$now=strtotime("$now");
			$batas=strtotime("$batas");
			if($now<$batas){
				$datediff=$batas-$now;
				$interval=floor($datediff/(60*60*24));

				if($interval<2 && $k->sms_deadline=="no"){
					$data['TextDecoded']="Batas pengembalian buku ".$k->judul_buku." adalah tanggal ".$k->tanggal_batas.". Harap segera di kembalikan ke Perpustakaan Fakultas Teknik";
					$data['DestinationNumber']=$k->telepon_anggota;
					//var_dump($data);
					$this->m_pinjam->sms_batas($data);
					$data1['id_pinjam']=$k->id_pinjam;
					$data1['sms_deadline']="yes";
					$this->update_sms($data1);
				}
			}


		}
	}
	private function update_sms($data){
		$this->load->model('m_pinjam');
		$this->m_pinjam->update_sms($data);
	}
	public function index() {
		$this->load->model('m_pinjam');
		$data['index']=$this->uri->segment(3, 0);
		$data['pinjam_buku']=$this->m_pinjam->select();
		$data['username'] = $this->session->userdata('username');
		$data['menu']='beranda';
		$this->load->view('admin/index', $data);
	}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect(base_url());
	}

	public function tambah_buku(){
		$this->load->model('m_buku');
		$this->load->model('m_jenis_buku');
		$data['daftar_buku']=$this->m_buku->select();
		$data['jenis_buku']=$this->m_jenis_buku->select();
		$data['menu']='daftar_buku';
		$data['index']=$this->uri->segment(3,0);
		$this->load->view('admin/index.php',$data);

	}
	public function tambah_buku_edit(){
		$this->load->model('m_buku');
		$this->load->model('m_jenis_buku');
		$data['index']=$this->uri->segment(3,0);
		$data['entry']=$this->m_buku->get($this->uri->segment(3,0));
		if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
			echo "error";
		}else{
			$data['menu']='tambah_buku';
			$data['entry']=$data['entry'][0];
			$data['jenis_buku']=$this->m_jenis_buku->select();
			$this->load->view('admin/index.php',$data);
		}

	}
	public function jenis_buku(){

		$this->load->model('m_jenis_buku');
		$data['index']=$this->uri->segment(3, 0);
		$data['menu']='jenis_buku';
		$data['jenis_buku']=$this->m_jenis_buku->select();
		$this->load->view('admin/index.php',$data);

	}

	public function jenis_buku_edit(){
		$this->load->model('m_jenis_buku');
		$data['index']=$this->uri->segment(3, 0);
		$data['entry'] = $this->m_jenis_buku->get($this->uri->segment(3, 0));
		if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
				echo "error";
		}else{
			$data["menu"]="jenis_buku";
			$data["entry"]= $data['entry'][0];
			$data["jenis_buku"]= $this->m_jenis_buku->select();
			$this->load->view('admin/index.php', $data);
		}
	}

	public function daftar_buku(){
		$this->load->model('m_buku');
		$this->load->model('m_jenis_buku');
		$data['daftar_buku']=$this->m_buku->select();
		$data['jenis_buku']=$this->m_jenis_buku->select();
		$data['menu']='daftar_buku';
		$this->load->view('admin/index.php',$data);

	}
	
	public function daftar_acara(){
		$this->load->model('m_buku');
		$data['daftar_acara']=$this->m_buku->select_baru();
		$data['menu']='daftar_acara';
		$this->load->view('admin/index.php',$data);

	}
	
	public function daftar_anggota(){
		$this->load->model('m_anggota');
		$data['daftar_anggota']=$this->m_anggota->select();
		$data['menu']='daftar_anggota';
		$this->load->view('admin/index.php',$data);

	}
	public function daftar_user(){

		$this->load->model('m_user');
		$data['index']=$this->uri->segment(3, 0);
		$data['menu']='daftar_user';
		$data['daftar_user']=$this->m_user->select();
		$this->load->view('admin/index.php',$data);

	}
	public function daftar_user_edit(){
		$this->load->model('m_user');
		$data['index']=$this->uri->segment(3, 0);
		$data['entry'] = $this->m_user->get($this->uri->segment(3, 0));
		if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
				echo "error";
		}else{
			$data["menu"]="daftar_user";
			$data["entry"]= $data['entry'][0];
			$data["daftar_user"]= $this->m_user->select();
			$this->load->view('admin/index.php', $data);
		}
	}

	public function tambah_anggota(){
		$this->load->model('m_anggota');
		$data['daftar_anggota']=$this->m_anggota->select();
		$data['menu']='tambah_anggota';
		$data['index']=$this->uri->segment(3,0);
		$this->load->view('admin/index.php',$data);

	}
	public function anggota_edit(){
		$this->load->model('m_anggota');
		$data['index']=$this->uri->segment(3, 0);
		$data['entry'] = $this->m_anggota->get($this->uri->segment(3, 0));
		if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
				echo "error";
		}else{
			$data["menu"]="tambah_anggota";
			$data["entry"]= $data['entry'][0];
			$data["daftar_anggota"]= $this->m_anggota->select();
			$this->load->view('admin/index.php', $data);
		}
	}
	public function pinjam_buku(){
		$this->load->model('m_pinjam');
		$this->load->model('m_anggota');
		$this->load->model('m_buku');
		$data['index']=$this->uri->segment(3, 0);
		$data['pinjam_buku']=$this->m_pinjam->select();
		$data['menu']='pinjam_buku';
		$data['buku']=$this->m_buku->select();
		$data['anggota']=$this->m_anggota->select();
		$this->load->view('admin/index.php',$data);
	}
	public function daftar_pinjam(){
		$this->load->model('m_pinjam');
		$this->load->model('m_anggota');
		$this->load->model('m_buku');
		$data['menu']='daftar_pinjam';
		$data['index']=$this->uri->segment(3, 0);
		$data['pinjam_buku']=$this->m_pinjam->select();
		$data['buku']=$this->m_buku->select();
		$data['anggota']=$this->m_anggota->select();
		$this->load->view('admin/index.php',$data);
	}
	public function pengembalian_buku(){
			$this->load->model('m_pinjam');
			$data['menu']='pengembalian_buku';
			$data['pinjam_buku']=$this->m_pinjam->select();
			$this->load->view('admin/index.php',$data);
	}
	public function denda(){
		$kembalian=$this->input->get('kembalian');
		if($kembalian!='0'){
			echo "<script>alert('Kembalian = Rp.".$kembalian."')</script>";
		}
		$this->load->model('m_denda');
		$data['menu']='denda';
		$data['denda']=$this->m_denda->select();
		$this->load->view('admin/index.php',$data);
	}

	public function report_buku(){
		$data['menu']='report_buku';
		$this->load->view('admin/index.php',$data);
	}

	public function report_anggota(){
		$data['menu']='report_anggota';
		$this->load->view('admin/index.php',$data);
	}

	public function report_peminjaman(){
		$data['menu']='report_peminjaman';
		$this->load->view('admin/index.php',$data);
	}
}
?>
