<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TransaksiPenjualan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Redirect');	
		// $this->load->model('M_Barang');
		$this->load->model('M_Barang','',true);
	}

	public function index()
	{
		$this->redirect->backToLogin();
		$session = $this->session->userdata('logged_in');
		$data = array(
				'data' => $session
			);
		$this->load->view('view_trans_penjualan',$data);
		$this->session->set_userdata('referred_from', current_url());
	}

	public function search_barang()
	{
			$str = $this->input->get('namabarang');
			$list = $this->M_Barang->cari_Barang($str);
			$count_result = 0;
			if ($list) {
				
				foreach ($list as $row) {
					$count_result+=1;

					echo "<a href='#'><span>$row->nama_barang</span></a><br>";
				}
				
			}else{
				echo "<b>Data tidak ditemukan</b>";
			}
	}

	public function edit($id)
	{

	}

	public function hapus($id)
	{

	}
}