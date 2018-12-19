<?php if (! defined('BASEPATH')) exit('no direct script allowed');

class c_jenis_buku extends CI_Controller{

    function index() {

    }
    public function input() {
        $this->load->model('m_jenis_buku');
        $data['nama_segmentasi']=  $this->input->post('nama_segmentasi');
        $data['nomor_rak']=  $this->input->post('nomor_rak');
        $data['denda']=  $this->input->post('denda');


        $this->m_jenis_buku->insert($data);
        redirect('admin/jenis_buku');
      }

    public function delete() {
            $this->load->model('m_jenis_buku');
            if($this->uri->segment(3,0)!="") {
                $this->m_jenis_buku->delete($this->uri->segment(3, 0));
            }
            redirect('admin/jenis_buku');
    }

    public function edit() {
            $this->load->model('m_jenis_buku');
            $data['id_segmentasi']= $this->input->post('id_segmentasi');
            $data['nama_segmentasi']=  $this->input->post('nama_segmentasi');
            $data['nomor_rak']=  $this->input->post('nomor_rak');
            $data['denda']=  $this->input->post('denda');
            $this->m_jenis_buku->update($data);
            redirect('admin/jenis_buku');
        }


}
?>
