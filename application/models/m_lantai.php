<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_lantai extends CI_Model {

	// public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getLantai()
	{
		$query = "select l.id_lantai, l.nama_lantai, l.id_gedung, g.nama_gedung 
			from tb_lantai l join tb_gedung g on l.id_gedung=g.id_gedung 
			where l.deleted=0
			order by l.id_gedung";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function getIDLantai($id)
	{
		$query = "select l.id_lantai, l.nama_lantai, l.id_gedung, g.nama_gedung from tb_lantai l join tb_gedung g on l.id_gedung=g.id_gedung where l.id_lantai = ".$id." and l.deleted = 0";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function getLantaiinGedung($id)
	{
		$query = "select l.id_lantai, l.nama_lantai, l.id_gedung, g.nama_gedung from tb_lantai l join tb_gedung g on l.id_gedung=g.id_gedung where l.id_gedung = $id and l.deleted = 0";
		// $query = "select l.id_lantai, l.nama_lantai, l.id_gedung, g.nama_gedung from tb_lantai l join tb_gedung g on l.id_gedung=g.id_gedung where l.id_gedung = 1 and l.deleted = 0";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function setLantai($data)
	{
		if (!isset($data['id_lantai'])) {
			$query = "INSERT INTO TB_lantai(nama_lantai,id_gedung, DELETED) VALUES('".$data['nama_lantai']."','".$data['id_gedung']."',0)";
		}else{
			$query = "UPDATE TB_lantai SET nama_lantai = '".$data['nama_lantai']."' WHERE ID_lantai = ".$data['id_lantai'];
		}
		if ($this->db->query($query)) {
			return true;
		}else{
			return false;
		}
	}

	public function deleteLantai($id)
	{
		$query = "UPDATE TB_lantai SET DELETED=1 WHERE ID_lantai = ".$id;
		if ($this->db->query($query)) {
			return true;
		}else{
			return false;
		}
	}

}

/* End of file M_KategoriBarang */
/* Location: ./application/models/M_KategoriBarang */