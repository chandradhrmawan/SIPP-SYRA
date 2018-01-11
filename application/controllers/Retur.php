<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retur extends CI_Controller {
	var $CI;
	function __construct(){
		parent::__construct();	
		$this->CI =& get_instance();
		$this->load->model("PenerimaanModel");
		$this->load->model("PemesananModel");
		$this->load->model("ReturModel");
		$this->login_user->cek_login();
	}

	public function index(){

		$data = array('title' 	=> 'Halaman Dashboard - SIPP Syra',
			'head'	=> 'Retur',
			'isi' 	=> 'transaksi/Retur/index',
			'bread' => 'Retur',
			'data_barang' => $this->PenerimaanModel->get_barang(),
			'data_pemesanan' => $this->PemesananModel->get_riwayat_pemesanan(),
			'data_retur' => $this->ReturModel->get_riwayat_penerimaan()
		);
		$this->load->view('layout/wrapper', $data);
	}

	public function retur_barang(){
		$id_pemesanan =  $this->uri->segment(3);

		$hariini = date('dmy');
		$kodeawal = $this->ReturModel->get_kodeawal();
		$kode = substr($kodeawal['id_retur'], 2,3);
		$carikode = $this->ReturModel->get_carikode($kode);
		
		if(!empty($carikode['high'])){
			$nilaikode = substr($carikode['high'], 1);
			$kode = (int) $nilaikode;
			$kode = $kode + 1;
			$hasilkode = "RT".str_pad($kode, 3, "0", STR_PAD_LEFT).$hariini;
		} else {
			$hasilkode = "RT001".$hariini;
		}

		$data_detail = $this->ReturModel->get_data_penerimaan($id_pemesanan);

		$data_tmp_retur = $this->ReturModel->get_data_tmp_retur($id_pemesanan);

		/*echo "<pre>";
		echo $id_penerimaan.'<br>';
		print_r($kodeawal).'<br>';
		print_r($carikode).'<br>';
		echo $hasilkode.'<br><br>';
		print_r($data_detail).'<br>';
		echo $id_penerimaan.'<br>';
		echo "</pre>";
		die();*/

		$data = array('title' 	=> 'Halaman Dashboard - SIPP Syra',
			'head'	=> 'Retur',
			'isi' 	=> 'transaksi/Retur/form_retur',
			'bread' => 'Form Retur',
			'data_detail'	=> $data_detail,
			'id_pemesanan'	=> $id_pemesanan,
			'id_retur' => $hasilkode,
			'data_tmp_retur' => $data_tmp_retur
		);
		$this->load->view('layout/wrapper', $data);

	}

	public function insert_penerimaan_final(){
		$id_penerimaan = $this->input->post('id_penerimaan');
		$id_pemesanan = $this->input->post('id_pemesanan');
		$status = $this->input->post('status');

		foreach ($_POST['id_barang'] as $key => $value) {

			$jumlah_pesan = $_POST['jumlah_pesan'][$key];

			$update = $this->db->query("UPDATE m_barang SET stok  = stok + '$jumlah_pesan'
				WHERE id_barang  = '$value'");

		}


		$data_penerimaan = array(
			'id_penerimaan'		=> $this->input->post('id_penerimaan'),
			'id_pemesanan'		=> $this->input->post('id_pemesanan'),
			'tgl_penerimaan' 	=> date('Y-m-d H:i:s'),
			'id_user'			=> $this->input->post('id_user'),
		);


			$update_status = $this->PenerimaanModel->update_status($id_pemesanan); //fail

			$insert_penerimaan = $this->PenerimaanModel->insert_penerimaan($data_penerimaan); //fail

			if($update_status AND $insert_penerimaan == TRUE){
				$this->session->set_flashdata('pesan','Transaksi Selesai');
				redirect('Penerimaan/print_invoice/'.$id_pemesanan);
			}else{
				$this->session->set_flashdata('pesan','Transaksi Gagal');
				redirect('Dashboard');
			}
		}

		public function print_invoice(){
			$id_pemesanan = $this->uri->segment(3);

			$data = array('title' 	=> 'Halaman Dashboard - SIPP Syra',
				'data_penjualan' => $this->PemesananModel->get_data_pemesanan($id_pemesanan),
				'data_penerimaan'	=> $this->PenerimaanModel->get_data_penerimaan($id_pemesanan)
			);
			$this->load->view('transaksi/Penerimaan/invoice', $data);
		}

	}