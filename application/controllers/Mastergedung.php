<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mastergedung extends CI_Controller {

	public $data = null;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Redirect');
		$this->load->model('M_gedung','',true);
		$this->redirect->backToCurrentUser();		
		$this->redirect->backToLogin();

		$sesi = $this->session->userdata('logged_in');
		$this->data = array(
				'session' => $sesi,
				'masterruang' => 'active',
				'actgedung' => 'active'
			);
	}

	public function index()
	{
		
		$this->data['gedung']=$this->M_gedung->getGedung();				
		// die(var_dump($this->data));
		$this->load->view('view_master_gedung',$this->data);

		// var_dump($data);
		$this->session->set_userdata('referred_from', current_url());
	}

	public function tambah()
	{
		$this->load->view('form_gedung',$this->data);

		$this->session->set_userdata('referred_from', current_url());
	}

	public function prosesform($id=null){
		
		$this->form_validation->set_error_delimiters('<div class="text-red">','</div>');
		$this->form_validation->set_rules('nama_gedung', 'Nama Gedung', 'trim|required|max_length[255]'
			,array('trim'=>'','required'=>'Kolom {field} harus diisi.','max_length'=> 'Kolom %s maksimal 255 karakter'));
		
		if ($this->form_validation->run() == FALSE) {
			if ($id!=null) {
				$this->data['id_gedung'] = $id;
			}
			$this->load->view('form_gedung',$this->data);
		} else {
			$nama_gedung = $this->input->post('nama_gedung',true);
			if ($id==null) {
				$data = array(
					'nama_gedung' => $nama_gedung
					);
				$this->M_gedung->setGedung($data);
				echo "<script>alert('Data Gedung baru telah ditambahkan');</script>";

				redirect('mastergedung','refresh');
			}else{
				$data = array(
						'id_gedung' => $id,
						'nama_gedung' => $nama_gedung
					);
				$this->M_gedung->setGedung($data);
				echo "<script>alert('Data Gedung telah diperbaharui');</script>";

				redirect('mastergedung','refresh');
			}
		}
	}

	public function edit($id)
	{
		$this->data['id_gedung'] = $id;
		$this->data['datagedung'] = $this->M_gedung->getIDGedung($id);
		
		$this->load->view('form_gedung',$this->data);

		$this->session->set_userdata('referred_from', current_url());
	}

	public function hapus($id)
	{
		$this->M_gedung->deleteGedung($id);
		echo "<script>alert('Data Gedung telah terhapus');</script>";

		redirect('mastergedung','refresh');
	}
}

/* End of file KategoriBarang.php */
/* Location: ./application/controllers/KategoriBarang.php */