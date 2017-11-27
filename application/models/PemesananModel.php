<?php //session_start();
class PemesananModel extends CI_Model {

	public function get_barang(){
		$query =  $this->db->query("SELECT * FROM m_barang,m_kategori,m_warna 
			where m_barang.id_warna = m_warna.id_warna
			AND m_barang.id_kategori = m_kategori.id_kategori");
		return $query->result();
	}

	public function get_kodeawal(){
		$query = $this->db->query("SELECT MAX(id_pemesanan) as id_pemesanan FROM pemesanan");
		return $query->row_array();
	}

	public function get_carikode($kode){
		$query = $this->db->query("select max('$kode') as high from pemesanan");
		return $query->row_array();
	}

	public function insert_pemesanan_detail($data){
		$this->db->insert('tmp_detail_pemesanan', $data);
		return TRUE;
	}

	public function get_detail_pemesanan($id_pemesanan){
		$query = $this->db->query("SELECT * FROM tmp_detail_pemesanan,m_barang 
			WHERE tmp_detail_pemesanan.id_pemesanan = '$id_pemesanan'
			AND tmp_detail_pemesanan.id_barang = m_barang.id_barang");
		return $query->result();
	}

	public function get_data_pesan($id_pemesanan){
		$query = $this->db->query("SELECT * FROM detail_pemesanan,m_barang 
			WHERE detail_pemesanan.id_pemesanan = '$id_pemesanan'
			AND detail_pemesanan.id_barang = m_barang.id_barang");
		return $query->result();
	}

	public function delete_detail($id_detail){

		$query_hapus = $this->db->query("DELETE FROM tmp_detail_pemesanan WHERE id_detail = '$id_detail'");
			return TRUE;
	}

	public function copy_table($id_pemesanan){
		$this->db->query("INSERT INTO detail_pemesanan
						  SELECT * FROM tmp_detail_pemesanan WHERE id_pemesanan = '$id_pemesanan'");
		return TRUE;
	}

	public function delete_temp_table(){
		$this->db->query("DELETE FROM tmp_detail_pemesanan");
		return TRUE;
	}

	public function insert_pemesanan($data_pemesanan){
		$this->db->insert('pemesanan', $data_pemesanan);
		return TRUE;
	}

	public function get_data_pemesanan($id_pemesanan){
		$query = $this->db->query("SELECT * FROM detail_pemesanan,m_barang,pemesanan 
			WHERE detail_pemesanan.id_pemesanan = '$id_pemesanan'
			AND detail_pemesanan.id_pemesanan = pemesanan.id_pemesanan
			AND detail_pemesanan.id_barang = m_barang.id_barang");
		return $query->result();
	}

	public function get_riwayat_pemesanan(){
		$query = $this->db->query("SELECT m_user.nama_lengkap, pemesanan.* FROM pemesanan,m_user WHERE pemesanan.id_user = m_user.id_user");
		return $query->result();
	}

}
?>
