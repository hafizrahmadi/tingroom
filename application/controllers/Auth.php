<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_User','',true);
		$this->load->model('M_Unit','',true);
		$this->load->model('M_Lantai','',true);
		$this->load->library('redirect');
		$this->load->library('encryption');
	}

	public function index()
	{
		$this->redirect->backToCurrent();
		$this->load->view('form_login');

	}

	public function login()
	{
		$this->redirect->backToCurrent();
		$this->form_validation->set_error_delimiters('<div style="color:#FF0000;">','</div>');
		$this->form_validation->set_rules('email', 'email', 'trim|required',array('trim'=>'','required'=>'Kolom {field} harus diisi.'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required',array('trim'=>'','required'=>'Kolom {field} harus diisi.'));
		$data['email'] = $this->input->post('email',TRUE);
		$data['password'] = $this->input->post('password',TRUE);
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('form_login',$data);
		}else{
			
			$level = 3;			
			$result = $this->M_User->login($data['email'],$data['password'],$level);
			if ($result!=FALSE) {
				$session_data = array(
					'email' => $result[0]['email'],
					'id_user' => $result[0]['id_user'],
					'level' => $result[0]['level']
					);
				$this->session->set_userdata('logged_in',$session_data);
				$session = $this->session->userdata('logged_in');
				redirect('apps');
			}else{
				$data['error_message'] = 'Email atau Password salah';
				$this->load->view('form_login',$data);
			}			
		}
        
	}

	public function backend()
	{
		
		$this->redirect->backToCurrent();
		$this->load->view('form_login_backend');
	}
        
	public function loginbackend()
	{
		$this->redirect->backToCurrent();
		$this->form_validation->set_error_delimiters('<div class="text-red">','</div>');
		$this->form_validation->set_rules('username', 'Username', 'trim|required',array('trim'=>'','required'=>'Kolom {field} harus diisi.'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required',array('trim'=>'','required'=>'Kolom {field} harus diisi.'));
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('form_login_backend');
		}else{
			$username = $this->input->post('username',TRUE);
			$password = $this->input->post('password',TRUE);	
			
			$result = $this->M_User->login($username,$password);
			if ($result!=FALSE) {
				$session_data = array(
					'email' => $result[0]['email'],
					'id_user' => $result[0]['id_user'],
					'level' => $result[0]['level']
					);
				$this->session->set_userdata('logged_in',$session_data);
				$session = $this->session->userdata('logged_in');
				redirect('dashboard');
			}else{
				$data = array('error_message'=>'Username atau Password salah');
				$this->load->view('form_login_backend',$data);
			}			
		}
        
	}

	public function signup(){
		$this->redirect->backToCurrent();
		$data['unit'] = $this->M_Unit->getUnit();
		$data['lantai'] = $this->M_Lantai->getLantai();
		$this->load->view('form_register', $data);
	}

	public function proses_signup(){
		$this->redirect->backToCurrent();
		$this->form_validation->set_error_delimiters('<div class="text-red">','</div>');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required',array('trim'=>'','required'=>'Kolom {field} harus diisi.'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required',array('trim'=>'','required'=>'Kolom {field} harus diisi.'));
		
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('form_login_backend');
		}else{
			$username = $this->input->post('username',TRUE);
			$password = $this->input->post('password',TRUE);	
			
			$result = $this->M_User->login($username,$password);
			if ($result!=FALSE) {
				$session_data = array(
					'email' => $result[0]['email'],
					'id_user' => $result[0]['id_user'],
					'level' => $result[0]['level']
					);
				$this->session->set_userdata('logged_in',$session_data);
				$session = $this->session->userdata('logged_in');
				redirect('dashboard');
			}else{
				$data = array('error_message'=>'Username atau Password salah');
				$this->load->view('form_login_backend',$data);
			}			
		}
	}
        
    public function logout()
	{
		if ($this->session->userdata['logged_in']['level']!=3 ) {
			$direct='Auth/loginbackend';
		}else{
			$direct='Auth/login';
		}
		$this->session->unset_userdata('logged_in');
		echo "<script>alert('Anda telah ter-logout')</script>";			
        redirect($direct);
	}

	public function test(){
		// $key = $this->encryption->create_key(16);
		// echo $key;
		$key = 'sekretaris';
		$encrypted = password_hash($key,PASSWORD_DEFAULT);
		echo $encrypted;
		// $jebaited = $this->encryption->decrypt($encrypted);
		// echo $jebaited;
	}
}
