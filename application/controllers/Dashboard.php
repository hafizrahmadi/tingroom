<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public $data = null;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Redirect');
		$this->load->model('M_gedung','',true);
		$this->load->model('M_booking','',true);
		$this->redirect->backToCurrentUser();		
		$this->redirect->backToLogin();

		$sesi = $this->session->userdata('logged_in');
		$this->data = array(
			'session' => $sesi			
			);
		if ($this->data['session']['level']=='2') {
			$this->data['notifUnread'] = $this->M_booking->getUnreadDemandBook($this->data['session']['id_lantai']);
		}
		
	}	

	public function index()
	{		
		// die(var_dump($this->data['session']));
		$this->data['home'] = 'active';
		// die(var_dump($data));
		$this->load->view('view_dashboard1',$this->data);
		// var_dump($this->data);
		$this->session->set_userdata('referred_from', current_url());
	}

	

}
