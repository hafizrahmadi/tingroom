<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Masterjadwal extends CI_Controller {

	public $data = null;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Redirect');
		$this->load->model('M_jadwal','',true);
		$this->load->model('M_gedung','',true);
		$this->load->model('M_lantai','',true);
		$this->load->model('M_ruangan','',true);
		$this->redirect->backToCurrentUser();		
		$this->redirect->backToLogin();

		$sesi = $this->session->userdata('logged_in');
		$this->data = array(
				'session' => $sesi,
				'masterjdwl' => 'active'
			);
	}

	public function index()
	{
		
		$this->data['jadwal']=$this->M_jadwal->getJadwal();				
		// die(var_dump($this->data));
		$this->load->view('view_master_jadwal',$this->data);

		// var_dump($data);
		$this->session->set_userdata('referred_from', current_url());
	}

	public function tambah()
	{
		$this->data['gedung']=$this->M_gedung->getGedung();

		$this->load->view('form_jadwal',$this->data);

		$this->session->set_userdata('referred_from', current_url());
	}

	public function getRuangan(){
		$id_lantai = $this->input->post('id_lantai');
		$ruangan = $this->M_ruangan->getRuanganinLantai($id_lantai);
		echo json_encode($ruangan);
	}
	public function prosesform($id=null){

		$this->data['id_gedung'] = $this->input->post('id_gedung',true);
		$this->data['id_lantai'] = $this->input->post('id_lantai',true);
		$this->data['id_ruangan'] = $this->input->post('id_ruangan',true);
		
		
		$this->form_validation->set_error_delimiters('<div class="text-red">','</div>');
		
		$this->form_validation->set_rules('id_gedung', 'Gedung', 'required'
			,array('required'=>'Gedung harus dipilih.'));
		$this->form_validation->set_rules('id_lantai', 'Lantai', 'required'
			,array('required'=>'Lantai harus dipilih.'));
		$this->form_validation->set_rules('id_ruangan', 'Ruangan', 'required'
			,array('required'=>'Ruangan harus dipilih.'));

		$this->form_validation->set_rules('jam_awal','Jam Awal','required|callback_cek_jam_awal[$id_ruang]',array('required'=>'Jam Awal harus dipilih.'));
		$this->form_validation->set_rules('jam_akhir','Jam Akhir','required|callback_cek_jam_akhir[$id_ruang,jam_awal]',array('required'=>'Jam Akhir harus dipilih.'));

		$this->data['jam_awal'] = $this->input->post('jam_awal',true);
		$this->data['jam_akhir'] = $this->input->post('jam_akhir',true);

		$this->data['id_jadwal'] = $id;
		// die(var_dump($this->data));
		if ($this->form_validation->run() == FALSE) {
			if ($id!=null) {
				
				$this->data['datajadwal'] = $this->M_jadwal->getIDJadwal($id);
			}
			$this->data['gedung'] = $this->M_gedung->getGedung();
			$this->load->view('form_jadwal',$this->data);
		} else {
			
			if ($id==null) {
				$data = array(
					'id_ruangan' => $this->data['id_ruangan'],
					'jam_awal' => $this->data['jam_awal'],
					'jam_akhir' => $this->data['jam_akhir'],
					);
				$this->M_jadwal->setJadwal($data);

				echo "<script>alert('Data Jadwal baru telah ditambahkan');</script>";

				redirect('masterjadwal','refresh');
			}else{
				$data = array(
					'id_ruangan' => $this->data['id_ruangan'],
					'jam_awal' => $this->data['jam_awal'],
					'jam_akhir' => $this->data['jam_akhir'],
					'id_jadwal' => $id
					);
				$this->M_jadwal->setJadwal($data);
				echo "<script>alert('Data Gedung telah diperbaharui');</script>";

				redirect('masterjadwal','refresh');
			}
		}
	}

	public function cek_jam_awal($str){
		$id_ruang = $this->data['id_ruangan'];
		$id_jadwal = isset($this->data['id_jadwal'])?$this->data['id_jadwal']:null;
		if ($this->M_jadwal->cekJamAwal($str,$id_ruang,$id_jadwal)) {		
			return true;
		}else{
			$this->form_validation->set_message('cek_jam_awal', 'Jam Awal yang diinputkan telah ada');
			return false;
		}
	}

	public function cek_jam_akhir($str){
		$id_ruang = $this->data['id_ruangan'];
		$jam_awal = $this->data['jam_awal'];
		$id_jadwal = isset($this->data['id_jadwal'])?$this->data['id_jadwal']:null;
		if (!$this->M_jadwal->cekJamAkhir($str,$id_ruang,$id_jadwal)) {
			$this->form_validation->set_message('cek_jam_akhir', 'Jam Akhir yang diinputkan telah ada');
			return false;
		}else if ($str==$jam_awal) {
			$this->form_validation->set_message('cek_jam_akhir', 'Jam Akhir dan Jam Awal harus berbeda');
			return false;
		}else{
			return true;
		}
	}

	public function edit($id)
	{
		$this->data['id_jadwal'] = $id;
		$this->data['datajadwal'] = $this->M_jadwal->getIDJadwal($id);
		$this->data['gedung'] = $this->M_gedung->getGedung();
		// die(var_dump($this->data));
		$this->load->view('form_jadwal',$this->data);

		$this->session->set_userdata('referred_from', current_url());
	}

	public function hapus($id)
	{
		$this->M_jadwal->deleteJadwal($id);
		echo "<script>alert('Data Jadwal telah terhapus');</script>";

		redirect('masterjadwal','refresh');
	}
}

/* End of file KategoriBarang.php */
/* Location: ./application/controllers/KategoriBarang.php */