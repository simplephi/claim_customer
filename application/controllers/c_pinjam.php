<?php if (! defined('BASEPATH')) exit('no direct script allowed');

class c_pinjam extends CI_Controller{

    function index() {

    }
    public function input() {
        $this->load->model('m_pinjam');
        $id_pelanggan=$this->input->post('id_pelanggan');
        //print_r($id_pelanggan);
        //var_dump($id_pelanggan);
        //echo "<br>";
        foreach ($id_pelanggan as $k => $value) {
          $data['id_anggota']=  $this->input->post('id_anggota');
          $data['id_pelanggan']= $id_pelanggan[$k];
          $data['tanggal_pinjam']=  date("Y-m-d");
          $batas=strtotime("+7 Days");
          $data['tanggal_batas']=  date("Y-m-d", $batas);
          $data['status_peminjaman']='dipinjam';

          $this->m_pinjam->insert($data);
          $idsisa=$id_pelanggan[$k];
          $this->sisa_buku($idsisa);
          //var_dump($data);
        }

        redirect('admin/daftar_pinjam');
      }
    private function sisa_buku($id_pelanggan){
      $this->load->model('m_buku');
      $datastok['entry']=$this->m_buku->get($id_pelanggan);
      $entry=$datastok['entry'][0];
      $this->m_pinjam->sisa_buku($entry);
    }

    private function sisa_edit($id_pelanggan){
      $this->load->model('m_buku');
      $datastok['entry']=$this->m_buku->get($id_pelanggan);
      $entry=$datastok['entry'][0];
      $this->m_pinjam->sisa_edit($entry);
    }

    public function pengembalian_buku(){
      $this->load->model('m_pinjam');

      $selector=$this->input->post('selector');


      foreach ($selector as $k => $value) {
        $index=$selector[$k];
        $data1['entry']=$this->m_pinjam->select_kembali($index);
        $entry=$data1['entry'][0];
        $denda=$entry->denda;
        $id_anggota=$entry->id_anggota;
        $d=$entry->tanggal_batas;
    		$r=date("Y-m-d");
        $tanggal_kembali=strtotime("$r");
        $tanggal_batas=strtotime("$d");
        $datediff=$tanggal_kembali-$tanggal_batas;
        $interval=floor($datediff/(60*60*24));
        if($interval>0 && $entry->status!="dosen"){
          $bayar_denda=$interval*$denda;
        }else{
          $bayar_denda=0;
        }
        $data['id_pinjam']=$selector[$k];
        $data['tanggal_kembali']=$r;
        $data['bayar_denda']=$bayar_denda;
        $data['status_peminjaman']="kembali";

        if($bayar_denda!=0){
          $this->load->model('m_denda');
          $get=$this->m_denda->get($id_anggota);
          $get=$get[0];
          $data2['id_anggota']=$id_anggota;
          $total_denda=$get->total_denda+$bayar_denda;
          $data2['total_denda']=$total_denda;
          $data2['id_denda']=$get->id_denda;
          //var_dump($data2);
          $this->m_denda->update($data2);
        }

        //var_dump($data);

        $this->m_pinjam->kembali($data);
        $this->sisa_edit($entry->id_pelanggan);


      }



      redirect('admin/pengembalian_buku');
    }

    public function delete() {
            $this->load->model('m_pinjam');
            $index=$this->uri->segment(3,0);

            if($index!="") {
              $data['entry']=$this->m_pinjam->select_kembali($index);
              $entry=$data['entry'][0];
              $this->sisa_edit($entry->id_pelanggan);
                $this->m_pinjam->delete($index);

            }
            redirect('admin/daftar_pinjam');
    }

    public function edit() {
            $this->load->model('m_pinjam');
            $data['id_anggota']=  $this->input->post('id_anggota');
            $data['id_pinjam']=  $this->input->post('id_pinjam');
            $data['tanggal_pinjam']=  $this->input->post('tanggal_pinjam');
            $data['tanggal_batas']=  $this->input->post('tanggal_batas');
            $data['id_pelanggan']= $this->input->post('id_pelanggan');


            $this->m_pinjam->update($data);

            $idsisa=$this->input->post('id_pelanggan');
            $this->sisa_buku($idsisa);

            $idlama=$this->input->post('id_lama');
            $this->sisa_edit($idlama);
            redirect('admin/daftar_pinjam');
        }

    public function pembayaran_denda(){
            $this->load->model('m_denda');
            $data['id_denda']=$this->input->post('id_denda');
            $total_denda=$this->input->post('total_denda');
            $pembayaran=$this->input->post('pembayaran');

            if($pembayaran>$total_denda){
              $data['total_denda']=0;
            }else {
              $data['total_denda']=$total_denda-$pembayaran;
            }
            //var_dump($data);
            $this->m_denda->bayar_denda($data);

            if($pembayaran>$total_denda){
              $kembalian=$pembayaran-$total_denda;

              redirect('admin/denda?kembalian='.$kembalian.'');
            }else {
              redirect('admin/denda');
            }


    }


}
?>
