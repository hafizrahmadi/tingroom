<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Masteruser extends CI_Controller {

	public $data = null;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Redirect');
		$this->load->model('M_user','',true);
		$this->load->model('M_lantai','',true);
		$this->load->model('M_unit','',true);
		$this->redirect->backToCurrentUser();		
		$this->redirect->backToLogin();

		$sesi = $this->session->userdata('logged_in');
		$this->data = array(
				'session' => $sesi,
				'masteruser' => 'active'
			);
		$this->session->set_userdata('referred_from', current_url());
	}

	public function index()
	{
		
		$this->data['user']=$this->M_user->getUser();

		// die(var_dump($this->data['user']));
		$this->load->view('view_master_user',$this->data);

		// var_dump($data);		
	}

	public function tambah()
	{
		$this->data['unit'] = $this->M_unit->getUnit();
		$this->data['lantai'] = $this->M_lantai->getLantai();

		$this->load->view('form_user',$this->data);		
	}

	public function prosesform($id=null){
		
		$this->data['unit'] = $this->M_unit->getUnit();
		$this->data['lantai'] = $this->M_lantai->getLantai();

		$this->form_validation->set_error_delimiters("<div style='color:red;'>","</div>");
		$this->form_validation->set_rules('level', 'Level', 'trim|required',array('trim'=>'','required'=>'{field} harus dipilih.'));
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required',array('trim'=>'','required'=>'Kolom {field} harus diisi.'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tb_user.email]',array('trim'=>'','required'=>'Kolom {field} harus diisi.', 'valid_email'=>'{field} tidak valid.', 'is_unique'=>'{field} telah terdaftar.'));
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|required',array('trim'=>'','required'=>'Kolom {field} harus diisi.','min_length'=>'Kolom {field} minimal {param} karakter.'));
		$this->form_validation->set_rules('conf_password', 'Konfirmasi Password', 'trim|required|matches[password]',array('trim'=>'','required'=>'Kolom {field} harus diisi.','matches'=>'{field} harus sama dengan Password.'));
		$this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'trim|required|is_natural|max_length[20]',array('trim'=>'','required'=>'Kolom {field} harus diisi.','is_natural'=>'Kolom {field} harus berisi angka.','max_length'=>'{field} maksimal {param} karakter.'));
		// $this->form_validation->set_rules('id_unit', 'Unit', 'trim|required',array('trim'=>'','required'=>'Unit harus dipilih.'));
		// $this->form_validation->set_rules('id_lantai', 'Lokasi', 'trim|required',array('trim'=>'','required'=>'Lokasi harus dipilih.'));

		$this->data['level'] = $this->input->post('level',TRUE);
		$this->data['nama'] = $this->input->post('nama',TRUE);
		$this->data['email'] = $this->input->post('email',TRUE);
		$this->data['password'] = $this->input->post('password',TRUE);
		$this->data['conf_password'] = $this->input->post('conf_password',TRUE);
		$this->data['no_hp'] = $this->input->post('no_hp',TRUE);
		$this->data['id_unit'] = $this->input->post('id_unit',TRUE);
		$this->data['id_lantai'] = $this->input->post('id_lantai',TRUE);

		// die(var_dump($this->input->post()));
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('form_user',$this->data);
		}else{
			$data_user = array(
					'nama' => $this->data['nama'],
					'email' => $this->data['email'],
					'password' => $this->data['password'],
					'no_hp' => $this->data['no_hp'],
					'id_unit' => $this->data['id_unit'],
					'id_lantai' => $this->data['id_lantai'],
					'level'=> $this->data['level']
					);
			$this->M_user->setUser($data_user);
			echo "<script>
				alert('Data User berhasil ditambahkan.');
				document.location='".site_url('masteruser/')."';

			</script>";

			// redirect('auth/index','refresh');
		}
	}

	public function edit($id)
	{
		$this->data['id_unit'] = $id;
		$this->data['dataunit'] = $this->M_unit->getIDUnit($id);
		
		$this->load->view('form_unit',$this->data);

		$this->session->set_userdata('referred_from', current_url());
	}

	public function hapus($id)
	{
		$this->M_unit->deleteUnit($id);
		echo "<script>alert('Data Unit telah terhapus');</script>";

		redirect('masterunit','refresh');
	}
}

/* End of file KategoriBarang.php */
/* Location: ./application/controllers/KategoriBarang.php */