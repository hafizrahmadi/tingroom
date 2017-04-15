<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apps extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Redirect');
		$this->redirect->backToCurrentAdmin();		
	}	

	public function index()
	{		
		$this->redirect->backToLogin();
		$session = $this->session->userdata('logged_in');
		$data = array(
				'data' => $session
			);
		// die(var_dump($data));
		var_dump($data);
		// $this->load->view('view_dashboard1',$data);
		$this->session->set_userdata('referred_from', current_url());
		echo "<a href='".site_url('auth/logout')."' class='btn btn-default btn-flat'><i class='fa fa-sign-out'></i> Sign out</a>";
	}
}
