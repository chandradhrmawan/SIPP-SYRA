<?php //session_start();
class ReturModel extends CI_Model {

	public function get_barang(){
		$query =  $this->db->query("SELECT * FROM m_barang,m_kategori,m_warna 
			where m_barang.id_warna = m_warna.id_warna
			AND m_barang.id_kategori = m_kategori.id_kategori");
		return $query->result();
	}

	public function get_kodeawal(){
		$query = $this->db->query("SELECT MAX(id_retur) as id_retur FROM retur");
		return $query->row_array();
	}

	public function get_carikode($kode){
		$query = $this->db->query("select max('$kode') as high from retur");
		return $query->row_array();
	}

	public function insert_penerimaan($data_penerimaan){
		$this->db->insert('penerimaan', $data_penerimaan);
		return TRUE;
	}

	public function get_data_tmp_retur($id_pemesanan){
		$query = $this->db->query("SELECT * FROM tmp_detail_retur,m_barang 
			WHERE tmp_detail_retur.id_barang = m_barang.id_barang");
		return $query->result();
	}

	public function get_data_penerimaan($id_pemesanan){
		$query = $this->db->query("SELECT * FROM detail_pemesanan,m_barang,pemesanan 
			WHERE detail_pemesanan.id_pemesanan = '$id_pemesanan'
			AND detail_pemesanan.id_pemesanan = pemesanan.id_pemesanan
			AND detail_pemesanan.id_barang = m_barang.id_barang");
		return $query->result();
	}

	public function get_riwayat_penerimaan(){
		$query = $this->db->query("SELECT * FROM penerimaan");
		return $query->result();
	}

	public function update_status($id_pemesanan){
		$query = $this->db->query("UPDATE pemesanan SET status = '1' WHERE id_pemesanan = '$id_pemesanan'");
		return TRUE;
	}

}
?>
