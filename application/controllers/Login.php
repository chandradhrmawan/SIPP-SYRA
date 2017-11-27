<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();	
	}
	
	public function index()
	{
		$this->login_user->cek_is_login();
		// Fungsi login
		$valid = $this->form_validation;
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$valid->set_rules('username','Username','required|trim');
		$valid->set_rules('password','Password','required|trim');
		// Jika benar masuk dasbor, jika salah masuk login lagi

		if($valid->run()) {
			$this->login_user->login($username,$password,base_url().'dashboard', base_url().'login');
		}

		$data = array('title' => 'Halaman Login - SIPP SYRA');
		$this->load->view('login/index',$data);
	}

	public function do_logout(){
		$this->session->set_flashdata('sukses','Terimakasih, Anda berhasil logout');
		$this->login_user->logout(base_url().'login');
	}
}
