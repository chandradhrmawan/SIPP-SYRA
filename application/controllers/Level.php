<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Controller {
	var $CI;
	function __construct(){
		parent::__construct();	
		$this->CI =& get_instance();
		$this->load->model("LevelModel");
		$this->login_user->cek_login();
	}

	public function index(){
		$data = array('title' 	=> 'Halaman Dashboard - SIPP Syra',
						'head'	=> 'Master Data Level',
						'isi' 	=> 'administrator/Level/index',
						'bread' => 'Master Level'
		);
		$this->load->view('layout/wrapper', $data);
	}

	public function list_data(){
		$list = $this->LevelModel->get_datatables();
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $regulasi) {


			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $regulasi->nama_level;
			$row[] = '<center><a  href="#" title="Edit" onclick="edit_Level('."'".$regulasi->id_level."'".')" ><i class="fa fa-pencil"></i> Edit</a>|
							  <a  href="'.base_url().'Level/delete_Level/'.$regulasi->id_level.'" title="Delete" ><i class="fa fa-trash"></i> Delete</a></center>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->LevelModel->count_all(),
			"recordsFiltered" => $this->LevelModel->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_add()	
	{
		if ($this->input->post('nama_level') == '') {
			echo "error";
		} else {
			//$id = $this->UsersModel->cek_max_id();
			
			$data = array(
				'id_level'	=> '',
				'nama_level' 	=> $this->input->post('nama_level')
			);
			$insert = $this->LevelModel->save($data);
			echo json_encode(array("status" => TRUE));
		}
	}

	function ajax_get_Level_by_id($id)
	{
		$data = $this->LevelModel->get_by_id($id);
		echo json_encode($data);
	}

	function delete_Level(){
		$id_level = $this->uri->segment(3);
		$this->LevelModel->delete($id_level);
		$this->session->set_flashdata('delete_sukses','Data Telah Berhasil Dihapus');
		redirect('Level');		

	}

	public function ajax_update()
	{
		$data = array(
			'nama_level' 				=> $this->input->post('nama_level')
		);
		$this->LevelModel->update(array('id_level' => $this->input->post('id_level')), $data);
		echo json_encode(array("status" => TRUE));
	}
}
