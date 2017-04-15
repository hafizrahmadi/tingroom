<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Masterlantai extends CI_Controller {

	public $data = null;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Redirect');
		$this->load->model('M_lantai','',true);
		$this->redirect->backToCurrentUser();		
		$this->redirect->backToLogin();

		$sesi = $this->session->userdata('logged_in');
		$this->data = array(
				'session' => $sesi,
				'masterruang' => 'active',
				'actlantai' => 'active'
			);
	}

	public function index()
	{
		
		$this->data['lantai']=$this->M_lantai->getGedung();				
		// die(var_dump($this->data));
		$this->load->view('view_master_lantai',$this->data);

		// var_dump($data);
		$this->session->set_userdata('referred_from', current_url());
	}

	public function tambah()
	{
		$this->load->view('form_lantai',$this->data);

		$this->session->set_userdata('referred_from', current_url());
	}

	public function prosesform($id=null){
		
		$this->form_validation->set_error_delimiters('<div class="text-red">','</div>');
		$this->form_validation->set_rules('nama_lantai', 'Nama Lantai', 'trim|required|max_length[255]'
			,array('trim'=>'','required'=>'Kolom {field} harus diisi.','max_length'=> 'Kolom %s maksimal 255 karakter'));
		
		if ($this->form_validation->run() == FALSE) {
			if ($id!=null) {
				$this->data['id_lantai'] = $id;
			}
			$this->load->view('form_lantai',$this->data);
		} else {
			$nama_lantai = $this->input->post('nama_lantai',true);
			if ($id==null) {
				$data = array(
					'nama_lantai' => $nama_lantai
					);
				$this->M_lantai->setLantai($data);
				echo "<script>alert('Data Lantai baru telah ditambahkan');</script>";

				redirect('masterlantai','refresh');
			}else{
				$data = array(
						'id_lantai' => $id,
						'nama_lantai' => $nama_gedung
					);
				$this->M_lantai->setLantai($data);
				echo "<script>alert('Data Lantai telah diperbaharui');</script>";

				redirect('masterlantai','refresh');
			}
		}
	}

	public function edit($id)
	{
		$this->data['id_lantai'] = $id;
		$this->data['datalantai'] = $this->M_lantai->getIDLantai($id);
		
		$this->load->view('form_lantai',$this->data);

		$this->session->set_userdata('referred_from', current_url());
	}

	public function hapus($id)
	{
		$this->M_lantai->deleteLantai($id);
		echo "<script>alert('Data Lantai telah terhapus');</script>";

		redirect('masterlantai','refresh');
	}
}

/* End of file KategoriBarang.php */
/* Location: ./application/controllers/KategoriBarang.php */