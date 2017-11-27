<?php //session_start();
class LaporanModel extends CI_Model {

	public function get_penjualan($dari,$sampai){
		$query = $this->db->query("SELECT * FROM penjualan,m_user WHERE penjualan.tgl_transaksi BETWEEN '$dari' AND '$sampai' AND penjualan.id_user = m_user.id_user");
		return $query->result();
	}

	public function get_pemesanan($dari,$sampai){
		$query = $this->db->query("SELECT * FROM pemesanan,m_user WHERE pemesanan.tgl_pemesanan BETWEEN '$dari' AND '$sampai' AND pemesanan.id_user = m_user.id_user");
		return $query->result();
	}

	public function get_penerimaan($dari,$sampai){
		$query = $this->db->query("SELECT * FROM penerimaan,m_user WHERE penerimaan.tgl_penerimaan BETWEEN '$dari' AND '$sampai' AND penerimaan.id_user = m_user.id_user");
		return $query->result();
	}

}
?>
