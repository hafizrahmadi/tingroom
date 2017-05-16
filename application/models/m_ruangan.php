<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_ruangan extends CI_Model {

	// public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getRuangan()
	{
		$query = "select r.id_ruangan, r.nama_ruangan, r.id_lantai, l.nama_lantai, l.id_gedung, g.nama_gedung, r.board,r.proyektor,r.kapasitas
		from tb_lantai l join tb_gedung g on l.id_gedung=g.id_gedung
		join tb_ruangan r on r.id_lantai = l.id_lantai
		where r.deleted=0
		order by r.id_lantai asc";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function getIDRuangan($id)
	{
		$query = "select r.id_ruangan, r.nama_ruangan, r.id_lantai, l.nama_lantai, l.id_gedung, g.nama_gedung, r.board,r.proyektor,r.kapasitas
		from tb_lantai l join tb_gedung g on l.id_gedung=g.id_gedung 
		join tb_ruangan r on r.id_lantai = l.id_lantai
		where r.id_ruangan = ".$id." and r.deleted = 0";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function getRuanganInLantai($id)
	{
		$query = "select r.id_lantai, l.nama_lantai, r.id_ruangan, r.nama_ruangan, r.board,r.proyektor,r.kapasitas from tb_lantai l join tb_ruangan r on r.id_lantai=l.id_lantai where r.id_lantai = $id and r.deleted = 0";
		
		$result = $this->db->query($query);
		return $result->result_array();
	}


	public function setRuangan($data)
	{
		if (!isset($data['id_ruangan'])) {
			$query = "INSERT INTO TB_ruangan(nama_ruangan,id_lantai,board,proyektor,kapasitas,DELETED) VALUES('".$data['nama_ruangan']."','".$data['id_lantai']."','".$data['board']."','".$data['proyektor']."','".$data['kapasitas']."',0)";
		}else{
			$query = "UPDATE TB_ruangan SET nama_ruangan = '".$data['nama_ruangan']."', board='".$data['board']."',proyektor='".$data['proyektor']."', kapasitas ='".$data['kapasitas']."'  WHERE ID_ruangan = ".$data['id_ruangan'];
		}
		if ($this->db->query($query)) {
			return true;
		}else{
			return false;
		}
	}

	public function deleteRuangan($id)
	{
		$query = "UPDATE TB_ruangan SET DELETED=1 WHERE ID_ruangan = ".$id;
		if ($this->db->query($query)) {
			return true;
		}else{
			return false;
		}
	}

}

/* End of file M_KategoriBarang */
/* Location: ./application/models/M_KategoriBarang */