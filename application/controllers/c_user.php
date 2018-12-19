<?php if (! defined('BASEPATH')) exit('no direct script allowed');

class c_user extends CI_Controller{

    function index() {

    }
    public function input() {
        $this->load->model('m_user');
        $data['username']=  $this->input->post('username');
        $data['password']=  $this->input->post('password');
       // $data['password']=  md5("$this->input->post('password')");
        $data['nama_user']=  $this->input->post('nama_user');
        $data['level']=  $this->input->post('level');

        $this->m_user->insert($data);
        redirect('admin/daftar_user');
      }

    public function delete() {
            $this->load->model('m_user');
            if($this->uri->segment(3,0)!="") {
                $this->m_user->delete($this->uri->segment(3, 0));
            }
            redirect('admin/daftar_user');
    }

    public function edit() {
            $this->load->model('m_user');
            $data['id_user']= $this->input->post('id_user');
            $data['username']=  $this->input->post('username');
            $data['password']=  $this->input->post('password');
          //  $data['password']=  md5("$this->input->post('password')");
            $data['nama_user']=  $this->input->post('nama_user');
            $data['level']=  $this->input->post('level');
            $this->m_user->update($data);
            redirect('admin/daftar_user');
        }
}
?>
