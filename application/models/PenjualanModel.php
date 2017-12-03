<?php //session_start();
class PenjualanModel extends CI_Model {

	public function get_barang(){
		$query =  $this->db->query("SELECT * FROM m_barang,m_kategori,m_warna 
			where m_barang.id_warna = m_warna.id_warna
			AND m_barang.id_kategori = m_kategori.id_kategori");
		return $query->result();
	}

	public function get_kodeawal(){
		$query = $this->db->query("SELECT MAX(id_transaksi) as id_transaksi FROM penjualan");
		return $query->row_array();
	}

	public function get_carikode($kode){
		$query = $this->db->query("select max('$kode') as high from penjualan");
		return $query->row_array();
	}

	public function insert_penjualan_detail($data){
		$this->db->insert('tmp_detail_penjualan', $data);
		return TRUE;
	}

	public function get_detail_penjualan($id_transaksi){
		$query = $this->db->query("SELECT * FROM tmp_detail_penjualan,m_barang 
			WHERE tmp_detail_penjualan.id_transaksi = '$id_transaksi'
			AND tmp_detail_penjualan.id_barang = m_barang.id_barang");
		return $query->result();
	}

	public function kurang_stok($jumlah_beli,$id_barang){
		$query = $this->db->query("UPDATE m_barang SET stok = stok - '$jumlah_beli' WHERE id_barang = '$id_barang'");
		return TRUE;
	}

	public function delete_detail($id_detail,$id_barang,$jumlah_beli){

		$query_tambah = $this->db->query("UPDATE m_barang SET stok = stok + '$jumlah_beli'
			WHERE id_barang = '$id_barang'");

		$query_hapus = $this->db->query("DELETE FROM tmp_detail_penjualan WHERE id_detail = '$id_detail'");

		if($query_tambah AND $query_hapus == TRUE){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function copy_table($id_transaksi){
		$this->db->query("INSERT INTO detail_penjualan
						  SELECT * FROM tmp_detail_penjualan WHERE id_transaksi = '$id_transaksi'");
		return TRUE;
	}

	public function delete_temp_table(){
		$this->db->query("DELETE FROM tmp_detail_penjualan");
		return TRUE;
	}

	public function insert_penjualan($data_penjualan){
		$this->db->insert('penjualan', $data_penjualan);
		return TRUE;
	}

	public function get_data_penjualan($id_transaksi){
		$query = $this->db->query("SELECT * FROM detail_penjualan,m_barang,penjualan 
			WHERE detail_penjualan.id_transaksi = '$id_transaksi'
			AND detail_penjualan.id_transaksi = penjualan.id_transaksi
			AND detail_penjualan.id_barang = m_barang.id_barang");
		return $query->result();
	}

	public function get_riwayat_penjualan(){
		$query = $this->db->query("SELECT * FROM penjualan,m_user WHERE penjualan.id_user = m_user.id_user");
		return $query->result();
	}

	public function get_detail($id_transaksi){
		$query = $this->db->query("SELECT * FROM detail_penjualan,m_barang 
			WHERE detail_penjualan.id_transaksi = '$id_transaksi'
			AND detail_penjualan.id_barang = m_barang.id_barang");
		return $query->result();
	}

	public function get_transaksi($id_transaksi){
		$query = $this->db->query("SELECT * FROM penjualan,m_user 
			WHERE penjualan.id_transaksi = '$id_transaksi'
			AND penjualan.id_user = m_user.id_user");
		return $query->row_array();
	}

}
?>
