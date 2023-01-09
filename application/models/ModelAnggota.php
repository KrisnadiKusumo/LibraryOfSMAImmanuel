<?php


class ModelAnggota extends CI_Model
{
	var $table = "anggota";
	var $primaryKey = "id_anggota";

	public function getAll()
	{
		return $this->db->get($this->table)->result();
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

	public function jumlahAnggota(){
		return $this->db->count_all_results($this->table);
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
		$this->db->where($this->primaryKey, $id);
		$anggota =  $this->db->get($this->table)->row();
		unlink('./foto/'.$anggota->foto_anggota);
		return $this->db->where($this->primaryKey, $id)->delete($this->table);
	}
}
