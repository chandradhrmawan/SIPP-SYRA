<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();	
		$this->CI =& get_instance();
		$this->login_user->cek_login();
	}
	
	public function index()
	{
		$data = array('title' => 'Halaman Home - SIPP SYRA',
								 'head'	=> 'Halaman Utama',
								 'bread' => 'Home',
		 				         'isi' => 'home/index'
		 			        );
		$this->load->view('layout/wrapper',$data);
	}
}
