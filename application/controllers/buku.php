<?php

class buku extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username')){
			redirect('login');
		}
		$this->load->model("ModelBuku");
		$this->load->model("ModelTransaksi");

	}

	public function buku()
	{
		$dataBuku = $this->ModelBuku->getAllBuku();
		$data = array(
			"bukus" => $dataBuku,
			"isActive1" => '',
			"isActive2" => '',
			"isActive3" => '',
			"isActive4" => 'active',
			"isActive5" => '',
			"isActive6" => ''
		);
		$this->load->view('content/buku/listBuku', $data);
	}

	public function fiksi()
	{
		$dataFiksi = $this->ModelBuku->getAllFiksi();
		$data = array(
			"fiksis" => $dataFiksi,
			"isActive1" => '',
			"isActive2" => '',
			"isActive3" => 'active',
			"isActive4" => '',
			"isActive5" => '',
			"isActive6" => ''
		);
		$this->load->view('content/fiksi/listFiksi', $data);
	}

	// untuk me-load tampilan form tambah barang

	public function tambahBuku(){
		$data = array(
			"isActive1" => '',
			"isActive2" => '',
			"isActive3" => '',
			"isActive4" => 'active',
			"isActive5" => '',
			"isActive6" => ''
		);
		$this->load->view("content/buku/formTambahBuku",$data);
	}

	public function tambahFiksi(){
		$data = array(
			"isActive1" => '',
			"isActive2" => '',
			"isActive3" => 'active',
			"isActive4" => '',
			"isActive5" => '',
			"isActive6" => ''
		);
		$this->load->view("content/fiksi/formTambahFiksi", $data);
	}

	public function insertBuku()
	{
		$data = array(
			"kode_buku" => $this->input->post("kode_buku"),
			"judul_buku" => $this->input->post("judul_buku"),
			"pengarang_buku" => $this->input->post("pengarang_buku"),
			"penerbit_buku" => $this->input->post("penerbit_buku"),
			"thn_terbit_buku" => $this->input->post("thn_terbit_buku"),
			"klasifikasi_buku" => $this->input->post("klasifikasi_buku"),
			"bahasa_buku" => $this->input->post("bahasa_buku"),
			"sumber_asal_buku" => $this->input->post("sumber_asal_buku"),
			"harga_buku" => $this->input->post("harga_buku"),
			"jumlah_buku" => $this->input->post("jumlah_buku"),
			"jenis_buku" => $this->input->post("jenis_buku")
		);

		$id = $this->ModelBuku->insertGetId($data);
		redirect('buku/buku');
	}

	public function insertFiksi()
	{
		$data = array(
			"kode_buku" => $this->input->post("kode_buku"),
			"judul_buku" => $this->input->post("judul_buku"),
			"pengarang_buku" => $this->input->post("pengarang_buku"),
			"penerbit_buku" => $this->input->post("penerbit_buku"),
			"thn_terbit_buku" => $this->input->post("thn_terbit_buku"),
			"klasifikasi_buku" => $this->input->post("klasifikasi_buku"),
			"bahasa_buku" => $this->input->post("bahasa_buku"),
			"sumber_asal_buku" => $this->input->post("sumber_asal_buku"),
			"harga_buku" => $this->input->post("harga_buku"),
			"jumlah_buku" => $this->input->post("jumlah_buku"),
			"jenis_buku" => $this->input->post("jenis_buku")
		);

		$id = $this->ModelBuku->insertGetId($data);
		redirect('buku/fiksi');
	}

	public function detailBuku($id)
	{
		$this->db->where('kode_buku',$id);
		$cek = $this->db->get('buku')->row();
		if($cek){
			$buku = $this->ModelBuku->getByPrimaryKey($id);
			$data = array(
				"buku" => $buku,
				"isActive1" => '',
				"isActive2" => '',
				"isActive3" => '',
				"isActive4" => 'active',
				"isActive5" => '',
				"isActive6" => ''
			);
			$this->load->view('content/buku/detailBuku',$data);
		}else{
			$this->load->view('404');
		}

	}

	public function detailFiksi($id)
	{
		$this->db->where('kode_buku',$id);
		$cek = $this->db->get('buku')->row();
		if($cek){
			$buku = $this->ModelBuku->getByPrimaryKey($id);
			$data = array(
				"buku" => $buku,
				"isActive1" => '',
				"isActive2" => '',
				"isActive3" => 'active',
				"isActive4" => '',
				"isActive5" => '',
				"isActive6" => ''
			);
			$this->load->view('content/fiksi/detailFiksi',$data);
		}else{
			$this->load->view('404');
		}
	}

	public function ubahBuku($id)
	{
		$this->db->where('kode_buku',$id);
		$cek = $this->db->get('buku')->row();
		if($cek){
			$buku = $this->ModelBuku->getByPrimaryKey($id);
			$data = array(
				"buku" => $buku,
				"isActive1" => '',
				"isActive2" => '',
				"isActive3" => '',
				"isActive4" => 'active',
				"isActive5" => '',
				"isActive6" => ''
			);
			$this->load->view('content/buku/formUbahBuku',$data);
		}else{
			$this->load->view('404');
		}

	}

	public function ubahFiksi($id)
	{
		$this->db->where('kode_buku',$id);
		$cek = $this->db->get('buku')->row();
		if($cek){
			$buku = $this->ModelBuku->getByPrimaryKey($id);
			$data = array(
				"buku" => $buku,
				"isActive1" => '',
				"isActive2" => '',
				"isActive3" => 'active',
				"isActive4" => '',
				"isActive5" => '',
				"isActive6" => ''
			);
			$this->load->view('content/fiksi/formUbahFiksi',$data);
		}else{
			$this->load->view('404');
		}

	}

	public function updateBuku()
	{
		$id = $this->input->post('kode_buku');
		$data = array(
			"judul_buku" => $this->input->post("judul_buku"),
			"pengarang_buku" => $this->input->post("pengarang_buku"),
			"penerbit_buku" => $this->input->post("penerbit_buku"),
			"thn_terbit_buku" => $this->input->post("thn_terbit_buku"),
			"klasifikasi_buku" => $this->input->post("klasifikasi_buku"),
			"bahasa_buku" => $this->input->post("bahasa_buku"),
			"sumber_asal_buku" => $this->input->post("sumber_asal_buku"),
			"harga_buku" => $this->input->post("harga_buku"),
			"jumlah_buku" => $this->input->post("jumlah_buku"),
			"jenis_buku" => $this->input->post("jenis_buku")
		);
		$this->ModelBuku->update($id, $data);
		redirect('buku/buku');
	}

	public function updateFiksi()
	{
		$id = $this->input->post('kode_buku');
		$data = array(
			"judul_buku" => $this->input->post("judul_buku"),
			"pengarang_buku" => $this->input->post("pengarang_buku"),
			"penerbit_buku" => $this->input->post("penerbit_buku"),
			"thn_terbit_buku" => $this->input->post("thn_terbit_buku"),
			"klasifikasi_buku" => $this->input->post("klasifikasi_buku"),
			"bahasa_buku" => $this->input->post("bahasa_buku"),
			"sumber_asal_buku" => $this->input->post("sumber_asal_buku"),
			"harga_buku" => $this->input->post("harga_buku"),
			"jumlah_buku" => $this->input->post("jumlah_buku"),
			"jenis_buku" => $this->input->post("jenis_buku")
		);
		$this->ModelBuku->update($id, $data);
		redirect('buku/fiksi');
	}

	public function deleteBuku()
	{
		$id = $this->input->post('kode_buku');
		$this->ModelBuku->delete($id);
		redirect('buku/buku');
	}

	public function deleteFiksi()
	{
		$id = $this->input->post('kode_buku');
		$this->ModelBuku->delete($id);
		redirect('buku/fiksi');
	}

	public function ajaxCekKode($kodebuku)
	{
		$this->db->where('kode_buku',$kodebuku);
		$cek = $this->db->get('buku')->row();
		if($cek){
			echo '200';
		} else {
			echo '201';
		}
	}

	public function ajaxCariBuku()
	{
		$keyword = $this->input->post('keyword');
		if ($keyword == " "){

		}
		$this->db->where('jenis_buku !=','fiksi');
		$this->db->like('judul_buku',$keyword);
		$this->db->or_like('kode_buku',$keyword);
		$data['bukus'] = $this->db->get('buku')->result();
		$this->load->view('content/buku/ajax/dataBuku',$data);
	}

	public function ajaxCariFiksi()
	{
		$keyword = $this->input->post('keyword');
		$this->db->where('jenis_buku','fiksi');
		$this->db->like('judul_buku',$keyword);
		$this->db->or_like('kode_buku',$keyword);
		$data['fiksis'] = $this->db->get('buku')->result();
		$this->load->view('content/fiksi/ajax/dataFiksi',$data);
	}
}
