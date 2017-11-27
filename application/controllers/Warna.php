<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warna extends CI_Controller {
	var $CI;
	function __construct(){
		parent::__construct();	
		$this->CI =& get_instance();
		$this->load->model("WarnaModel");
		$this->login_user->cek_login();
	}

	public function index(){
		$data = array('title' 	=> 'Halaman Dashboard - SIPP Syra',
			'head'	=> 'Master Data Warna',
			'isi' 	=> 'administrator/Warna/index',
			'bread' => 'Master Warna'
		);
		$this->load->view('layout/wrapper', $data);
	}

	public function list_data(){
		$list = $this->WarnaModel->get_datatables();
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $regulasi) {


			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $regulasi->nama_warna;
			$row[] = '<center><a  href="#" title="Edit" onclick="edit_Warna('."'".$regulasi->id_warna."'".')" ><i class="fa fa-pencil"></i> Edit</a>|
			<a  href="'.base_url().'Warna/delete_warna/'.$regulasi->id_warna.'" title="Delete" ><i class="fa fa-trash"></i> Delete</a></center>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->WarnaModel->count_all(),
			"recordsFiltered" => $this->WarnaModel->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_add()	
	{
		if ($this->input->post('nama_warna') == '') {
			echo "error";
		} else {
			//$id = $this->UsersModel->cek_max_id();
			
			$data = array(
				'id_warna'	=> '',
				'nama_warna' 	=> $this->input->post('nama_warna')
			);
			$insert = $this->WarnaModel->save($data);
			echo json_encode(array("status" => TRUE));
		}
	}

	function ajax_get_Warna_by_id($id)
	{
		$data = $this->WarnaModel->get_by_id($id);
		echo json_encode($data);
	}

	function delete_warna(){
		$id_warna = $this->uri->segment(3);
		$this->WarnaModel->delete($id_warna);
		$this->session->set_flashdata('delete_sukses','Data Telah Berhasil Dihapus');
		redirect('Warna');		
	}

	public function ajax_update()
	{
		$data = array(
			'nama_warna' 				=> $this->input->post('nama_warna')
		);
		$this->WarnaModel->update(array('id_warna' => $this->input->post('id_warna')), $data);
		echo json_encode(array("status" => TRUE));
	}
}
