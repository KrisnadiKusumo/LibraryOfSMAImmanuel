<?php


class anggota extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username')){
			redirect('login');
		}
		$this->load->model("ModelAnggota");
	}

	public function index()
	{
		$dataAnggota = $this->ModelAnggota->getAll();
		$data = array(
			"anggotas" => $dataAnggota,
			"isActive1" => '',
			"isActive2" => 'active',
			"isActive3" => '',
			"isActive4" => '',
			"isActive5" => '',
			"isActive6" => ''
		);
		$this->load->view('content/anggota/listAnggota', $data);
	}

	// untuk me-load tampilan form tambah barang

	public function tambah(){
		$data = array(
			"isActive1" => '',
			"isActive2" => 'active',
			"isActive3" => '',
			"isActive4" => '',
			"isActive5" => '',
			"isActive6" => ''
		);
		$this->load->view("content/anggota/formTambahAnggota",$data);
	}

	public function insert()
	{
		$foto = '';
		if($_FILES['foto_anggota']['tmp_name']) {
			$config['upload_path'] = './foto/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 10000;
			$config['max_width'] = 10000;
			$config['max_height'] = 10000;
			$config['encrypt_name'] = true;

			$this->load->library('upload', $config);
			$this->upload->do_upload('foto_anggota');

			$gambar = $this->upload->data();
			$foto = $gambar['file_name'];
		}

		$data = array(
			"id_anggota" => $this->input->post("id_anggota"),
			"nama_anggota" => $this->input->post("nama_anggota"),
			"alamat_anggota" => $this->input->post("alamat_anggota"),
			"no_telp_anggota" => $this->input->post("no_telp_anggota"),
			"foto_anggota" => $foto,
		);

		$id = $this->ModelAnggota->insertGetId($data);
		redirect('anggota');
	}


	public function ubah($id)
	{
		$this->db->where('id_anggota',$id);
		$cek = $this->db->get('anggota')->row();
		if($cek){
			$anggota = $this->ModelAnggota->getByPrimaryKey($id);
			$data = array(
				"anggota" => $anggota,
				"isActive1" => '',
				"isActive2" => 'active',
				"isActive3" => '',
				"isActive4" => '',
				"isActive5" => '',
				"isActive6" => ''
			);
			$this->load->view('content/anggota/formUbahAnggota',$data);
		}else{
			$this->load->view('404');
		}
	}

	public function detail($id)
	{
		$this->db->where('id_anggota',$id);
		$cek = $this->db->get('anggota')->row();
		if($cek){
			$anggota = $this->ModelAnggota->getByPrimaryKey($id);
			$data = array(
				"anggota" => $anggota,
				"isActive1" => '',
				"isActive2" => 'active',
				"isActive3" => '',
				"isActive4" => '',
				"isActive5" => '',
				"isActive6" => ''
			);
			$this->load->view('content/anggota/detailAnggota',$data);
		}else{
			$this->load->view('404');
		}
	}

	public function update()
	{
		$foto = $this->input->post('foto_anggota_lama');
		if($_FILES['foto_anggota']['tmp_name']) {
			unlink('./foto/'.$foto);

			$config['upload_path'] = './foto/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 10000;
			$config['max_width'] = 10000;
			$config['max_height'] = 10000;

			$this->load->library('upload', $config);
			$this->upload->do_upload('foto_anggota');

			$gambar = $this->upload->data();
			$foto = $gambar['file_name'];
		}

		$id = $this->input->post('id_anggota');
		$data = array(
			"nama_anggota" => $this->input->post("nama_anggota"),
			"alamat_anggota" => $this->input->post("alamat_anggota"),
			"no_telp_anggota" => $this->input->post("no_telp_anggota"),
			"foto_anggota" => $foto
		);
		$this->ModelAnggota->update($id, $data);
		redirect('anggota');
	}

	public function delete()
	{
		$id = $this->input->post('id_anggota');
		$this->ModelAnggota->delete($id);
		redirect('anggota');
	}

	public function ajaxCekNoIdentitas($idanggota)
	{
		$this->db->where('id_anggota',$idanggota);
		$cek = $this->db->get('anggota')->row();
		if($cek){
			echo '200';
		} else {
			echo '201';
		}
	}

	public function ajaxCariAnggota()
	{
		$keyword = $this->input->post('keyword');
		$this->db->like('nama_anggota',$keyword);
		$this->db->or_like('id_anggota',$keyword);
		$data['anggotas'] = $this->db->get('anggota')->result();
		$this->load->view('content/anggota/ajax/dataAnggota',$data);
	}
}
