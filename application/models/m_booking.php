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
		$qtime = "select b.id_booking, b.waktu, d.id_det_booking, d.id_jadwal, max(j.jam_akhir) as jam_akhir
					from tb_booking b join tb_det_booking d on d.id_booking=b.id_booking
							join tb_jadwal j on d.id_jadwal=j.id_jadwal
					where b.id_booking = $id_booking";
		$resqtime=$this->db->query($qtime);
		$arr = $resqtime->result_array();
		$tgl = $arr[0]['waktu'];
		$jam = $arr[0]['jam_akhir'];
		$waktu = $tgl.' '.$jam;		
		$waktu_expired = date('Y-m-d H:i:s', strtotime($tgl.' '.$jam));
		//<end> set waktu update otomatis

		//<start> set time_expired
		$query3 = "update tb_booking set time_expired='$waktu_expired' where id_booking=$id_booking";
		$result3 = $this->db->query($query3);

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

	public function getUnreadDemandBook($id_lantai){
		$query = "select count(*) as notif 
					from `tb_booking` b, tb_det_booking d
					where b.id_booking = d.id_det_booking
                    	and d.id_jadwal in (select ja.id_jadwal
                                          	FROM tb_jadwal ja join tb_ruangan r on ja.id_ruangan = r.id_ruangan
                                          				join tb_lantai l on r.id_lantai = l.id_lantai
                                          	WHERE l.id_lantai=$id_lantai)
                    	and b.status=0";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function getUnreadConfirmBook($id_lantai){
		$query = "select count(*) as notif 
					from `tb_booking` b, tb_det_booking d
					where b.id_booking = d.id_det_booking
                    	and d.id_jadwal in (select ja.id_jadwal
                                          	FROM tb_jadwal ja join tb_ruangan r on ja.id_ruangan = r.id_ruangan
                                          				join tb_lantai l on r.id_lantai = l.id_lantai
                                          	WHERE l.id_lantai=$id_lantai)
                    	and b.status=1";
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
					where b.id_user = $id_user and (b.status = 0 or b.status=1 or (b.status=3 and b.time_expired>now()))
					group by (b.id_booking) order by  b.status desc, b.id_booking desc";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function getDetBookDemand($id_user)
	{
		$query = "select b.id_booking, b.waktu, b.status, d.id_jadwal, j.jam_awal, j.jam_akhir
					from tb_booking b join tb_det_booking d on d.id_booking = b.id_booking
						join tb_jadwal j on d.id_jadwal = j.id_jadwal
					where b.id_user = $id_user and (b.status = 0 or b.status=1 or (b.status=3 and b.time_expired>now())) order by b.id_booking desc";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function getBookingDemand($id_lantai){
		$query = "select b.id_booking, b.waktu, b.deskripsi, b.status, u.email, u.nama, r.nama_ruangan, l.nama_lantai, g.nama_gedung, b.time_created, GROUP_CONCAT(concat(j.jam_awal,concat('-',j.jam_akhir)) separator ', ') as jam_jadwal
					from tb_booking b join tb_det_booking d on d.id_booking = b.id_booking
						join tb_jadwal j on d.id_jadwal = j.id_jadwal
						join tb_ruangan r on j.id_ruangan = r.id_ruangan
						join tb_lantai l on r.id_lantai = l.id_lantai
						join tb_gedung g on l.id_gedung = g.id_gedung
						join tb_user u on b.id_user = u.id_user
					where b.status = 0 and r.id_lantai = $id_lantai
					group by (b.id_booking) order by b.time_created asc";
		$result = $this->db->query($query);
		return $result->result_array();	
	}

	public function getBookingApproved($id_lantai)
	{
		$query = "select b.id_booking, b.waktu, b.deskripsi, b.status, u.email, u.nama, r.nama_ruangan, l.nama_lantai, g.nama_gedung, b.time_created, GROUP_CONCAT(concat(j.jam_awal,concat('-',j.jam_akhir)) separator ', ') as jam_jadwal
					from tb_booking b join tb_det_booking d on d.id_booking = b.id_booking
						join tb_jadwal j on d.id_jadwal = j.id_jadwal
						join tb_ruangan r on j.id_ruangan = r.id_ruangan
						join tb_lantai l on r.id_lantai = l.id_lantai
						join tb_gedung g on l.id_gedung = g.id_gedung
						join tb_user u on b.id_user = u.id_user
					where b.status = 1 and r.id_lantai = $id_lantai
					group by (b.id_booking) order by b.time_created asc";
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
					where b.id_user = $id_user and (b.status = 2 or (b.status=3 and b.time_expired<now()))
					group by (b.id_booking) order by b.id_booking desc";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function getDetBookCompleted($id_user)
	{
		$query = "select b.id_booking, b.waktu, b.status, d.id_jadwal, j.jam_awal, j.jam_akhir
					from tb_booking b join tb_det_booking d on d.id_booking = b.id_booking
						join tb_jadwal j on d.id_jadwal = j.id_jadwal
					where b.id_user = $id_user and (b.status = 2 or (b.status=3 and b.time_expired<now())) order by b.id_booking desc";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function getHistoryBooking($id_lantai){
		$query = "select b.id_booking, b.waktu, b.deskripsi, b.status, u.email, u.nama, r.nama_ruangan, l.nama_lantai, g.nama_gedung, b.time_created, b.time_expired, GROUP_CONCAT(concat(j.jam_awal,concat('-',j.jam_akhir)) separator ', ') as jam_jadwal
				from tb_booking b join tb_det_booking d on d.id_booking = b.id_booking
					join tb_jadwal j on d.id_jadwal = j.id_jadwal
					join tb_ruangan r on j.id_ruangan = r.id_ruangan
					join tb_lantai l on r.id_lantai = l.id_lantai
					join tb_gedung g on l.id_gedung = g.id_gedung
					join tb_user u on b.id_user = u.id_user
					where l.id_lantai = $id_lantai
				group by (b.id_booking) order by b.time_created asc";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function reject($id_booking){
		// update data status booking jadi rejected
		$query = "update tb_booking set status=2 where id_booking = $id_booking";
		$result = $this->db->query($query);
		return true;
	}

	public function approve($id_booking){
		//<start> update data status booking jadi approved
		$query = "update tb_booking set `status`=1 where id_booking = $id_booking";
		$result = $this->db->query($query);
		//<end> update data status booking jadi approved
		return true;
	}
	
	public function confirm($id_booking){
		$query = "update tb_booking set status=3, `read`=0 where id_booking = $id_booking";
		$result = $this->db->query($query);
		return true;
	}	

}

/* End of file M_KategoriBarang */
/* Location: ./application/models/M_KategoriBarang */