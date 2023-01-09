<?php


class ModelBuku extends CI_Model
{
	var $table = "buku";
	var $primaryKey = "kode_buku";

	public function getAllBuku()
	{
		return $this->db->get_where('buku', array('jenis_buku !=' => 'fiksi'))->result();
	}

	public function getAllFiksi()
	{
		return $this->db->get_where('buku', array('jenis_buku' => 'fiksi'))->result();
	}

	public function jumlahBuku(){
		return $this->db
			->where(['jenis_buku !='=>'fiksi'])
			->from("buku")
			->count_all_results();
	}

	public function jumlahFiksi(){
		return $this->db
			->where(['jenis_buku'=>'fiksi'])
			->from("buku")
			->count_all_results();
	}

	// function untuk get data by primary_key
	public function getByPrimaryKey($id)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->get($this->table)->row();
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function insertGetId($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($id, $data)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->update($this->table, $data);
	}

	public function delete($id)
	{
		return $this->db->where($this->primaryKey, $id)->delete($this->table);
	}
}
