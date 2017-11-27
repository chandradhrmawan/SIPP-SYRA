<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
	var $CI;
	function __construct(){
		parent::__construct();	
		$this->CI =& get_instance();
		$this->load->model("BarangModel");
        $this->login_user->cek_login();
    }

    public function index(){
      $data = array('title' 	=> 'Halaman Dashboard - SIPP Syra',
       'head'	=> 'Master Data Barang',
       'isi' 	=> 'administrator/Barang/index',
       'bread' => 'Master Barang',
       'get_kategori'  => $this->BarangModel->get_data_kategori(),
       'get_warna'		=> $this->BarangModel->get_data_warna(),
       'get_barang'	=> $this->BarangModel->get_data_barang()
   );
      $this->load->view('layout/wrapper', $data);
  }

  function ajax_get_Barang_by_id($id)
  {
     $data = $this->BarangModel->get_by_id($id);
     echo json_encode($data);
 }

 function delete_barang(){
     $id_barang = $this->uri->segment(3);
     $this->BarangModel->delete($id_barang);
     $this->session->set_flashdata('delete_sukses','Data Telah Berhasil Dihapus');
     redirect('Barang');		
 }

 public function ajax_update()
 {
     $data = array(
      'nama_barang' => $this->input->post('nama_barang'),
      'id_kategori' => $this->input->post('id_kategori'),
      'id_warna'	=> $this->input->post('id_warna'),
      'stok' => $this->input->post('stok'),
      'keterangan' => $this->input->post('keterangan'),
      'harga_jual' => $this->input->post('harga_jual'),
      'harga_beli' => $this->input->post('harga_beli'),
  );
     $this->BarangModel->update(array('id_barang' => $this->input->post('id_barang')), $data);
     echo json_encode(array("status" => TRUE));
 }

 public function tambah_barang(){
     $id_barang = $this->BarangModel->cek_max_id();
     $config['upload_path']          = 'uploads/barang/';
     $config['allowed_types']        = 'gif|jpg|png';
     $config['max_filename'] = '255';
     $config['file_name']	 = $_FILES['direktori']['name'];
        $config['max_size'] = '10024'; //10 MB
        $foto = $_FILES['direktori']['name'];

        if (0 < $_FILES['direktori']['error']) {
        	echo 'Error during file upload' . $_FILES['direktori']['error'];
        } else {
        	if (file_exists('uploads/barang/' . $_FILES['direktori']['name'])) {
        		echo 'File already exists : uploads/barang/' . $_FILES['direktori']['name'];
        	} else {
        		$this->load->library('upload', $config);
        		if (!$this->upload->do_upload('direktori')) {
        			echo $this->upload->display_errors();
        		} else {
                    	//insert data
        			$data = array(
        				'id_barang'	=> $id_barang,
        				'nama_barang' => $this->input->post('nama_barang'),
        				'id_kategori' => $this->input->post('id_kategori'),
        				'id_warna'	=> $this->input->post('id_warna'),
        				'stok' => $this->input->post('stok'),
        				'keterangan' => $this->input->post('keterangan'),
        				'harga_jual' => $this->input->post('harga_jual'),
        				'harga_beli' => $this->input->post('harga_beli'),
        				'direktori' => $foto
        			);
        			$insert = $this->BarangModel->save($data);
        			if($insert){
        				$this->session->set_flashdata('insert_sukses','Data Telah Berhasil Ditambahkan');
        				redirect('barang');
        			}
        		}
        	}
        }
    }
}
