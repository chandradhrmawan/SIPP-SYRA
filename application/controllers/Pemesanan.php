<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {
	var $CI;
	function __construct(){
		parent::__construct();	
		$this->CI =& get_instance();
		$this->load->model("PemesananModel");
		$this->login_user->cek_login();
	}

	public function index(){

		$hariini = date('dmy');
		$kodeawal = $this->PemesananModel->get_kodeawal();
		$kode = substr($kodeawal['id_pemesanan'], 2,3);
		$carikode = $this->PemesananModel->get_carikode($kode);
		
		if(!empty($carikode['high'])){
			$nilaikode = substr($carikode['high'], 1);
			$kode = (int) $nilaikode;
			$kode = $kode + 1;
			$hasilkode = "PN".str_pad($kode, 3, "0", STR_PAD_LEFT).$hariini;
		} else {
			$hasilkode = "PN001".$hariini;
		}

		$data_detail = $this->PemesananModel->get_detail_pemesanan($hasilkode);

		$data = array('title' 	=> 'Halaman Dashboard - SIPP Syra',
			'head'	=> 'Pemesanan',
			'isi' 	=> 'transaksi/pemesanan/index',
			'bread' => 'Pemesanan',
			'data_barang' => $this->PemesananModel->get_barang(),
			'hasilkode'	=> $hasilkode,
			'data_detail' => $data_detail
		);
		$this->load->view('layout/wrapper', $data);
	}

	public function insert_pemesanan(){

		$id_pemesanan = $this->input->post('id_pemesanan');
		
		$jumlah_pesan = $this->input->post('jumlah_pesan');
		$id_barang = $this->input->post('id_barang');

		if($id_barang==0){
			$this->session->set_flashdata('insert_gagal','Belum Pilih Barang');
			redirect('Pemesanan');
		}

		$data_detail = array(
			'id_detail'			=> '',
			'id_pemesanan' 		=> $id_pemesanan,
			'id_barang'			=> $id_barang,
			'jumlah_pesan'		=> $jumlah_pesan,
			'sub_total'			=> $this->input->post('sub_total')
		);
		$insert_detail = $this->PemesananModel->insert_pemesanan_detail($data_detail);

		if($insert_detail == TRUE){
			$data_detail = $this->PemesananModel->get_detail_pemesanan($id_pemesanan);
			//PESAN SUKSES
			$this->session->set_flashdata('insert_sukses','Barang Berhasil Ditambahkan');
			redirect('Pemesanan');
		}else{
			//PESAN GAGAL
			$this->session->set_flashdata('insert_gagal','Barang Gagal Ditambahkan');
			redirect('Pemesanan');
		}

	}

	public function insert_pemesanan_final(){
		$id_pemesanan = $this->input->post('id_pemesanan');
		$data_pemesanan = array(
			'id_pemesanan'		=> $this->input->post('id_pemesanan'),
			'tgl_pemesanan' 	=> date('Y-m-d H:i:s'),
			'id_user'			=> $this->input->post('id_user'),
			'total_bayar'		=> $this->input->post('total_bayar'),
			'status'			=> '0'
		);

		$copy_table = $this->PemesananModel->copy_table($id_pemesanan);
		$delete_table = $this->PemesananModel->delete_temp_table();
		$insert_pemesanan = $this->PemesananModel->insert_pemesanan($data_pemesanan);

		if($copy_table AND $delete_table AND $insert_pemesanan == TRUE){
			$this->session->set_flashdata('pesan','Transaksi Selesai');
			redirect('Pemesanan/print_invoice/'.$id_pemesanan);
		}else{
			$this->session->set_flashdata('pesan','Transaksi Gagal');
			redirect('Dashboard');
		}
	}

	public function delete_detail(){
		$id_detail   = $this->input->post('id_detail');
		$delete = $this->PemesananModel->delete_detail($id_detail);
		if($delete == TRUE){
			$this->session->set_flashdata('insert_sukses','Barang Berhasil Dihapus');
			redirect('Pemesanan');
		}else{
			$this->session->set_flashdata('insert_gagal','Barang Gagal Dihapus');
			redirect('Pemesanan');
		}
	}

	public function batal_transaksi(){

		$total_bayar = $this->uri->segment(3);

		if($total_bayar!=0){
			$this->session->set_flashdata('insert_gagal','Hapus Barang Terlebih Dahulu');
			redirect('Pemesanan');
		}

		$delete_table = $this->PemesananModel->delete_temp_table();
		
		if($delete_table == TRUE){
			$this->session->set_flashdata('pesan','Transaksi Dibatalkan');
			redirect('Dashboard');
		}
	}

	public function print_invoice(){
		$id_pemesanan = $this->uri->segment(3);

		$data = array('title' 	=> 'Halaman Dashboard - SIPP Syra',
			'data_penjualan' => $this->PemesananModel->get_data_pemesanan($id_pemesanan)
		);
		$this->load->view('transaksi/pemesanan/invoice', $data);
	}

	public function riwayat_pemesanan(){
		$data = array('title' 	=> 'Halaman Dashboard - SIPP Syra',
			'head'	=> 'Riwayat Pemesanan',
			'isi' 	=> 'transaksi/pemesanan/riwayat_pemesanan',
			'bread' => 'Riwayat Penjualan',
			'data_pemesanan' => $this->PemesananModel->get_riwayat_pemesanan()
		);
		$this->load->view('layout/wrapper', $data);
	}

}