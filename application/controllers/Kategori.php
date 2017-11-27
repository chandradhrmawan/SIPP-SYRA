<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	var $CI;
	function __construct(){
		parent::__construct();	
		$this->CI =& get_instance();
		$this->load->model("KategoriModel");
		$this->login_user->cek_login();
	}

	public function index(){
		$data = array('title' 	=> 'Halaman Dashboard - SIPP Syra',
			'head'	=> 'Master Data Kategori',
			'isi' 	=> 'administrator/Kategori/index',
			'bread' => 'Master Kategori'
		);
		$this->load->view('layout/wrapper', $data);
	}

	public function list_data(){
		$list = $this->KategoriModel->get_datatables();
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $regulasi) {


			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $regulasi->nama_kategori;
			$row[] = '<center><a  href="#" title="Edit" onclick="edit_Kategori('."'".$regulasi->id_kategori."'".')" ><i class="fa fa-pencil"></i> Edit</a>|
			<a  href="'.base_url().'Kategori/delete_Kategori/'.$regulasi->id_kategori.'" title="Delete" ><i class="fa fa-trash"></i> Delete</a></center>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->KategoriModel->count_all(),
			"recordsFiltered" => $this->KategoriModel->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_add()	
	{
		if ($this->input->post('nama_kategori') == '') {
			echo "error";
		} else {
			//$id = $this->UsersModel->cek_max_id();
			
			$data = array(
				'id_kategori'	=> '',
				'nama_kategori' 	=> $this->input->post('nama_kategori')
			);
			$insert = $this->KategoriModel->save($data);
			echo json_encode(array("status" => TRUE));
		}
	}

	function ajax_get_Kategori_by_id($id)
	{
		$data = $this->KategoriModel->get_by_id($id);
		echo json_encode($data);
	}

	function delete_kategori(){
		$id_kategori = $this->uri->segment(3);
		$this->KategoriModel->delete($id_kategori);
		$this->session->set_flashdata('delete_sukses','Data Telah Berhasil Dihapus');
		redirect('Kategori');		
	}

	public function ajax_update()
	{
		$data = array(
			'nama_kategori' 				=> $this->input->post('nama_kategori')
		);
		$this->KategoriModel->update(array('id_kategori' => $this->input->post('id_kategori')), $data);
		echo json_encode(array("status" => TRUE));
	}
}
