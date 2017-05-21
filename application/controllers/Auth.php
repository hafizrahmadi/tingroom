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

		$this->load->view('new_form_login');
	}

	public function login()
	{
		$this->redirect->backToCurrent();

		$this->form_validation->set_error_delimiters('<div style="color:#FF0000;">','</div>');
		$this->form_validation->set_rules('email', 'email', 'trim|required',array('trim'=>'','required'=>'Kolom {field} harus diisi.'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required',array('trim'=>'','required'=>'Kolom {field} harus diisi.'));
		$data['email'] = $this->input->post('email',TRUE);
		$data['password'] = $this->input->post('password',TRUE);
		// die(var_dump($data));
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('new_form_login',$data);
		}else{
			
			$level = 3;			
			$result = $this->M_User->login($data['email'],$data['password'],$level);
			if ($result!=FALSE) {
				if ($result[0]['status']==0) {
					$data['error_message'] = 'Akun belum dikonfirmasi oleh admin.';
					$this->load->view('new_form_login',$data);	
				}else{
					$session_data = array(
					'email' => $result[0]['email'],
					'id_user' => $result[0]['id_user'],
					'level' => $result[0]['level'],
					'nama' => $result[0]['nama']
					);
				$this->session->set_userdata('logged_in',$session_data);
				$session = $this->session->userdata('logged_in');
				echo "<script>
					alert('Selamat Datang ".$session['nama']."!');
					document.location='".site_url('apps')."';
				</script>";	
				}				
			}else{
				$data['error_message'] = 'Email atau Password salah';
				$this->load->view('new_form_login',$data);
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
		$data['unit'] = $this->M_Unit->getUnit();
		$data['lantai'] = $this->M_Lantai->getLantai();

		$this->form_validation->set_error_delimiters("<div style='color:red;'>","</div>");
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required',array('trim'=>'','required'=>'Kolom {field} harus diisi.'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tb_user.email]',array('trim'=>'','required'=>'Kolom {field} harus diisi.', 'valid_email'=>'{field} tidak valid.', 'is_unique'=>'{field} telah terdaftar.'));
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|required',array('trim'=>'','required'=>'Kolom {field} harus diisi.','min_length'=>'Kolom {field} minimal {param} karakter.'));
		$this->form_validation->set_rules('conf_password', 'Konfirmasi Password', 'trim|required|matches[password]',array('trim'=>'','required'=>'Kolom {field} harus diisi.','matches'=>'{field} harus sama dengan Password.'));
		$this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'trim|required|is_natural|max_length[20]',array('trim'=>'','required'=>'Kolom {field} harus diisi.','is_natural'=>'Kolom {field} harus berisi angka.','max_length'=>'{field} maksimal {param} karakter.'));
		$this->form_validation->set_rules('id_unit', 'Unit', 'trim|required',array('trim'=>'','required'=>'Unit harus dipilih.'));
		$this->form_validation->set_rules('id_lantai', 'Lokasi', 'trim|required',array('trim'=>'','required'=>'Lokasi harus dipilih.'));

		$data['nama'] = $this->input->post('nama',TRUE);
		$data['email'] = $this->input->post('email',TRUE);
		$data['password'] = $this->input->post('password',TRUE);
		$data['conf_password'] = $this->input->post('conf_password',TRUE);
		$data['no_hp'] = $this->input->post('no_hp',TRUE);
		$data['id_unit'] = $this->input->post('id_unit',TRUE);
		$data['id_lantai'] = $this->input->post('id_lantai',TRUE);

		if ($this->form_validation->run()==FALSE) {
			$this->load->view('form_register',$data);
		}else{
			$data_register = array(
					'nama' => $data['nama'],
					'email' => $data['email'],
					'password' => $data['password'],
					'no_hp' => $data['no_hp'],
					'id_unit' => $data['id_unit'],
					'id_lantai' => $data['id_lantai']
					);
			$this->M_User->register($data_register);
			echo "<script>alert('Akun anda berhasil terdaftar, silahkan tunggu konfirmasi admin.')</script>";

			redirect('auth/index');
		}
	}
        
    public function logout()
	{
		if ($this->session->userdata['logged_in']['level']!=3 ) {
			$direct='Auth/loginbackend';
		}else{
			$direct='Auth/';
		}
		$this->session->unset_userdata('logged_in');
		// die();
		echo "<script>
		alert('Anda telah ter-logout');
		document.location='".site_url($direct)."';
		</script>";			
        // redirect($direct);
	}

	public function test(){
		// $key = $this->encryption->create_key(16);
		// echo $key;
		// $key = 'user';
		// $encrypted = password_hash($key,PASSWORD_DEFAULT);
		
		// echo $encrypted;
		// $jebaited = $this->encryption->decrypt($encrypted);
		// echo $jebaited;

		// $this->load->view('view_frontend');
	}
}
