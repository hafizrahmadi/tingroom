<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Redirect');
		// $this->load->model('M_Lantai','',true);
		// $this->load->model('M_Ruangan','',true);
		// $this->load->model('M_Jadwal','',true);
		$this->load->model('M_booking','',true);
		// $this->load->model('M_user','',true);
		$this->redirect->backToCurrentAdmin();
		$this->redirect->backToLogin();
		$this->session->set_userdata('referred_from', current_url());
		$this->data['session'] = $this->session->userdata('logged_in');
		$this->data['setting'] = 'active';
		$this->data['notifUnread'] = $this->M_booking->getUnreadBookUser($this->data['session']['id_user']);
	}	

	public function index()
	{		
		$this->data['setfaq'] = 'active';		
		$this->load->view('view_faq',$this->data);
		
		
	}

	public function toc(){
		$this->data['settoc'] = 'active';
		$this->load->view('view_toc',$this->data);
	}
}