<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Unit extends CI_Model {

	// public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getUnit()
	{
		$query = "select * from tb_unit where deleted=0";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function getIDUnit($id)
	{
		$query = "select * from tb_unit where id_unit = ".$id." and deleted = 0";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function setUnit($data)
	{
		if (!isset($data['id_unit'])) {
			$query = "INSERT INTO TB_unit(nama_unit, DELETED) VALUES('".$data['nama_unit']."',0)";
		}else{
			$query = "UPDATE TB_unit SET nama_unit = '".$data['nama_unit']."' WHERE ID_unit = ".$data['id_unit'];
		}
		if ($this->db->query($query)) {
			return true;
		}else{
			return false;
		}
	}

	public function deleteUnit($id)
	{
		$query = "UPDATE TB_unit SET DELETED=1 WHERE ID_unit = ".$id;
		if ($this->db->query($query)) {
			return true;
		}else{
			return false;
		}
	}

}

/* End of file M_KategoriBarang */
/* Location: ./application/models/M_KategoriBarang */