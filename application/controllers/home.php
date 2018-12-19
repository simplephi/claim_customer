<?php if ( ! defined('BASEPATH')) exit('no direct script access allowed');
Class home extends CI_Controller {
      function __construct(){
        parent::__construct();
        $this->load->model('m_buku');
		$this->load->library('pagination');
		
      }
  public function index(){

    $this->load->view('login_page');
	
  }
  
  public function isi(){

    $this->load->view('isi');
	
  }
  
  
  public function detail(){
	
	$cari = $this->input->get('id');
	$data['cari']=$this->m_buku->get($cari);
    $data['result']="";
    $this->load->view('detail',$data);

  }
  
  public function login(){
    $this->load->view('login_page');

  }
  
  public function cari(){
    $key=$this->input->post('search');
    $this->load->model('m_buku');
    $data["result"]=$this->m_buku->cari($key);
    //var_dump($result);
    $this->load->view('search',$data);

  }
  public function daftar(){
    $this->load->view('register_page');
  }
}

?>
