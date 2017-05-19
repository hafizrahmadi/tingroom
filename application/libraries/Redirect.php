<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Redirect{
	public function backToLogin()
	{	
		$CI =& get_instance();

		$CI->load->library('session');
		$session = $CI->session->userdata('logged_in');
		if (!isset($session)) {
			redirect('Auth','refresh');			
		}else{
			return false;
		}
	}

	public function backToCurrent(){
		$CI =& get_instance();
		$session = $CI->session->userdata('logged_in');
		if (isset($session)) {
			$referred_from = $CI->session->userdata('referred_from');
			redirect($referred_from, 'refresh');
		}else{
			return false;
		}
	}

	public function backToCurrentUser(){
		$CI =& get_instance();
		$session = $CI->session->userdata('logged_in');
		if (isset($session)&&$session['level']==3) {
			$referred_from = $CI->session->userdata('referred_from');
			redirect($referred_from, 'refresh');
		}else{
			return false;
		}
	}

	public function backToCurrentAdmin(){
		$CI =& get_instance();
		$session = $CI->session->userdata('logged_in');
		if (isset($session)&&$session['level']==1) {
			$referred_from = $CI->session->userdata('referred_from');
			redirect($referred_from, 'refresh');
		}else{
			return false;
		}
	}

	public function backToCurrentSek(){
		$CI =& get_instance();
		$session = $CI->session->userdata('logged_in');
		if (isset($session)&&$session['level']==2) {
			$referred_from = $CI->session->userdata('referred_from');
			redirect($referred_from, 'refresh');
		}else{
			return false;
		}
	}
}

/* End of file Redirect.php */
/* Location: ./application/controllers/Redirect.php */