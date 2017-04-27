<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_ruangan extends CI_Model {

	// public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getRuangan()
	{
		$query = "select r.id_ruangan, r.nama_ruangan, r.id_lantai, l.nama_lantai, l.id_gedung, g.nama_gedung, r.keterangan
		from tb_lantai l join tb_gedung g on l.id_gedung=g.id_gedung
		join tb_ruangan r on r.id_lantai = l.id_lantai
		where l.deleted=0";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	// public function getIDLantai($id)
	// {
	// 	$query = "select l.id_lantai, l.nama_lantai, l.id_gedung, g.nama_gedung from tb_lantai l join tb_gedung g on l.id_gedung=g.id_gedung where l.id_lantai = ".$id." and l.deleted = 0";
	// 	$result = $this->db->query($query);
	// 	return $result->result_array();
	// }

	public function setRuangan($data)
	{
		if (!isset($data['id_ruangan'])) {
			$query = "INSERT INTO TB_ruangan(nama_ruangan,id_lantai,keterangan,DELETED) VALUES('".$data['nama_ruangan']."','".$data['id_lantai']."','".$data['keterangan']."',0)";
		}else{
			$query = "UPDATE TB_ruangan SET nama_ruangan = '".$data['nama_ruangan']."', keterangan='".$data['keterangan']."' WHERE ID_ruangan = ".$data['id_ruangan'];
		}
		if ($this->db->query($query)) {
			return true;
		}else{
			return false;
		}
	}

	// public function deleteLantai($id)
	// {
	// 	$query = "UPDATE TB_lantai SET DELETED=1 WHERE ID_lantai = ".$id;
	// 	if ($this->db->query($query)) {
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }

}

/* End of file M_KategoriBarang */
/* Location: ./application/models/M_KategoriBarang */