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
		$this->redirect->backToCurrentAdmin();
		$this->redirect->backToLogin();
		$this->session->set_userdata('referred_from', current_url());
	}	

	public function index()
	{		
		$this->redirect->backToLogin();
		$data['session'] = $this->session->userdata('logged_in');
		
		// $this->load->view('view_dashboard1',$data);
		$data['lantai'] = $this->M_Lantai->getLantai();
		$this->load->view('view_booking1',$data);
		
		// echo "<a href='".site_url('auth/logout')."' class='btn btn-default btn-flat'><i class='fa fa-sign-out'></i> Sign out</a>";
	}

	public function booking(){
		if ($this->input->post('id_lantai')!=null) {
			$this->session->set_userdata('id_lantai',$this->input->post('id_lantai'));
		}
		$id_lantai = $this->session->userdata('id_lantai');
		$data['lantai'] = $this->M_Lantai->getIDLantai($id_lantai);
		$data['ruangan'] = $this->M_Ruangan->getRuanganInLantai($id_lantai);
		$data['jadwal'] = $this->M_Jadwal->getJadwalInLantai($id_lantai);
		// var_dump($data['ruangan']);
		$this->load->view('view_booking2',$data);
		
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
		$data['ruangan'] = $this->M_Ruangan->getIDRuangan($id_ruangan);
		$data['jadwal'] = $this->M_Jadwal->getIDArrJadwal($jadwal);
		// var_dump($data['jadwal']);
		$this->load->view('form_booking',$data);
	}
}

