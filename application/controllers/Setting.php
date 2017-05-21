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
		$this->load->view('new_view_setting1',$this->data);
		
		// echo "<a href='".site_url('auth/logout')."' class='btn btn-default btn-flat'><i class='fa fa-sign-out'></i> Sign out</a>";
	}

	public function logout(){
		$this->data['setlogout'] = 'active';
		$this->load->view('new_view_setting2',$this->data);
	}

	public function changepassword(){
		$this->data['setedit'] = 'active';
		$id_user = $this->data['session']['id_user'];
		$this->data['user'] = $this->M_user->getIDUser($id_user);

		$this->load->view('form_change_password',$this->data);	
	}

	public function proses_changepassword(){
		$id_user = $this->data['session']['id_user'];

		$this->form_validation->set_error_delimiters("<div style='color:red;'>","</div>");
		$this->form_validation->set_rules('old_password', 'Password Lama', 'trim|required|callback_cek_password',array('trim'=>'','required'=>'Kolom {field} harus diisi.'));
		$this->form_validation->set_rules('password', 'Password Baru', 'trim|min_length[8]|required',array('trim'=>'','required'=>'Kolom {field} harus diisi.','min_length'=>'Kolom {field} minimal {param} karakter.'));
		$this->form_validation->set_rules('conf_password', 'Konfirmasi Password Baru', 'trim|required|matches[password]',array('trim'=>'','required'=>'Kolom {field} harus diisi.','matches'=>'{field} harus sama dengan Password.'));

		$this->data['old_password'] = $this->input->post('old_password');
		$this->data['password'] = $this->input->post('password');
		$this->data['conf_password'] = $this->input->post('conf_password');

		if ($this->form_validation->run()==FALSE) {
			$this->load->view('form_change_password',$this->data);
		}else{
			$data_change = array(
					'password' => $this->data['password'],
					'id_user' => $id_user
					);
			$this->M_user->changePassword($data_change);
			echo "<script>alert('Password berhasil diperbaharui. Silahkan melakukan login kembali dengan password baru.')</script>";

			redirect('Auth/logout','refresh');
		}
	}

	public function cek_password($str){
		$id_user = $this->data['session']['id_user'];
		
		if ($this->M_user->cekPassword($str,$id_user)) {		
			return true;
		}else{
			$this->form_validation->set_message('cek_password', 'Password Lama tidak sesuai');
			return false;
		}
	}

	public function editprofile(){
		$this->data['setedit'] = 'active';
		$id_user = $this->data['session']['id_user'];
		$this->data['user'] = $this->M_user->getIDUser($id_user);

		$this->load->view('form_edit_profile',$this->data);	
	}

	public function proses_editprofile(){
		$id_user = $this->data['session']['id_user'];
		$this->form_validation->set_error_delimiters("<div style='color:red;'>","</div>");
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required',array('trim'=>'','required'=>'Kolom {field} harus diisi.'));
		$this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'trim|is_natural|max_length[20]',array('trim'=>'','is_natural'=>'Kolom {field} harus berisi angka.','max_length'=>'{field} maksimal {param} karakter.'));

		$this->data['nama'] = $this->input->post('nama',TRUE);
		$this->data['no_hp'] = $this->input->post('no_hp',TRUE);

		if ($this->form_validation->run()==FALSE) {
			$this->load->view('form_edit_profile',$this->data);
		}else{
			$data_edit = array(
					'nama' => $this->data['nama'],
					'no_hp' => $this->data['no_hp'],
					'id_user' => $id_user
					);
			$this->M_user->editProfile($data_edit);
			// $this->session->set_userdata('logged_in',array('nama'=>$this->data['nama']));
			echo "<script>alert('Data profile berhasil diperbaharui')</script>";

			redirect('Setting/','refresh');
		}

	}
}