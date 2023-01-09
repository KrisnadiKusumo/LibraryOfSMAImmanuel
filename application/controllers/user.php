<?php


class user extends CI_Controller
{
	public function __construct(){

		parent::__construct();
		if(!$this->session->userdata('username')){
			redirect('login');
		}
		$this->load->model('ModelAnggota');
		$this->load->model('ModelLogin');
		$this->load->model('ModelBuku');
		$this->load->model('ModelTransaksi');
	}

	public function listUser()
	{
		if ($this->session->userdata('username') === 'admin'){
			$user = $this->ModelLogin->getAll();
			$data = array(
				"users" => $user,
				"isActive1" => '',
				"isActive2" => '',
				"isActive3" => '',
				"isActive4" => '',
				"isActive5" => ''
			);
			$this->load->view('content/listUser',$data);
		}else{
			$this->load->view('content/401');
		}

	}

	public function tambah(){
		$data = array(
			"isActive1" => '',
			"isActive2" => '',
			"isActive3" => '',
			"isActive4" => '',
			"isActive5" => ''
		);
		$this->load->view("content/tambahUser",$data);
	}

	public function insert()
	{
		$username = $this->input->post('username');
		$password = password_hash($this->input->post("password"), PASSWORD_BCRYPT);
		$data = array(
			"username" => $username,
			"password" => $password
		);
		$this->ModelLogin->insert($data);
		redirect('user/listUser');
	}

	public function reset()
	{
		if ($this->session->userdata('username') === 'admin'){
			$username = $this->input->post('username');
			$password = password_hash($username, PASSWORD_BCRYPT);
			$data = array(
				"password" => $password
			);
			$this->ModelLogin->update($username, $data);
			redirect('user/listUser');
		}
	}

	public function ubah($id)
	{
		$this->db->where('username',$id);
		$cek = $this->db->get('user')->row();
		if ($id === $this->session->userdata('username')){
			$user = $this->ModelLogin->getByPrimaryKey($id);
			$data = array(
				"user" => $user,
				"isActive1" => '',
				"isActive2" => '',
				"isActive3" => '',
				"isActive4" => '',
				"isActive5" => ''
			);
			$this->load->view('content/ubahUser',$data);
		}else if(!$cek){
			$this->load->view('404');
		}else{
			$this->load->view('content/401');
		}
	}

	public function update()
	{
		$username = $this->input->post('username');
		$password = password_hash($this->input->post("password"), PASSWORD_BCRYPT);
		$data = array(
			"password" => $password
		);
		$this->ModelLogin->update($username, $data);
		if ($this->session->userdata('username') === 'admin'){
			redirect('user/listUser');
		}else{
			redirect('dashboard');
		}

	}

	public function delete()
	{
		$id = $this->input->post('username');
		$this->ModelLogin->delete($id);
		redirect('user/listUser');
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
