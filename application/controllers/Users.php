<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	var $CI;
	function __construct(){
		parent::__construct();	
		$this->CI =& get_instance();
		$this->load->model("UsersModel");
		$this->login_user->cek_login();
	}

	public function index(){
		$data = array('title' 	=> 'Halaman Dashboard - SIPP Syra',
						'head'	=> 'Master Data Users',
						'isi' 	=> 'administrator/users/index',
						'bread' => 'Master Users',
						'get_level' => $this->UsersModel->get_level()
		);
		$this->load->view('layout/wrapper', $data);
	}

	public function list_data(){
		$list = $this->UsersModel->get_datatables();
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $regulasi) {

			if($regulasi->status=='1'){
				$status = '<span class="label label-success">Aktif</span>';
			}else{
				$status = '<span class="label label-danger">Tidak Aktif</span>';
			}

			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $regulasi->username;
			$row[] = $regulasi->password;
			$row[] = $regulasi->nama_lengkap;
			$row[] = $regulasi->nama_level;
			$row[] = $status;
			$row[] = '<center><a  href="#" title="Edit" onclick="edit_Users('."'".$regulasi->id_user."'".')" ><i class="fa fa-pencil"></i> Edit</a>|
							  <a  href="'.base_url().'Users/delete_users/'.$regulasi->id_user.'" title="Delete" ><i class="fa fa-trash"></i> Delete</a></center>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->UsersModel->count_all(),
			"recordsFiltered" => $this->UsersModel->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_add()	
	{
		if ($this->input->post('username') == '') {
			echo "error";
		} else {
			//$id = $this->UsersModel->cek_max_id();
			$password1 = $this->input->post('password1');
			$password2 = $this->input->post('password2');

			$data = array(
				'id_user'	=> '',
				'username' 	=> $this->input->post('username'),
				'password'	=> md5($this->input->post('password')),
				'nama_lengkap' 	=> $this->input->post('nama_lengkap'),
				'id_level' 		=> $this->input->post('id_level'),
				'status'		=> $this->input->post('status')
			);
			$insert = $this->UsersModel->save($data);
			echo json_encode(array("status" => TRUE));
		}
	}

	function ajax_get_Users_by_id($id)
	{
		$data = $this->UsersModel->get_by_id($id);
		echo json_encode($data);
	}

	function delete_users(){
		$id_user = $this->uri->segment(3);
		$this->UsersModel->delete($id_user);
		$this->session->set_flashdata('delete_sukses','Data Telah Berhasil Dihapus');
		redirect('users');		

	}

	public function ajax_update()
	{
		if(empty($this->input->post('password'))){
				$data = array(
				'username' 				=> $this->input->post('username'),
				'nama_lengkap'	  	  	=> $this->input->post('nama_lengkap'),
				'id_level'				=> $this->input->post('id_level'),
				'status'				=> $this->input->post('status')
				);
		}else{
			$data = array(
			'username' 				=> $this->input->post('username'),
			'password' 				=> md5($this->input->post('password')),
			'nama_lengkap'	  	  	=> $this->input->post('nama_lengkap'),
			'id_level'				=> $this->input->post('id_level'),
			'status'				=> $this->input->post('status')
		);
		}
		
		$this->UsersModel->update(array('id_user' => $this->input->post('id_user')), $data);
		echo json_encode(array("status" => TRUE));
	}
}
