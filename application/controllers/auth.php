<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index() {
		$this->load->view('login_page');

	}


	public function cek_login() {
		$data = array('username' => $this->input->post('username', TRUE),
						'password' => $this->input->post('password', TRUE)
			);
		$this->load->model('model_user'); // load model_user
		$hasil = $this->model_user->cek_user($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = 'Sudah Loggin';
				$sess_data['uid'] = $sess->uid;
				$sess_data['username'] = $sess->nama_user;
				$sess_data['level'] = $sess->level;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('level')=='admin') {
				redirect('admin');
			}
			elseif ($this->session->userdata('level')=='member') {
				redirect('c_member');
			}
		}
		else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}

}

?>
