<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	var $CI;
	function __construct(){
		parent::__construct();	
		$this->CI =& get_instance();
		$this->load->model("LaporanModel");
		$this->login_user->cek_login();
		//$this->load->library('m_pdf');
		//$this->m_pdf->pdf->WriteHTML($html);
		//$this->m_pdf->pdf->Output($pdfFilePath, "D");
	}

	public function index(){

		$data = array('title' 	=> 'Halaman Dashboard - SIPP Syra',
			'head'	=> 'Laporan',
			'isi' 	=> 'laporan/index',
			'bread' => 'Laporan',
		);
		$this->load->view('layout/wrapper', $data);
	}

	public function laporan_penjualan(){

		$dari   = $this->input->post('dari');
		$sampai = $this->input->post('sampai');

		$data = array('title' 	=> 'Halaman Dashboard - SIPP Syra',
			'head'	=> 'Laporan Penjualan',
			'isi' 	=> 'laporan/laporan_penjualan',
			'bread' => 'Laporan / Laporan Penjualan',
			'hasil_query' => $this->LaporanModel->get_penjualan($dari,$sampai)
		);
		
		$this->load->view('laporan/laporan_penjualan',$data);
	
	}

	public function laporan_pemesanan(){

		$dari   = $this->input->post('dari');
		$sampai = $this->input->post('sampai');

		$data = array('title' 	=> 'Halaman Dashboard - SIPP Syra',
			'head'	=> 'Laporan Pemesanasn',
			'isi' 	=> 'laporan/laporan_pemesanan',
			'bread' => 'Laporan / Laporan Pemesanan',
			'hasil_query' => $this->LaporanModel->get_pemesanan($dari,$sampai)
		);

		$this->load->view('laporan/laporan_pemesanan',$data);
	
	}

	public function laporan_penerimaan(){

		$dari   = $this->input->post('dari');
		$sampai = $this->input->post('sampai');

		$data = array('title' 	=> 'Halaman Dashboard - SIPP Syra',
			'head'	=> 'Laporan Penerimaan',
			'isi' 	=> 'laporan/laporan_penerimaan',
			'bread' => 'Laporan / Laporan Penerimaan',
			'hasil_query' => $this->LaporanModel->get_penerimaan($dari,$sampai)
		);

		$this->load->view('laporan/laporan_penerimaan',$data);
	
	}
}