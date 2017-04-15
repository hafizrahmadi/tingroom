<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blank extends CI_Controller {

	public function index()
	{
		$this->load->view('blank');
		$this->session->set_userdata('referred_from', current_url());
	}
}
