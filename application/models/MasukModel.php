<?php //session_start();
class MasukModel extends CI_Model {

	public function get_barang(){
		$query =  $this->db->query("SELECT * FROM m_barang,m_kategori,m_warna 
			where m_barang.id_warna = m_warna.id_warna
			AND m_barang.id_kategori = m_kategori.id_kategori");
		return $query->result();
	}

	public function get_kodeawal(){
		$query = $this->db->query("SELECT MAX(id_masuk) as id_masuk FROM masuk");
		return $query->row_array();
	}

	public function get_carikode($kode){
		$query = $this->db->query("select max('$kode') as high from masuk");
		return $query->row_array();
	}

	public function insert_masuk_detail($data){

		$cek_data = $this->db->query("SELECT * FROM tmp_detail_masuk WHERE id_barang = '$data[id_barang]'");
		$jumlah_data =  $cek_data->num_rows();

		if($jumlah_data > 0 ){
			$this->db->query("UPDATE tmp_detail_masuk 
				SET jumlah_masuk = jumlah_masuk +'$data[jumlah_masuk]',
				sub_total  = sub_total + '$data[sub_total]'
				WHERE id_barang = '$data[id_barang]'
				AND id_masuk = '$data[id_masuk]'");
			$this->db->query("UPDATE m_barang SET 
				stok = stok + '$data[jumlah_masuk]'
				WHERE id_barang = '$data[id_barang]'");
		}else{
			$this->db->insert('tmp_detail_masuk', $data);
			$this->db->query("UPDATE m_barang SET 
				stok = stok + '$data[jumlah_masuk]'
				WHERE id_barang = '$data[id_barang]'");
		}

		return TRUE;
	}

	public function get_detail_masuk($id_masuk){
		$query = $this->db->query("SELECT * FROM tmp_detail_masuk,m_barang 
			WHERE tmp_detail_masuk.id_masuk = '$id_masuk'
			AND tmp_detail_masuk.id_barang = m_barang.id_barang");
		return $query->result();
	}

	public function get_data_suplier(){
		$query = $this->db->query("SELECT * FROM m_suplier");
		return $query->result();
	}

	public function get_data_masuk($id_masuk){
		$query = $this->db->query("SELECT * FROM detail_masuk,m_barang,masuk 
			WHERE detail_masuk.id_masuk = '$id_masuk'
			AND detail_masuk.id_barang = m_barang.id_barang
			AND masuk.id_masuk = detail_masuk.id_masuk");
		return $query->result();
	}

	public function delete_detail($id_detail){
		$query_hapus = $this->db->query("DELETE FROM tmp_detail_masuk WHERE id_detail = '$id_detail'");
		return TRUE;
	}

	public function copy_table($id_masuk){
		$this->db->query("INSERT INTO detail_masuk
			SELECT * FROM tmp_detail_masuk WHERE id_masuk = '$id_masuk'");
		return TRUE;
	}

	public function delete_temp_table(){
		$this->db->query("DELETE FROM tmp_detail_masuk");
		return TRUE;
	}

	public function insert_masuk($data_masuk){

		$this->db->insert('masuk', $data_masuk);
		return TRUE;
	}

	public function get_riwayat_masuk(){
		$query = $this->db->query("SELECT * 
			FROM masuk,m_user
			WHERE masuk.id_user = m_user.id_user");
		return $query->result();
	}

	public function get_detail($id_masuk){
		$query = $this->db->query("SELECT detail_masuk.*, m_barang.nama_barang 
			FROM detail_masuk,m_barang 
			WHERE detail_masuk.id_masuk = '$id_masuk'
			AND detail_masuk.id_barang = m_barang.id_barang");
		return $query->result();
	}

	public function get_masuk($id_masuk){
		$query = $this->db->query("SELECT * FROM masuk,m_user
			WHERE masuk.id_masuk = '$id_masuk'
			AND masuk.id_user = m_user.id_user");
		return $query->row_array();
	}

}
?>
