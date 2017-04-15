<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Barang extends CI_Model {

	// public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getBarang()
	{
		$query = "
		select b.id_barang,b.nama_barang,b.harga_jual,b.harga_pokok,b.foto,b.catatan,k.kat_barang 
			from b.tb_barang join k.tb_kat_barang 
				on b.id_kat_barang=k.id_kat_barang 
			where b.delete='N'
			";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function getIDKatBarang($id)
	{
		$query = "
		select b.id_barang,b.nama_barang,b.harga_jual,b.harga_pokok,b.foto,b.catatan,k.kat_barang,b.id_kat_barang 
			from b.tb_barang join k.tb_kat_barang 
				on b.id_kat_barang=k.id_kat_barang 
			where b.id_barang=
		".$id;
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function setKatBarang($data)
	{
		if ($data['id_barang']=='') {
			$query = "INSERT INTO TB_BARANG(NAMA_BARANG, HARGA_JUAL, HARGA_POKOK, FOTO, CATATAN, ID_KAT_BARANG, DELETED) 
			VALUES(
				'".$data['nama_barang']."',
				'".$data['harga_jual']."',
				'".$data['harga_pokok']."',
				'".$data['foto']."',
				'".$data['catatan']."',				
				'".$data['id_kat_barang']."',
				'N')";
		}else{
			$query = "UPDATE TB_BARANG SET ".
			"NAMA_BARANG = '".$data['nama_barang']."',".
			"HARGA_JUAL = '".$data['harga_jual']."',".
			"HARGA_POKOK = '".$data['harga_pokok']."',".
			"FOTO = '".$data['foto']."',".
			"CATATAN = '".$data['catatan']."',".
			"ID_KAT_BARANG = '".$data['id_kat_barang']."'".
			" WHERE ID_KAT_BARANG = ".$data['id_kat_barang'];
		}
		if ($this->db->query($query)) {
			return true;
		}else{
			return false;
		}
	}

	public function deleteKatBarang($id)
	{
		$query = "UPDATE TB_BARANG SET DELETED='Y' WHERE ID_BARANG = ".$id;
		if ($this->db->query($query)) {
			return true;
		}else{
			return false;
		}
	}

	public function cari_barang($str)
	{
		$query = "select * from tb_barang where deleted='N' and nama_barang like '".$str."%' or nama_barang like '%".$str."%' or nama_barang like '%".$str."'" ;
		$result = $this->db->query($query);
		return $result->result();
	}

}