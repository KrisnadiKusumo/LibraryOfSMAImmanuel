<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelLogin');
	}

	public function index()
	{
		$this->load->view('content/login');
	}

	public function proseslogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->db->where('username',$username);
		$user = $this->db->get('user')->row();
		if ($user){
			if(password_verify($password,$user->password)) {
				$this->session->set_userdata('username', $user->username);
				$this->session->set_userdata('pesan', 'login Berhasil');
				redirect('dashboard', 'refresh');
			} else {
				$this->session->set_userdata('alert-login','<div class="alert alert-danger alert-dismissible" role="alert">
						Password salah!
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
			}
		} else{
			$this->session->set_userdata('alert-login','<div class="alert alert-danger alert-dismissible" role="alert">
						Username tidak ditemukan!
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
		}
		redirect('login');
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		redirect('login');
	}


	public function ajaxCekUsername($username)
	{
		$this->db->where('username',$username);
		$cek = $this->db->get('user')->row();
		if($cek){
			echo '200';
		} else {
			echo '201';
		}
	}
}
