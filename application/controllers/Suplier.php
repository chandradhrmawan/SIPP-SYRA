<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suplier extends CI_Controller {
	var $CI;
	function __construct(){
		parent::__construct();	
		$this->CI =& get_instance();
		$this->load->model("SuplierModel");
		$this->login_user->cek_login();
	}

	public function index(){
		$data = array('title' 	=> 'Halaman Dashboard - SIPP Syra',
						'head'	=> 'Master Data Suplier',
						'isi' 	=> 'administrator/Suplier/index',
						'bread' => 'Master Suplier'
		);
		$this->load->view('layout/wrapper', $data);
	}

	public function list_data(){
		$list = $this->SuplierModel->get_datatables();
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $regulasi) {


			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $regulasi->nama_suplier;
			$row[] = '<center><a  href="#" title="Edit" onclick="edit_Suplier('."'".$regulasi->id_suplier."'".')" ><i class="fa fa-pencil"></i> Edit</a>|
							  <a  href="'.base_url().'Suplier/delete_Suplier/'.$regulasi->id_suplier.'" title="Delete" ><i class="fa fa-trash"></i> Delete</a></center>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->SuplierModel->count_all(),
			"recordsFiltered" => $this->SuplierModel->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_add()	
	{
		if ($this->input->post('nama_suplier') == '') {
			echo "error";
		} else {
			//$id = $this->UsersModel->cek_max_id();
			
			$data = array(
				'id_suplier'	=> '',
				'nama_suplier' 	=> $this->input->post('nama_suplier')
			);
			$insert = $this->SuplierModel->save($data);
			echo json_encode(array("status" => TRUE));
		}
	}

	function ajax_get_Suplier_by_id($id)
	{
		$data = $this->SuplierModel->get_by_id($id);
		echo json_encode($data);
	}

	function delete_suplier(){
		$id_suplier = $this->uri->segment(3);
		$this->SuplierModel->delete($id_suplier);
		$this->session->set_flashdata('delete_sukses','Data Telah Berhasil Dihapus');
		redirect('Suplier');		

	}

	public function ajax_update()
	{
		$data = array(
			'nama_suplier' 				=> $this->input->post('nama_suplier')
		);
		$this->SuplierModel->update(array('id_suplier' => $this->input->post('id_suplier')), $data);
		echo json_encode(array("status" => TRUE));
	}
}
