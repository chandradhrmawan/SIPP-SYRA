<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {
	var $CI;
	function __construct(){
		parent::__construct();	
		$this->CI =& get_instance();
		$this->load->model("PenjualanModel");
		$this->login_user->cek_login();
	}

	public function index(){

		$hariini = date('dmy');
		$kodeawal = $this->PenjualanModel->get_kodeawal();
		$kode = substr($kodeawal['id_transaksi'], 2,3);
		$carikode = $this->PenjualanModel->get_carikode($kode);
		
		if(!empty($carikode['high'])){
			$nilaikode = substr($carikode['high'], 1);
			$kode = (int) $nilaikode;
			$kode = $kode + 1;
			$hasilkode = "TR".str_pad($kode, 3, "0", STR_PAD_LEFT).$hariini;
		} else {
			$hasilkode = "TR001".$hariini;
		}

		$data_detail = $this->PenjualanModel->get_detail_penjualan($hasilkode);

		$data = array('title' 	=> 'Halaman Dashboard - SIPP Syra',
			'head'	=> 'Transaksi Penjualan',
			'isi' 	=> 'transaksi/penjualan/index',
			'bread' => 'Transaksi Penjualan',
			'data_barang' => $this->PenjualanModel->get_barang(),
			'hasilkode'	=> $hasilkode,
			'data_detail' => $data_detail
		);
		$this->load->view('layout/wrapper', $data);
	}

	public function insert_penjualan(){

		$id_transaksi = $this->input->post('id_transaksi');
		$stok = $this->input->post('stok');
		$jumlah_beli = $this->input->post('jumlah_beli');
		$id_barang = $this->input->post('id_barang');
		$harga_jual = $this->input->post('harga_jual');
		$sub_total = $harga_jual * $jumlah_beli;
		$nama_pelanggan = $this->input->post("nama_pelanggan");
		$alamat_pelanggan = $this->input->post("alamat_pelanggan");

		
		if(empty($nama_pelanggan) OR empty($alamat_pelanggan)){
			$this->session->set_flashdata('insert_gagal','Nama / Alamat Pelanggan Belum Di Isi');
			redirect('Penjualan');
		}

		if($sub_total==0){
			$this->session->set_flashdata('insert_gagal','Sub Total Belum Terisi');
			redirect('Penjualan');
		}
		
		if($id_barang==0){
			$this->session->set_flashdata('insert_gagal','Belum Pilih Barang');
			redirect('Penjualan');
		}

		if($jumlah_beli > $stok){
			$this->session->set_flashdata('insert_gagal','Jumlah Beli Melebihi Stok');
			redirect('Penjualan');
		}

		$data_detail = array(
			'id_detail'			=> '',
			'id_transaksi' 		=> $id_transaksi,
			'id_barang'			=> $id_barang,
			'jumlah_beli'		=> $jumlah_beli,
			'sub_total'			=> $sub_total,
			'nama_pelanggan'	=> $this->input->post('nama_pelanggan'),
			'alamat_pelanggan'	=> $this->input->post('alamat_pelanggan')
		);

		//cek isi
		$cek_isi = $this->PenjualanModel->cek_isi($id_barang,$jumlah_beli);

		if($cek_isi > 0){
			$insert_detail = $this->PenjualanModel->update_penjualan_detail($id_barang,$jumlah_beli,$sub_total,$id_transaksi);
		}else{
			$insert_detail = $this->PenjualanModel->insert_penjualan_detail($data_detail);
		}
		

		$kurang_stok = $this->PenjualanModel->kurang_stok($jumlah_beli,$id_barang);

		if($insert_detail AND $kurang_stok == TRUE){
			$data_detail = $this->PenjualanModel->get_detail_penjualan($id_transaksi);
			//PESAN SUKSES
			$this->session->set_flashdata('insert_sukses','Barang Berhasil Ditambahkan');
			redirect('Penjualan');
		}else{
			//PESAN GAGAL
			$this->session->set_flashdata('insert_gagal','Barang Gagal Ditambahkan');
			redirect('Penjualan');
		}

	}

	public function insert_penjualan_final(){
		$id_transaksi = $this->input->post('id_transaksi');

		$nama_pelanggan = $this->input->post('nama_pelanggan');
		$alamat_pelanggan = $this->input->post("alamat_pelanggan");
		
		if(empty($nama_pelanggan) OR empty($alamat_pelanggan)){
			$this->session->set_flashdata('insert_gagal','Nama / Alamat Pelanggan Belum Di Isi');
			redirect('Penjualan');
		}

		$data_penjualan = array(
			'id_transaksi'		=> $this->input->post('id_transaksi'),
			'tgl_transaksi' 	=> date('Y-m-d H:i:s'),
			'id_user'			=> $this->input->post('id_user'),
			'total_bayar'		=> $this->input->post('total_bayar'),
			'nama_pelanggan'	=> $nama_pelanggan,
			'alamat_pelanggan'	=> $alamat_pelanggan
		);

		$copy_table = $this->PenjualanModel->copy_table($id_transaksi);
		$delete_table = $this->PenjualanModel->delete_temp_table();
		$insert_penjualan = $this->PenjualanModel->insert_penjualan($data_penjualan);

		if($copy_table AND $delete_table AND $insert_penjualan == TRUE){
			$this->session->set_flashdata('pesan','Transaksi Selesai');
			redirect('Penjualan/print_invoice/'.$id_transaksi);
		}else{
			$this->session->set_flashdata('pesan','Transaksi Gagal');
			redirect('Dashboard');
		}
	}

	public function print_invoice(){
		$id_transaksi = $this->uri->segment(3);

		$data = array('title' 	=> 'Halaman Dashboard - SIPP Syra',
			'data_penjualan' => $this->PenjualanModel->get_data_penjualan($id_transaksi)
		);
		$this->load->view('transaksi/penjualan/invoice', $data);
	}

	public function delete_detail(){

		$id_detail   = $this->input->post('id_detail');
		$id_barang   = $this->input->post('id_barang');
		$jumlah_beli = $this->input->post('jumlah_beli');
		$delete = $this->PenjualanModel->delete_detail($id_detail,$id_barang,$jumlah_beli);
		if($delete == TRUE){
			$this->session->set_flashdata('insert_sukses','Barang Berhasil Dihapus');
			redirect('Penjualan');
		}else{
			$this->session->set_flashdata('insert_gagal','Barang Gagal Dihapus');
			redirect('Penjualan');
		}
	}

	public function batal_transaksi(){

		$total_bayar = $this->uri->segment(3);

		if($total_bayar!=0){
			$this->session->set_flashdata('insert_gagal','Hapus Barang Terlebih Dahulu');
			redirect('Penjualan');
		}

		$delete_table = $this->PenjualanModel->delete_temp_table();
		
		if($delete_table == TRUE){
			$this->session->set_flashdata('pesan','Transaksi Dibatalkan');
			redirect('Dashboard');
		}
	}

	public function riwayat_penjualan(){
		$data = array('title' 	=> 'Halaman Dashboard - SIPP Syra',
			'head'	=> 'Riwayat Transaksi Penjualan',
			'isi' 	=> 'transaksi/penjualan/riwayat_penjualan',
			'bread' => 'Riwayat Transaksi Penjualan',
			'data_penjualan' => $this->PenjualanModel->get_riwayat_penjualan()
		);
		$this->load->view('layout/wrapper', $data);
	}

	public function view_detail_penjualan(){

		$id_penjualan = $this->uri->segment(3);		

		$data = array('title' 	=> 'Halaman Dashboard - SIPP Syra',
			'head'	=> 'Detail Transaksi Penjualan',
			'isi' 	=> 'transaksi/penjualan/detail_penjualan',
			'bread' => 'Riwayat Transaksi Penjualan',
			'data_transaksi' => $this->PenjualanModel->get_transaksi($id_penjualan),
			'data_penjualan' => $this->PenjualanModel->get_detail($id_penjualan)
		);
		$this->load->view('layout/wrapper', $data);
	}
}