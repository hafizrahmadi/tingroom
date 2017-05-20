<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

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
		$this->data['history'] = 'active';
	}	

	public function index()
	{	
		$id_user = $this->data['session']['id_user'];
		$this->data['inprogress'] = 'active';
		$this->data['booking'] = $this->M_booking->getBookDemand($id_user);
		$this->data['det_booking'] = $this->M_booking->getDetBookDemand($id_user);
		
		$this->load->view('view_history1',$this->data);		
		
	}

	public function completed(){

		$id_user = $this->data['session']['id_user'];
		$this->data['completed'] = 'active';
		$this->data['booking'] = $this->M_booking->getBookCompleted($id_user);
		$this->data['det_booking'] = $this->M_booking->getDetBookCompleted($id_user);
		// die(var_dump($this->data['booking']));
		$this->load->view('view_history2',$this->data);		
	}
	
}

