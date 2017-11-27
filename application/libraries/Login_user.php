<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan'); 

class Login_user {
	
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}	
	public function login($username, $password) {
		$id_active = '1';
		// Query untuk pencocokan data
		$query = $this->CI->db->get_where('m_user', array(
			'username' => $username, 
			'password' => $password,
			'status'   => '1'
		));

		// Jika ada hasilnya
		if($query->num_rows() == 1) {
			$query_session 	= $this->CI->db->query("SELECT
				m_user.id_user,
				m_user.username,
				m_user.nama_lengkap,
				m_user.id_level,
				m_user.status,
				m_level.id_level,
				m_level.nama_level
				FROM
				m_level
				INNER JOIN m_user ON m_user.id_level = m_level.id_level
				WHERE
				m_user.username = '$username' AND
				m_user.status = '$id_active'");
			$row 			= $query_session->row_array();			
			$id_user 		= $row['id_user'];
			$username 		= $row['username'];
			$password 		= $row['password'];
			$nama_lengkap	= $row['nama_lengkap'];
			$nama_level 	= $row['nama_level'];
			$id_level		= $row['id_level'];

			
			$this->CI->session->set_userdata('id_user', $id_user); 
			$this->CI->session->set_userdata('username', $username); 
			$this->CI->session->set_userdata('nama_lengkap', $nama_lengkap); 
			$this->CI->session->set_userdata('nama_level', $nama_level);
			$this->CI->session->set_userdata('id_level', $id_level);
			$this->CI->session->set_userdata('id_login', uniqid(rand()));
			$this->CI->session->set_userdata('logged_in', 'TRUE');


			
			// Kalau benar di redirect
			$this->CI->session->set_flashdata('login_success','Login Sukses, Anda berada di Halaman Dashboard SIPP Syra');
			redirect(base_url().'Dashboard');
		}else{
			$this->CI->session->set_flashdata('failed_login','Username/Password salah, Silahkan Periksa Kembali !');
			
			redirect(base_url().'Login');
		}
		return false;
	}
	public function cek_login() {
		if($this->CI->session->userdata('logged_in') == '') {
			redirect(base_url().'Login');
		}
	}

	public function cek_is_login() {
		if($this->CI->session->userdata('logged_in') == 'TRUE') {
			redirect(base_url().'Dashboard');
		}
	}
	// Logout
	public function logout($redirect) {
		$this->CI->session->unset_userdata('id_user'); 
		$this->CI->session->unset_userdata('username'); 
		$this->CI->session->unset_userdata('nama_lengkap'); 
		$this->CI->session->unset_userdata('nama_level');
		$this->CI->session->unset_userdata('id_level');
		$this->CI->session->unset_userdata('id_login');
		$this->CI->session->unset_userdata('logged_in');
		$this->CI->session->set_flashdata('logout_success','Terimakasih, Anda berhasil logout');
		redirect(base_url().'/Login');
	}
}