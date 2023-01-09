<?php


class ModelTransaksi extends CI_Model
{
	var $table = "transaksi";
	var $table2 = "detail";
	var $primaryKey = "kode_transaksi";
	var $primaryKey2 = "kode_detail";

	public function getAll()
	{
		$this->db->select('*');
		$this->db->from('transaksi t');
		$this->db->join('anggota a','a.id_anggota = t.id_anggota','left');
		$this->db->like('t.kode_transaksi','TRF');
		$query = $this->db->get();
		return $query->result();
	}

	public function getAllPaket()
	{
		$this->db->select('*');
		$this->db->from('transaksi t');
		$this->db->join('anggota a','a.id_anggota = t.id_anggota','left');
		$this->db->like('t.kode_transaksi','TRP');
		$query = $this->db->get();
		return $query->result();
	}

	public function getAllDetail($id)
	{
		$this->db->select('*');
		$this->db->from('detail d');
		$this->db->join('transaksi t','t.kode_transaksi = d.kode_transaksi','left');
		$this->db->join('buku b','b.kode_buku = d.kode_buku','left');
		$this->db->where('d.kode_transaksi',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function getIdTrans($id)
	{
		$this->db->select('t.kode_transaksi');
		$this->db->from('detail d');
		$this->db->join('transaksi t','t.kode_transaksi = d.kode_transaksi','left');
		$this->db->where('d.kode_detail',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function getDetailPrimary($id)
	{
		$this->db->select('*');
		$this->db->from('detail d');
		$this->db->join('transaksi t','t.kode_transaksi = d.kode_transaksi','left');
		$this->db->join('buku b','b.kode_buku = d.kode_buku','left');
		$this->db->where('d.kode_detail',$id);
		$query = $this->db->get();
		return $query->row();
	}


	public function createNoTransaksi()
	{
		$kodeTransaksi = 'TRF-'.date('Y').'-'.date('m').'-'.date('d').'-'
			.date('H').'-'.date('i'.'-'.date('s'));
		return $kodeTransaksi;
	}

	public function createNoTransaksiPaket()
	{
		$kodeTransaksi = 'TRP-'.date('Y').'-'.date('m').'-'.date('d').'-'
			.date('H').'-'.date('i'.'-'.date('s'));
		return $kodeTransaksi;
	}

	public function getAllActive()
	{
		$this->db->select('*');
		$this->db->from('transaksi t');
		$this->db->join('anggota a','a.id_anggota = t.id_anggota','left');
		$this->db->join('detail d','d.kode_transaksi = t.kode_transaksi','left');
		$this->db->join('buku b','d.kode_buku = b.kode_buku','left');
		$this->db->where('d.status','1');
		$this->db->like('t.kode_transaksi','TRF');
		$query = $this->db->get();
		return $query->result();
	}

	public function getAllActivePaket()
	{
		$this->db->select('*');
		$this->db->from('transaksi t');
		$this->db->join('anggota a','a.id_anggota = t.id_anggota','left');
		$this->db->join('detail d','d.kode_transaksi = t.kode_transaksi','left');
		$this->db->join('buku b','d.kode_buku = b.kode_buku','left');
		$this->db->where('d.status','1');
		$this->db->like('t.kode_transaksi','TRP');
		$query = $this->db->get();
		return $query->result();
	}

	public function getAllSelesai()
	{
		$this->db->select('*');
		$this->db->from('transaksi t');
		$this->db->join('anggota a','a.id_anggota = t.id_anggota','left');
		$this->db->join('detail d','d.kode_transaksi = t.kode_transaksi','left');
		$this->db->join('buku b','d.kode_buku = b.kode_buku','left');
		$this->db->where('d.status','');
		$this->db->like('t.kode_transaksi','TRF');
		$this->db->group_by('t.kode_transaksi');
		$query = $this->db->get();
		return $query->result();
	}

	public function getAllSelesaiPaket()
	{
		$this->db->select('*');
		$this->db->from('transaksi t');
		$this->db->join('anggota a','a.id_anggota = t.id_anggota','left');
		$this->db->join('detail d','d.kode_transaksi = t.kode_transaksi','left');
		$this->db->join('buku b','d.kode_buku = b.kode_buku','left');
		$this->db->where('d.status','');
		$this->db->like('t.kode_transaksi','TRP');
		$this->db->group_by('t.kode_transaksi');
		$query = $this->db->get();
		return $query->result();
	}

	// function untuk get data by primary_key
	public function getByPrimaryKey($id)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->get($this->table)->row();
	}

	public function jumlahTransaksi(){
		return $this->db
			->where(['status'=>'1'])
			->from("detail")
			->count_all_results();
	}

	public function pinjamFiksi()
	{
		$deadline = date('Y-m-d', strtotime($this->input->post("tgl_pinjam").'+7 day'));

		$post = $this->input->post();

		$data = [
			"kode_transaksi" => $this->input->post("kode_transaksi"),
			"id_anggota" => $this->input->post("id_anggota")
		];

		$this->db->insert('transaksi', $data);

		$totalBuku = 0;
		for ($i = 0; $i < count($post['kode_buku']); $i++) {
			$dataDetail = [
				'kode_transaksi' => $this->input->post("kode_transaksi"),
				'kode_buku' => $post['kode_buku'][$i],
				'tgl_pinjam' => $this->input->post("tgl_pinjam"),
				'status' => 1,
				'tgl_deadline' => date('Y-m-d', strtotime($this->input->post("tgl_pinjam").'+7 day'))
			];
			$totalBuku++;
			$this->db->insert('detail', $dataDetail);
		}
	}

	public function pinjamPaket()
	{
		$deadline = date('Y-m-d', strtotime($this->input->post("tgl_pinjam").'+7 day'));

		$post = $this->input->post();

		$data = [
			"kode_transaksi" => $this->input->post("kode_transaksi"),
			"id_anggota" => $this->input->post("id_anggota")
		];

		$this->db->insert('transaksi', $data);

		$totalBuku = 0;
		for ($i = 0; $i < count($post['kode_buku']); $i++) {
			$dataDetail = [
				'kode_transaksi' => $this->input->post("kode_transaksi"),
				'kode_buku' => $post['kode_buku'][$i],
				'tgl_pinjam' => $this->input->post("tgl_pinjam"),
				'status' => 1,
				'tgl_deadline' => date('Y-m-d', strtotime($this->input->post("tgl_pinjam").'+7 day'))
			];
			$totalBuku++;
			$this->db->insert('detail', $dataDetail);
		}
	}

	public function insertGetIdDet($data)
	{
		$this->db->insert($this->table2, $data);
		return $this->db->insert_id();
	}

	public function insertGetIdTrans($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($id, $data)
	{
		$this->db->where($this->primaryKey2, $id);
		return $this->db->update($this->table2, $data);
	}


	public function delete($id)
	{
		return $this->db->where($this->primaryKey, $id)->delete($this->table);
	}
}
