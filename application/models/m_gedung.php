<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Gedung extends CI_Model {

	// public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getGedung()
	{
		$query = "select * from tb_gedung where deleted=0";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function getIDGedung($id)
	{
		$query = "select * from tb_gedung where id_gedung = ".$id." and deleted = 0";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function setGedung($data)
	{
		if (!isset($data['id_gedung'])) {
			$query = "INSERT INTO TB_gedung(nama_gedung, DELETED) VALUES('".$data['nama_gedung']."',0)";
		}else{
			$query = "UPDATE TB_gedung SET nama_gedung = '".$data['nama_gedung']."' WHERE ID_gedung = ".$data['id_gedung'];
		}
		if ($this->db->query($query)) {
			return true;
		}else{
			return false;
		}
	}

	public function deleteGedung($id)
	{
		$query = "UPDATE TB_gedung SET DELETED=1 WHERE ID_gedung = ".$id;
		if ($this->db->query($query)) {
			return true;
		}else{
			return false;
		}
	}

}

/* End of file M_KategoriBarang */
/* Location: ./application/models/M_KategoriBarang */