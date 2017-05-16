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

	public function booking($id_lantai){
		$data['lantai'] = $this->M_Lantai->getIDLantai($id_lantai);
		$data['ruangan'] = $this->M_Ruangan->getRuanganInLantai($id_lantai);
		$data['jadwal'] = $this->M_Jadwal->getJadwalInLantai($id_lantai);
		// var_dump($data['ruangan']);
		$this->load->view('view_booking2',$data);
		
	}

	public function book_demand(){
		// var_dump($this->input->post('jadwal'));
		$data['ruangan'] = $this->M_Ruangan->getIDRuangan($this->input->post('id_ruangan'));
		$data['jadwal'] = $this->M_Jadwal->getIDArrJadwal($this->input->post('jadwal'));
		// var_dump($data['jadwal']);
		$this->load->view('form_booking',$data);
	}
}

