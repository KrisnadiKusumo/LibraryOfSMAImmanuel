<?php


class dashboard extends CI_Controller
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

	public function index()
	{
			$jumlahBuku = $this->ModelBuku->jumlahBuku();
			$jumlahFiksi = $this->ModelBuku->jumlahFiksi();
			$jumlahAnggota = $this->ModelAnggota->jumlahAnggota();
			$jumlahTransaksi = $this->ModelTransaksi->jumlahTransaksi();
			$data = array(
				"jumlah_buku" => $jumlahBuku,
				"jumlah_fiksi" => $jumlahFiksi,
				"jumlah_anggota" => $jumlahAnggota,
				"jumlah_transaksi" => $jumlahTransaksi,
				"isActive1" => 'active',
				"isActive2" => '',
				"isActive3" => '',
				"isActive4" => '',
				"isActive5" => '',
				"isActive6" => ''
			);
			$this->load->view('content/buku/dashboard',$data);
	}
}
