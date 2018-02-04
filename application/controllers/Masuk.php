<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {
	var $CI;
	function __construct(){
		parent::__construct();	
		$this->CI =& get_instance();
		$this->load->model("MasukModel");
		$this->login_user->cek_login();
	}

	public function index(){

		$hariini = date('dmy');
		$kodeawal = $this->MasukModel->get_kodeawal();
		$kode = substr($kodeawal['id_masuk'], 2,3);
		$carikode = $this->MasukModel->get_carikode($kode);
		
		if(!empty($carikode['high'])){
			$nilaikode = substr($carikode['high'], 1);
			$kode = (int) $nilaikode;
			$kode = $kode + 1;
			$hasilkode = "MS".str_pad($kode, 3, "0", STR_PAD_LEFT).$hariini;
		} else {
			$hasilkode = "MS001".$hariini;
		}

		$data_detail = $this->MasukModel->get_detail_masuk($hasilkode);
		$data_suplier = $this->MasukModel->get_data_suplier();

		$data = array('title' 	=> 'Halaman Dashboard - SIPP Syra',
			'head'	=> 'Barang Masuk Manual',
			'isi' 	=> 'transaksi/masuk/index',
			'bread' => 'Barang Masuk Manual',
			'data_barang' => $this->MasukModel->get_barang(),
			'hasilkode'	=> $hasilkode,
			'data_detail' => $data_detail,
			'data_suplier' => $data_suplier
		);
		$this->load->view('layout/wrapper', $data);
	}

	public function insert_masuk(){

		$id_masuk = $this->input->post('id_masuk');
		$jumlah_masuk = $this->input->post('jumlah_masuk');
		$id_barang = $this->input->post('id_barang');
		$harga_beli = $this->input->post('harga_beli');
		$sub_total = 0;
		$sub_total = $harga_beli * $jumlah_masuk;


		if($id_barang==0){
			$this->session->set_flashdata('insert_gagal','Belum Pilih Barang');
			redirect('Masuk');
		}

		$data_detail = array(
			'id_detail'			=> '',
			'id_masuk' 			=> $id_masuk,
			'id_barang'			=> $id_barang,
			'jumlah_masuk'		=> $jumlah_masuk,
			'sub_total'			=> $sub_total,
			'status_barang'		=> '0'
		);
		$insert_detail = $this->MasukModel->insert_masuk_detail($data_detail);

		if($insert_detail == TRUE){
			$this->session->set_flashdata('insert_sukses','Barang Berhasil Ditambahkan');
			redirect('Masuk');
		}else{
			$this->session->set_flashdata('insert_gagal','Barang Gagal Ditambahkan');
			redirect('Masuk');
		}

	}

	public function insert_masuk_final(){
		$id_masuk = $this->input->post('id_masuk');

		$data_masuk = array(
			'id_masuk'			=> $this->input->post('id_masuk'),
			'tgl_masuk' 		=> date('Y-m-d H:i:s'),
			'id_user'			=> $this->input->post('id_user'),
			'total_bayar'		=> $this->input->post('total_bayar'),
			'status'			=> '0'
		);

		$copy_table = $this->MasukModel->copy_table($id_masuk);
		$delete_table = $this->MasukModel->delete_temp_table();
		$insert_masuk = $this->MasukModel->insert_masuk($data_masuk);

		if($copy_table AND $delete_table AND $insert_masuk == TRUE){
			$this->session->set_flashdata('pesan','Transaksi Selesai');
			redirect('Masuk/print_invoice/'.$id_masuk);
		}else{
			$this->session->set_flashdata('pesan','Transaksi Gagal');
			redirect('Dashboard');
		}
	}

	public function delete_detail(){
		$id_detail   = $this->input->post('id_detail');
		$delete = $this->MasukModel->delete_detail($id_detail);
		if($delete == TRUE){
			$this->session->set_flashdata('insert_sukses','Barang Berhasil Dihapus');
			redirect('Masuk');
		}else{
			$this->session->set_flashdata('insert_gagal','Barang Gagal Dihapus');
			redirect('Masuk');
		}
	}

	public function batal_transaksi(){

		$total_bayar = $this->uri->segment(3);

		if($total_bayar!=0){
			$this->session->set_flashdata('insert_gagal','Hapus Barang Terlebih Dahulu');
			redirect('Masuk');
		}

		$delete_table = $this->MasukModel->delete_temp_table();
		
		if($delete_table == TRUE){
			$this->session->set_flashdata('pesan','Transaksi Dibatalkan');
			redirect('Dashboard');
		}
	}

	public function print_invoice(){
		$id_masuk = $this->uri->segment(3);

		$data = array('title' 	=> 'Halaman Dashboard - SIPP Syra',
			'data_penjualan' => $this->MasukModel->get_data_masuk($id_masuk)
		);
		$this->load->view('transaksi/masuk/invoice', $data);
	}

	public function riwayat_masuk(){
		$data = array('title' 	=> 'Halaman Dashboard - SIPP Syra',
			'head'	=> 'Riwayat Masuk',
			'isi' 	=> 'transaksi/masuk/riwayat_masuk',
			'bread' => 'Riwayat Masuk',
			'data_masuk' => $this->MasukModel->get_riwayat_masuk()
		);
		$this->load->view('layout/wrapper', $data);
	}

	public function view_detail_masuk(){

		$id_masuk = $this->uri->segment(3);		

		$data = array('title' 	=> 'Halaman Dashboard - SIPP Syra',
			'head'	=> 'Detail Transaksi Masuk',
			'isi' 	=> 'transaksi/masuk/detail_masuk',
			'bread' => 'Riwayat Transaksi Masuk',
			'data_masuk' => $this->MasukModel->get_masuk($id_masuk),
			'data_detail_masuk' => $this->MasukModel->get_detail($id_masuk)
		);
		$this->load->view('layout/wrapper', $data);
	}

}