<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Masteruser extends CI_Controller {

	public $data = null;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Redirect');
		$this->load->model('M_user','',true);
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
		die(var_dump($this->data['user']));
		$this->load->view('view_master_user',$this->data);

		// var_dump($data);		
	}

	public function tambah()
	{
		$this->load->view('form_user',$this->data);

	}

	public function prosesform($id=null){
		
		$this->form_validation->set_error_delimiters('<div class="text-red">','</div>');
		$this->form_validation->set_rules('nama_unit', 'Nama Unit', 'trim|required|max_length[255]'
			,array('trim'=>'','required'=>'Kolom {field} harus diisi.','max_length'=> 'Kolom %s maksimal 255 karakter'));
		
		if ($this->form_validation->run() == FALSE) {
			if ($id!=null) {
				$this->data['id_unit'] = $id;
			}
			$this->load->view('form_unit',$this->data);
		} else {
			$nama_unit = $this->input->post('nama_unit',true);
			if ($id==null) {
				$data = array(
					'nama_unit' => $nama_unit
					);
				$this->M_unit->setUnit($data);
				echo "<script>alert('Data Unit baru telah ditambahkan');</script>";

				redirect('masterunit','refresh');
			}else{
				$data = array(
						'id_unit' => $id,
						'nama_unit' => $nama_unit
					);
				$this->M_unit->setUnit($data);
				echo "<script>alert('Data Unit telah diperbaharui');</script>";

				redirect('masterunit','refresh');
			}
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