<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_booking extends CI_Model {

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

		//<start> set waktu update data status booking/jadwal otomatis
		$qtime = "select b.id_booking, b.waktu, d.id_det_booking, d.id_jadwal, min(j.jam_awal) as jam_awal
					from tb_booking b join tb_det_booking d on d.id_booking=b.id_booking
							join tb_jadwal j on d.id_jadwal=j.id_jadwal
					where b.id_booking = $id_booking";
		$resqtime=$this->db->query($qtime);
		$arr = $resqtime->result_array();
		$tgl = $arr[0]['waktu'];
		$jam = $arr[0]['jam_awal'];
		$waktu = $tgl.' '.$jam;		
		$waktu_update = date('Y-m-d H:i:s', strtotime($tgl.' '.$jam));
		//<end> set waktu update otomatis

		//<start> buat event update data status booking otomatis
		$query3 = "create EVENT event_reject_exp_booking_".$id_booking."
					ON SCHEDULE
					AT '".$waktu_update."'
					DO update `tb_booking` set `status` = 2 where `status`=0 and `id_booking`=$id_booking";
		$result3 = $this->db->query($query3);
		//<end> buat event update data status booking otomatis

		return true;
		
	}

	public function getUnreadBookUser($id_user){
			$query = "select count(*) as notif from `tb_booking` where `status`!=0 and `read`=0 and `id_user`=$id_user";
			$result = $this->db->query($query);
			return $result->result_array();
	}

	public function updateUnreadBookPro($id_user){
		$query = "update `tb_booking` set `read`=1 where `status`=1 and `id_user`=$id_user";
		$this->db->query($query);
		return true;
	}

	public function updateUnreadBookCom($id_user){
		$query = "update `tb_booking` set `read`=1 where (`status`=2 or `status`=3) and `id_user`=$id_user";
		$this->db->query($query);
		return true;
	}

	public function getUnreadDemandBook(){
		$query = "select count(*) as notif from `tb_booking` where `status`=0";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function getBookDemand($id_user)
	{
		$query = "select b.id_booking, b.waktu, b.deskripsi, b.status, r.nama_ruangan, l.nama_lantai, g.nama_gedung
					from tb_booking b join tb_det_booking d on d.id_booking = b.id_booking
						join tb_jadwal j on d.id_jadwal = j.id_jadwal
						join tb_ruangan r on j.id_ruangan = r.id_ruangan
						join tb_lantai l on r.id_lantai = l.id_lantai
						join tb_gedung g on l.id_gedung = g.id_gedung
					where b.id_user = $id_user and (b.status = 0 or b.status=1)
					group by (b.id_booking) order by  b.status desc, b.id_booking desc";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function getDetBookDemand($id_user)
	{
		$query = "select b.id_booking, b.waktu, b.status, d.id_jadwal, j.jam_awal, j.jam_akhir
					from tb_booking b join tb_det_booking d on d.id_booking = b.id_booking
						join tb_jadwal j on d.id_jadwal = j.id_jadwal
					where b.id_user = $id_user and (b.status = 0 or b.status=1) order by b.id_booking desc";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function getBookingDemand(){
			$query = "select b.id_booking, b.waktu, b.deskripsi, b.status, u.email, u.nama, r.nama_ruangan, l.nama_lantai, g.nama_gedung, b.time_created
					from tb_booking b join tb_det_booking d on d.id_booking = b.id_booking
						join tb_jadwal j on d.id_jadwal = j.id_jadwal
						join tb_ruangan r on j.id_ruangan = r.id_ruangan
						join tb_lantai l on r.id_lantai = l.id_lantai
						join tb_gedung g on l.id_gedung = g.id_gedung
						join tb_user u on b.id_user = u.id_user
					where b.status = 0
					group by (b.id_booking) order by b.time_created asc";
		$result = $this->db->query($query);
		return $result->result_array();	
	}

	public function getDetBookingDemand()
	{
		$query = "select b.id_booking, b.waktu, b.status,d.id_det_booking, d.id_jadwal, j.jam_awal, j.jam_akhir
					from tb_booking b join tb_det_booking d on d.id_booking = b.id_booking
						join tb_jadwal j on d.id_jadwal = j.id_jadwal
					where b.status = 0  order by b.id_booking desc";
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
					where b.id_user = $id_user and (b.status = 2 or b.status=3)
					group by (b.id_booking) order by b.id_booking desc";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function getDetBookCompleted($id_user)
	{
		$query = "select b.id_booking, b.waktu, b.status, d.id_jadwal, j.jam_awal, j.jam_akhir
					from tb_booking b join tb_det_booking d on d.id_booking = b.id_booking
						join tb_jadwal j on d.id_jadwal = j.id_jadwal
					where b.id_user = $id_user and (b.status = 2 or b.status=3) order by b.id_booking desc";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function reject($id_booking){
		// update data status booking jadi rejected
		$query = "update tb_booking set status=2 where id_booking = $id_booking";
		$result = $this->db->query($query);
		
		// hapus event auto reject booking expired
		$query2 = "drop event event_reject_exp_booking_".$id_booking;
		$this->db->query($query2);

		return true;
	}

	public function approve($id_booking){
		//<start> update data status booking jadi approved
		$query = "update tb_booking set status=1 where id_booking = $id_booking";
		$result = $this->db->query($query);
		//<end> update data status booking jadi approved

		//<start> update data status jadwal jadi reserved
		$query2 = "update tb_jadwal j set j.status=2 where j.id_jadwal in (select d.id_jadwal from tb_det_booking d where d.id_booking = ".$id_booking.")";
		$result2 = $this->db->query($query2);
		//<end> update data status jadwal jadi reserved

		//<start> set waktu update data status booking/jadwal otomatis
		$qtime = "select b.id_booking, b.waktu, d.id_det_booking, d.id_jadwal, max(j.jam_akhir) as jam_akhir
					from tb_booking b join tb_det_booking d on d.id_booking=b.id_booking
							join tb_jadwal j on d.id_jadwal=j.id_jadwal
					where b.id_booking = $id_booking";
		$resqtime=$this->db->query($qtime);
		$arr = $resqtime->result_array();
		$tgl = $arr[0]['waktu'];
		$jam = $arr[0]['jam_akhir'];
		$waktu = $tgl.' '.$jam;		
		$waktu_update = date('Y-m-d H:i:s', strtotime($tgl.' '.$jam));
		//<end> set waktu update otomatis

		//<start> buat event update data status booking otomatis
		$query3 = "create EVENT event_update_booking_".$id_booking."
					ON SCHEDULE
					AT '".$waktu_update."'
					DO update `tb_booking` set `status`=3, `read`=0 where `id_booking`=$id_booking";
		$result3 = $this->db->query($query3);
		//<end> buat event update data status booking otomatis
		//<start> buat event update data status jadwal otomatis
		$query4 = "create EVENT event_update_det_booking_".$id_booking."
					ON SCHEDULE
					AT '".$waktu_update."'
					DO update tb_jadwal set status=0 where id_jadwal in (select d.id_jadwal from tb_det_booking d where d.id_booking = ".$id_booking.")";
		$result4 = $this->db->query($query4);
		//<end> buat event update data status booking otomatis

		// hapus event auto reject booking expired
		$query5 = "drop event event_reject_exp_booking_".$id_booking;
		$this->db->query($query5);

		return true;
	}
	

}

/* End of file M_KategoriBarang */
/* Location: ./application/models/M_KategoriBarang */