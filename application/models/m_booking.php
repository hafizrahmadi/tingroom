<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Booking extends CI_Model {

	// public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function setBooking($data){
		$query = "insert into tb_booking(`id_user`,`waktu`,`deskripsi`,`status`,`read`,`time_created`) 
			values('".$data['id_user']."','".$data['waktu']."','".$data['deskripsi']."',0,0,now())";
		$this->db->query($query);

		$id_booking = $this->db->insert_id();
		$lastelement = end($data['jadwal']);
		$query2 = "insert into tb_det_booking(id_jadwal,id_booking) values";
		foreach ($data['jadwal'] as $value) {
			if ($value == $lastelement) {
				$query2 .= "($value,$id_booking);";
			}else{
				$query2 .= "($value,$id_booking),";
			}
		}
		$this->db->query($query2);
		return true;
		
	}

	public function getBookDemand($id_user)
	{
		$query = "select b.id_booking, b.waktu, b.deskripsi, b.status, r.nama_ruangan, l.nama_lantai, g.nama_gedung
					from tb_booking b join tb_det_booking d on d.id_booking = b.id_booking
						join tb_jadwal j on d.id_jadwal = j.id_jadwal
						join tb_ruangan r on j.id_ruangan = r.id_ruangan
						join tb_lantai l on r.id_lantai = l.id_lantai
						join tb_gedung g on l.id_gedung = g.id_gedung
					where b.id_user = 2 and b.status = 0 or b.status=1
					group by (b.id_booking) order by b.id_booking desc";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function getDetBookDemand($id_user)
	{
		$query = "select b.id_booking, b.waktu, b.status, d.id_jadwal, j.jam_awal, j.jam_akhir
					from tb_booking b join tb_det_booking d on d.id_booking = b.id_booking
						join tb_jadwal j on d.id_jadwal = j.id_jadwal
					where b.id_user = $id_user and b.status = 0 or b.status=1 order by b.id_booking desc";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function getBookCompleted($id_user)
	{
		$query = "select b.id_booking, b.waktu, b.deskripsi, b.status, r.nama_ruangan, l.nama_lantai, g.nama_gedung
					from tb_booking b join tb_det_booking d on d.id_booking = b.id_booking
						join tb_jadwal j on d.id_jadwal = j.id_jadwal
						join tb_ruangan r on j.id_ruangan = r.id_ruangan
						join tb_lantai l on r.id_lantai = l.id_lantai
						join tb_gedung g on l.id_gedung = g.id_gedung
					where b.id_user = 2 and b.status = 2 or b.status=3
					group by (b.id_booking) order by b.id_booking desc";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function getDetBookCompleted($id_user)
	{
		$query = "select b.id_booking, b.waktu, b.status, d.id_jadwal, j.jam_awal, j.jam_akhir
					from tb_booking b join tb_det_booking d on d.id_booking = b.id_booking
						join tb_jadwal j on d.id_jadwal = j.id_jadwal
					where b.id_user = $id_user and b.status = 2 or b.status=3 order by b.id_booking desc";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	// public function getIDGedung($id)
	// {
	// 	$query = "select * from tb_gedung where id_gedung = ".$id." and deleted = 0";
	// 	$result = $this->db->query($query);
	// 	return $result->result_array();
	// }

	// public function setGedung($data)
	// {
	// 	if (!isset($data['id_gedung'])) {
	// 		$query = "INSERT INTO TB_gedung(nama_gedung, DELETED) VALUES('".$data['nama_gedung']."',0)";
	// 	}else{
	// 		$query = "UPDATE TB_gedung SET nama_gedung = '".$data['nama_gedung']."' WHERE ID_gedung = ".$data['id_gedung'];
	// 	}
	// 	if ($this->db->query($query)) {
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }

	// public function deleteGedung($id)
	// {
	// 	$query = "UPDATE TB_gedung SET DELETED=1 WHERE ID_gedung = ".$id;
	// 	if ($this->db->query($query)) {
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }

}

/* End of file M_KategoriBarang */
/* Location: ./application/models/M_KategoriBarang */