<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Kasir extends CI_Model {

	// public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getKasir()
	{
		$query = "select k.id_kasir,k.nama_kasir,k.id_user,o.username,o.password
					from tb_kasir k join tb_user o on k.id_user=o.id_user 
					where k.deleted='N'";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function getIDKasir($id)
	{
		$query = "select k.id_kasir,k.nama_kasir,k.id_user,o.username,o.password
					from tb_kasir k join tb_user o on k.id_user=o.id_user 
					where k.id_kasir=".$id;
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function setKatKasir($data)
	{
		if ($data['id_kasir']=='') {
			$query = "INSERT INTO tb_kasir(nama_kasir,id_user, DELETED) VALUES(
			'".$data['nama_kasir']."',
			'".$data['id_user']."',
			'N')";
		}else{
			$query = "UPDATE tb_kasir SET nama_kasir = '".$data['nama_kasir']."' WHERE id_kasir = ".$data['id_kasir'];
		}
		if ($this->db->query($query)) {
			return true;
		}else{
			return false;
		}
	}

	public function deleteKasir($id)
	{
		$query = "UPDATE tb_kasir SET DELETED='Y' WHERE id_kasir = ".$id;
		if ($this->db->query($query)) {
			return true;
		}else{
			return false;
		}
	}

}

/* End of file M_KategoriBarang */
/* Location: ./application/models/M_KategoriBarang */