<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apps extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Redirect');
		$this->load->model('M_Lantai','',true);
		$this->load->model('M_Ruangan','',true);
		$this->load->model('M_Jadwal','',true);
		$this->load->model('M_booking','',true);
		$this->redirect->backToCurrentAdmin();
		$this->redirect->backToLogin();
		$this->session->set_userdata('referred_from', current_url());
		$this->data['session'] = $this->session->userdata('logged_in');
		$this->data['apps'] = 'active';
		$this->data['notifUnread'] = $this->M_booking->getUnreadBookUser($this->data['session']['id_user']);
	}	

	public function index()
	{		
		
		// $this->load->view('view_dashboard1',$data);
		$this->data['lantai'] = $this->M_Lantai->getLantai();
		$this->load->view('new_view_booking1',$this->data);
		
		// echo "<a href='".site_url('auth/logout')."' class='btn btn-default btn-flat'><i class='fa fa-sign-out'></i> Sign out</a>";
	}

	public function booking(){
		// die(var_dump($this->input->post()));
		if ($this->input->post('id_lantai')!=null) {
			$this->session->set_userdata('id_lantai',$this->input->post('id_lantai'));
		}
		if ($this->input->post('waktu')!=null) {
			$this->session->set_userdata('waktu_booking',date('Y-m-d',strtotime($this->input->post('waktu'))));
		}

		$id_lantai = $this->session->userdata('id_lantai');
		$waktu = $this->session->userdata('waktu_booking');
		$this->data['lantai'] = $this->M_Lantai->getIDLantai($id_lantai);
		$this->data['ruangan'] = $this->M_Ruangan->getRuanganInLantai($id_lantai);
		$this->data['waktu'] = $waktu;
		$this->data['jadwal'] = $this->M_Jadwal->getJadwalInLantai($id_lantai,$waktu);
		// var_dump($this->data['ruangan']);
		$this->load->view('view_booking2',$this->data);
		
	}

	public function book_demand(){
		// var_dump($this->input->post('jadwal'));
		if ($this->input->post('id_ruangan')!=null) {
			$this->session->set_userdata('id_ruangan',$this->input->post('id_ruangan'));
		}

		if ($this->input->post('jadwal')!=null) {
			$this->session->set_userdata('jadwal',$this->input->post('jadwal'));
		}
		
		$id_ruangan = $this->session->userdata('id_ruangan');
		$jadwal = $this->session->userdata('jadwal');
		$this->data['waktu'] = $this->session->userdata('waktu_booking');
		$this->data['ruangan'] = $this->M_Ruangan->getIDRuangan($id_ruangan);
		$this->data['jadwal'] = $this->M_Jadwal->getIDArrJadwal($jadwal);
		// var_dump($this->data['jadwal']);
		$this->load->view('form_booking',$this->data);
	}

	public function proses_book(){
		// var_dump($this->input->post());
		// var_dump($this->session->userdata('logged_in'));
		
		// echo $mysqltime;
		$this->data['id_user'] = $this->session->userdata('logged_in')['id_user'];
		$phptime = strtotime($this->input->post('waktu'));
		$this->data['waktu'] = date('Y-m-d', $phptime);
		$this->data['jadwal'] = $this->input->post('jadwal');
		$this->data['deskripsi'] = $this->input->post('deskripsi');
		// var_dump($this->data);
		$this->M_booking->setBooking($this->data);
		echo "<script>
					alert('Data booking telah ditambahkan. Tunggu konfirmasi dari sekretaris.');
					document.location='".site_url('history/')."';
				</script>";
	}
}

