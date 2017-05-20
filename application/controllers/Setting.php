<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Redirect');
		$this->load->model('M_Lantai','',true);
		$this->load->model('M_Ruangan','',true);
		$this->load->model('M_Jadwal','',true);
		$this->load->model('M_booking','',true);
		$this->load->model('M_user','',true);
		$this->redirect->backToCurrentAdmin();
		$this->redirect->backToLogin();
		$this->session->set_userdata('referred_from', current_url());
		$this->data['session'] = $this->session->userdata('logged_in');
		$this->data['setting'] = 'active';
		$this->data['notifUnread'] = $this->M_booking->getUnreadBookUser($this->data['session']['id_user']);
	}	

	public function index()
	{		
		$this->data['setedit'] = 'active';
		$id_user = $this->data['session']['id_user'];
		$this->data['user'] = $this->M_user->getIDUser($id_user);
		$this->load->view('view_setting1',$this->data);
		
		// echo "<a href='".site_url('auth/logout')."' class='btn btn-default btn-flat'><i class='fa fa-sign-out'></i> Sign out</a>";
	}

	public function logout(){
		$this->data['setlogout'] = 'active';
		$this->load->view('view_setting2',$this->data);
	}
}