<?php //session_start();
class LaporanModel extends CI_Model {

	public function get_penjualan($dari,$sampai){
		$query = $this->db->query("SELECT * FROM penjualan,m_user WHERE penjualan.tgl_transaksi BETWEEN '$dari' AND '$sampai' AND penjualan.id_user = m_user.id_user");
		return $query->result();
	}

	public function get_penjualan_detail($dari,$sampai){
		$query = $this->db->query("SELECT detail_penjualan.id_transaksi,
			detail_penjualan.jumlah_beli,
			detail_penjualan.sub_total,
			m_barang.nama_barang,
			penjualan.nama_pelanggan,
			penjualan.total_bayar,
			penjualan.tgl_transaksi as tgl_transaksi
			FROM
			detail_penjualan
			INNER JOIN penjualan ON penjualan.id_transaksi = detail_penjualan.id_transaksi
			INNER JOIN m_barang ON detail_penjualan.id_barang = m_barang.id_barang
			WHERE tgl_transaksi
			BETWEEN '$dari' AND '$sampai'");
		return $query->result();
	}

	public function get_pemesanan($dari,$sampai){
		$query = $this->db->query("SELECT * FROM pemesanan,m_user,m_suplier WHERE pemesanan.tgl_pemesanan BETWEEN '$dari' AND '$sampai' AND pemesanan.id_user = m_user.id_user AND m_suplier.id_suplier = pemesanan.id_suplier");
		return $query->result();
	}

	public function get_penerimaan($dari,$sampai){
		$query = $this->db->query("SELECT * FROM penerimaan,m_user WHERE penerimaan.tgl_penerimaan BETWEEN '$dari' AND '$sampai' AND penerimaan.id_user = m_user.id_user");
		return $query->result();
	}

	public function get_masuk($dari,$sampai){
		$query = $this->db->query("SELECT * FROM masuk,m_user WHERE masuk.tgl_masuk BETWEEN '$dari' AND '$sampai' AND masuk.id_user = m_user.id_user ");
		return $query->result();
	}

	public function get_masuk_detail($dari,$sampai){
		$query = $this->db->query("SELECT detail_masuk.id_masuk,
			detail_masuk.jumlah_masuk,
			detail_masuk.sub_total,
			m_barang.nama_barang,
			masuk.total_bayar,
			masuk.tgl_masuk as tgl_masuk
			FROM
			detail_masuk
			INNER JOIN masuk ON masuk.id_masuk = detail_masuk.id_masuk
			INNER JOIN m_barang ON detail_masuk.id_barang = m_barang.id_barang
			WHERE tgl_masuk
			BETWEEN '$dari' AND '$sampai'");
		return $query->result();
	}

}
?>
