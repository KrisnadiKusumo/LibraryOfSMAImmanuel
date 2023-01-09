<?php

class transaksi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username')){
			redirect('login');
		}
		$this->load->model("ModelTransaksi");
		$this->load->model("ModelBuku");
		$this->load->model("ModelAnggota");
	}

	public function index()
	{
		$dataTransaksi = $this->ModelTransaksi->getAll();
		$data = array(
			"transaksis" => $dataTransaksi,
			"isActive1" => '',
			"isActive2" => '',
			"isActive3" => '',
			"isActive4" => '',
			"isActive5" => 'active',
			"isActive6" => ''
		);
		$this->load->view('content/transaksi/listTransaksi', $data);
	}

	public function paket()
	{
		$dataTransaksi = $this->ModelTransaksi->getAllPaket();
		$data = array(
			"transaksis" => $dataTransaksi,
			"isActive1" => '',
			"isActive2" => '',
			"isActive3" => '',
			"isActive4" => '',
			"isActive5" => '',
			"isActive6" => 'active'
		);
		$this->load->view('content/transaksipaket/listTransaksi', $data);
	}

	public function active()
	{
		$dataTransaksi = $this->ModelTransaksi->getAllActive();
		$data = array(
			"transaksis" => $dataTransaksi,
			"isActive1" => '',
			"isActive2" => '',
			"isActive3" => '',
			"isActive4" => '',
			"isActive5" => 'active',
			"isActive6" => ''
		);
		$this->load->view('content/transaksi/listTransaksiActive', $data);
	}

	public function activePaket()
	{
		$dataTransaksi = $this->ModelTransaksi->getAllActivePaket();
		$data = array(
			"transaksis" => $dataTransaksi,
			"isActive1" => '',
			"isActive2" => '',
			"isActive3" => '',
			"isActive4" => '',
			"isActive5" => '',
			"isActive6" => 'active'
		);
		$this->load->view('content/transaksipaket/listTransaksiActive', $data);
	}

	public function selesai()
	{
		$dataTransaksi = $this->ModelTransaksi->getAllSelesai();
		$data = array(
			"transaksis" => $dataTransaksi,
			"isActive1" => '',
			"isActive2" => '',
			"isActive3" => '',
			"isActive4" => '',
			"isActive5" => 'active',
			"isActive6" => ''

		);
		$this->load->view('content/transaksi/listTransaksiSelesai', $data);
	}

	public function selesaiPaket()
	{
		$dataTransaksi = $this->ModelTransaksi->getAllSelesaiPaket();
		$data = array(
			"transaksis" => $dataTransaksi,
			"isActive1" => '',
			"isActive2" => '',
			"isActive3" => '',
			"isActive4" => '',
			"isActive5" => '',
			"isActive6" => 'active'

		);
		$this->load->view('content/transaksipaket/listTransaksiSelesai', $data);
	}

	// untuk me-load tampilan form tambah barang

	public function tambah(){

		$dataFiksi = $this->ModelBuku->getAllFiksi();
		$dataAnggota = $this->ModelAnggota->getAll();
		$noTrans = $this->ModelTransaksi->createNoTransaksi();
		$data = array(
			"isActive1" => '',
			"isActive2" => '',
			"isActive3" => '',
			"isActive4" => '',
			"isActive5" => 'active',
			"isActive6" => '',
			"anggotas" => $dataAnggota,
			"fiksis" => $dataFiksi,
			"kode_transaksi" => $noTrans
		);

		$this->load->view("content/transaksi/formTambahTransaksi", $data);
	}

	public function tambahPaket(){

		$dataFiksi = $this->ModelBuku->getAllBuku();
		$dataAnggota = $this->ModelAnggota->getAll();
		$noTrans = $this->ModelTransaksi->createNoTransaksiPaket();
		$data = array(
			"isActive1" => '',
			"isActive2" => '',
			"isActive3" => '',
			"isActive4" => '',
			"isActive5" => '',
			"isActive6" => 'active',
			"anggotas" => $dataAnggota,
			"fiksis" => $dataFiksi,
			"kode_transaksi" => $noTrans
		);

		$this->load->view("content/transaksipaket/formTambahTransaksi", $data);
	}

	public function insert()
	{
		$this->ModelTransaksi->pinjamFiksi();
		redirect('transaksi');
	}

	public function insertPaket()
	{
		$this->ModelTransaksi->pinjamPaket();
		redirect('transaksi/paket');
	}

	public function detail($id)
	{
		$dataDetail = $this->ModelTransaksi->getAllDetail($id);
		$data = array(
			"details" => $dataDetail,
			"isActive1" => '',
			"isActive2" => '',
			"isActive3" => '',
			"isActive4" => '',
			"isActive5" => 'active',
			"isActive6" => ''
		);
		$this->load->view('content/transaksi/detailTransaksi', $data);
	}

	public function detailPaket($id)
	{
		$dataDetail = $this->ModelTransaksi->getAllDetail($id);
		$data = array(
			"details" => $dataDetail,
			"isActive1" => '',
			"isActive2" => '',
			"isActive3" => '',
			"isActive4" => '',
			"isActive5" => '',
			"isActive6" => 'active'
		);
		$this->load->view('content/transaksipaket/detailTransaksi', $data);
	}

	public function ubah($id)
	{
		$buku = $this->ModelBuku->getByPrimaryKey($id);
		$data = array(
			"buku" => $buku,
			"isActive1" => '',
			"isActive2" => '',
			"isActive3" => '',
			"isActive4" => '',
			"isActive5" => 'active',
			"isActive6" => ''
		);
		$this->load->view('content/buku/formUbahBuku',$data);
	}

	public function ubahDetail($id){
		$detail = $this->ModelTransaksi->getDetailPrimary($id);
		$data = array(
			"detail" => $detail,
			"isActive1" => '',
			"isActive2" => '',
			"isActive3" => '',
			"isActive4" => '',
			"isActive5" => 'active',
			"isActive6" => ''
		);
		$this->load->view("content/transaksi/formUbahDetail",$data);
	}

	public function updateDetail()
	{
		$idT = $this->input->post('kode_transaksi');
		$id = $this->input->post('kode_detail');
		$deadline = date('Y-m-d', strtotime($this->input->post("tgl_pinjam").'+7 day'));
		$data = array(
			"tgl_pinjam" => $this->input->post("tgl_pinjam"),
			"tgl_deadline" => $deadline,
			"tgl_kembali" => null,
			"status" => 1
		);
		$this->ModelTransaksi->update($id, $data);
		redirect('transaksi/detail/'.$idT);
	}

	public function kembalikan($kode_transaksi)
	{
		$id = $this->input->post('kode_detail');
		$now = date("Y-m-d");
		$data = array(
			"status" => 0,
			"tgl_kembali"=> $now
		);
		$this->ModelTransaksi->update($id, $data);
		redirect('transaksi/detail/'.$kode_transaksi);
	}

	public function ajaxCariTransaksi()
	{
		$keyword = $this->input->post('keyword');
		$this->db->like('nama_anggota',$keyword);
		$this->db->or_like('kode_transaksi',$keyword);
		$this->db->join('anggota','anggota.id_anggota = transaksi.id_anggota','left');
		$data['transaksis'] = $this->db->get('transaksi')->result();
		$this->load->view('content/transaksi/ajax/datatransaksi',$data);
	}

}
