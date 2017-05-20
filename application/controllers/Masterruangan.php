<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Masterruangan extends CI_Controller {

	public $data = null;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Redirect');
		$this->load->model('M_ruangan','',true);
		$this->load->model('M_lantai','',true);
		$this->load->model('M_gedung','',true);
		$this->redirect->backToCurrentUser();		
		$this->redirect->backToLogin();

		$sesi = $this->session->userdata('logged_in');
		$this->data = array(
				'session' => $sesi,
				'masterruang' => 'active',
				'actruangan' => 'active'
			);
	}

	public function index()
	{
		
		$this->data['ruangan']=$this->M_ruangan->getRuangan();				
		// die(var_dump($this->data));
		$this->load->view('view_master_ruangan',$this->data);

		// var_dump($data);
		$this->session->set_userdata('referred_from', current_url());
	}

	public function tambah()
	{
		$this->data['gedung'] = $this->M_gedung->getGedung();
		
		$this->load->view('form_ruangan',$this->data);

		$this->session->set_userdata('referred_from', current_url());
	}

	public function getLantai(){
		$id_gedung = $this->input->post('id_gedung');
		$lantai = $this->M_lantai->getLantaiinGedung($id_gedung);
		echo json_encode($lantai);
	}

	public function prosesform($id=null){
		
		$this->form_validation->set_error_delimiters('<div class="text-red">','</div>');
		$this->form_validation->set_rules('nama_ruangan', 'Nama Ruangan', 'trim|required|max_length[255]'
			,array('trim'=>'','required'=>'Kolom {field} harus diisi.','max_length'=> 'Kolom %s maksimal 255 karakter'));
		$this->form_validation->set_rules('id_gedung', 'Gedung', 'required'
			,array('required'=>'Gedung harus dipilih.'));
		$this->form_validation->set_rules('id_lantai', 'Lantai', 'required'
			,array('required'=>'Lantai harus dipilih.'));
		$this->form_validation->set_rules('proyektor', 'Ketersedian Proyektor', 'required'
			,array('required'=>'{field} harus dipilih.'));
		$this->form_validation->set_rules('board', 'Jumlah Board', 'trim|required|is_natural'
			,array('trim'=>'','required'=>'Kolom {field} harus diisi.','is_natural'=> 'Kolom {field} harus berisi angka.'));
		$this->form_validation->set_rules('kapasitas', 'Jumlah Kapasitas', 'trim|required|is_natural'
			,array('trim'=>'','required'=>'Kolom {field} harus diisi.','is_natural'=> 'Kolom {field} harus berisi angka.'));

		$this->data['nama_ruangan'] = $this->input->post('nama_ruangan',true);
		$this->data['id_gedung'] = $this->input->post('id_gedung',true);
		$this->data['id_lantai'] = $this->input->post('id_lantai',true);
		$this->data['board'] = $this->input->post('board',true);
		$this->data['proyektor'] = $this->input->post('proyektor',true);
		$this->data['kapasitas'] = $this->input->post('kapasitas',true);

		// die(var_dump($this->data));
		if ($this->form_validation->run() == FALSE) {
			if ($id!=null) {
				$this->data['id_lantai'] = $id;
				$this->data['datalantai'] = $this->M_lantai->getIDLantai($id);
			}
			$this->data['gedung'] = $this->M_gedung->getGedung();
			$this->load->view('form_ruangan',$this->data);
		} else {
			if ($id==null) {
				$data = array(
					'nama_ruangan' => $this->data['nama_ruangan'],
					'id_lantai' => $this->data['id_lantai'],
					'board' => $this->data['board'],
					'proyektor' => $this->data['proyektor'],
					'kapasitas' => $this->data['kapasitas']
					);
				$this->M_ruangan->setRuangan($data);
				echo "<script>alert('Data Lantai baru telah ditambahkan');</script>";

				redirect('masterruangan','refresh');
			}else{
				$data = array(
						'id_ruangan' => $id,
						'nama_ruangan' => $this->data['nama_ruangan'],
						'id_lantai' => $this->data['id_lantai'],
						'board' => $this->data['board'],
						'proyektor' => $this->data['proyektor'],
						'kapasitas' => $this->data['kapasitas'],
					);
				$this->M_ruangan->setRuangan($data);
				echo "<script>alert('Data Ruangan telah diperbaharui');</script>";

				redirect('masterruangan','refresh');
			}
		}
	}

	public function edit($id)
	{
		$this->data['id_ruangan'] = $id;
		$this->data['dataruangan'] = $this->M_ruangan->getIDRuangan($id);
		
		// die(var_dump($this->data['dataruangan']));
		$this->load->view('form_ruangan',$this->data);

		$this->session->set_userdata('referred_from', current_url());
	}

	public function hapus($id)
	{
		$this->M_ruangan->deleteRuangan($id);
		echo "<script>alert('Data Ruangan telah terhapus');</script>";

		redirect('masterruangan','refresh');
	}
}

/* End of file KategoriBarang.php */
/* Location: ./application/controllers/KategoriBarang.php */