<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_jadwal extends CI_Model {

	// public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getJadwal()
	{
		$query = "select j.id_jadwal,g.nama_gedung, l.nama_lantai, r.nama_ruangan, j.id_ruangan, j.jam_awal, j.jam_akhir, j.status
					from tb_jadwal j join tb_ruangan r on j.id_ruangan = r.id_ruangan
						join tb_lantai l on r.id_lantai = l.id_lantai
						join tb_gedung g on l.id_gedung = g.id_gedung
					where j.deleted=0";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	// old query
	// public function getJadwalInLantai($id_lantai){
	// 	$query = "select j.id_jadwal,g.nama_gedung, l.id_lantai, l.nama_lantai, r.nama_ruangan, j.id_ruangan, j.jam_awal, j.jam_akhir, j.status
	// 				from tb_jadwal j join tb_ruangan r on j.id_ruangan = r.id_ruangan
	// 					join tb_lantai l on r.id_lantai = l.id_lantai
	// 					join tb_gedung g on l.id_gedung = g.id_gedung
	// 				where j.deleted=0 
	// 					and l.id_lantai = $id_lantai";
	// 	$result = $this->db->query($query);
	// 	return $result->result_array();
	// }

	// new query
	public function getJadwalInLantai($id_lantai,$waktu){
		$query = "select j.id_jadwal,g.nama_gedung, l.id_lantai, l.nama_lantai, r.nama_ruangan, j.id_ruangan, j.jam_awal, j.jam_akhir, 
						(select count(de.id_jadwal)
					    	from tb_jadwal ja join tb_det_booking de on ja.id_jadwal=de.id_jadwal
					                 join tb_booking bo on de.id_booking = bo.id_booking
					        where bo.waktu = '$waktu' and (bo.status=1 or bo.status=3) and de.id_jadwal=j.id_jadwal) as status
					from tb_jadwal j join tb_ruangan r on j.id_ruangan = r.id_ruangan
						join tb_lantai l on r.id_lantai = l.id_lantai
						join tb_gedung g on l.id_gedung = g.id_gedung
					where j.deleted=0 
						and l.id_lantai = $id_lantai";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function getIDArrJadwal($jadwal){
		$query = "select j.id_jadwal,g.nama_gedung, l.nama_lantai, r.nama_ruangan, j.id_ruangan, j.jam_awal, j.jam_akhir, j.status
					from tb_jadwal j join tb_ruangan r on j.id_ruangan = r.id_ruangan
						join tb_lantai l on r.id_lantai = l.id_lantai
						join tb_gedung g on l.id_gedung = g.id_gedung
					where j.deleted=0 ";
		foreach ($jadwal as $key => $value) {
			if ($key>0) {
				$query.= "or j.id_jadwal = $value ";
			}else{
				$query.= "and j.id_jadwal = $value ";
			}
		}

		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function cekJamAwal($str,$id_ruangan,$id_jadwal=null){
		
		$query = "select g.nama_gedung, l.nama_lantai, r.nama_ruangan, j.id_ruangan, j.jam_awal, j.jam_akhir, j.status
					from tb_jadwal j join tb_ruangan r on j.id_ruangan = r.id_ruangan
						join tb_lantai l on r.id_lantai = l.id_lantai
						join tb_gedung g on l.id_gedung = g.id_gedung
					where j.deleted=0 
						and j.jam_awal = '$str'
						and j.id_ruangan = '$id_ruangan' ";
		
		if ($id_jadwal!=null) {
			$query2 = $query." and j.id_jadwal = $id_jadwal ";
			$result = $this->db->query($query2);
			if ($result->num_rows()==1) {
				return true;
			}else{
				$result = $this->db->query($query);
				if ($result->num_rows()==0) {
					return true;
				}else{
					return false;
				}
			}
		}else{
			$result = $this->db->query($query);
			if ($result->num_rows()==0) {
				return true;
			}else{
				return false;
			}
		}
		
	}

	public function cekJamAkhir($str,$id_ruangan,$id_jadwal=null){
		$query = "select g.nama_gedung, l.nama_lantai, r.nama_ruangan, j.id_ruangan, j.jam_awal, j.jam_akhir, j.status
					from tb_jadwal j join tb_ruangan r on j.id_ruangan = r.id_ruangan
						join tb_lantai l on r.id_lantai = l.id_lantai
						join tb_gedung g on l.id_gedung = g.id_gedung
					where j.deleted=0 
						and j.jam_akhir = '$str'
						and j.id_ruangan = '$id_ruangan' ";
		$result = $this->db->query($query);
		
		if ($id_jadwal!=null) {
			$query2 = $query." and j.id_jadwal = $id_jadwal ";
			$result = $this->db->query($query2);
			if ($result->num_rows()==1) {
				return true;
			}else{
				$result = $this->db->query($query);
				if ($result->num_rows()==0) {
					return true;
				}else{
					return false;
				}
			}
		}else{
			$result = $this->db->query($query);
			if ($result->num_rows()==0) {
				return true;
			}else{
				return false;
			}
		}
	}

	public function getIDJadwal($id)
	{
		$query = "select j.id_jadwal,g.nama_gedung, l.nama_lantai, r.nama_ruangan, j.id_ruangan, j.jam_awal, j.jam_akhir, j.status, l.id_lantai,g.id_gedung	
					from tb_jadwal j join tb_ruangan r on j.id_ruangan = r.id_ruangan
						join tb_lantai l on r.id_lantai = l.id_lantai
						join tb_gedung g on l.id_gedung = g.id_gedung
					where j.deleted=0 and j.id_jadwal = $id";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function setJadwal($data)
	{
		if (!isset($data['id_jadwal'])) {
			$query = "INSERT INTO TB_jadwal(id_ruangan,jam_awal,jam_akhir,status, DELETED) 
							VALUES('".$data['id_ruangan']."','".$data['jam_awal']."','".$data['jam_akhir']."',0,0)";
		}else{
			$query = "UPDATE TB_jadwal SET jam_awal = '".$data['jam_awal']."', jam_akhir = '".$data['jam_akhir']."' WHERE ID_jadwal = ".$data['id_jadwal'];
		}
		if ($this->db->query($query)) {
			return true;
		}else{
			return false;
		}
	}

	public function deleteJadwal($id)
	{
		$query = "UPDATE TB_jadwal SET DELETED=1 WHERE ID_jadwal = ".$id;
		if ($this->db->query($query)) {
			return true;
		}else{
			return false;
		}
	}

}

/* End of file M_KategoriBarang */
/* Location: ./application/models/M_KategoriBarang */