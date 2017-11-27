<?php //session_start();
class BarangModel extends CI_Model {
	
	var $primary = 'id_barang';
	var $table = 'm_barang';
	var $order = array('id_barang' => 'desc');
	var $column = array('id_barang', 'nama_barang','id_kategori','id_warna','stok','keterangan','harga_jual','harga_beli','direktori');

	function get_datatables(){
		/*$query =  $this->db->query("SELECT * FROM m_barang");
		return $query->result();*/
	}

	private function _get_datatables_query()
	{
		/*$this->db->from($this->table);
		$i = 0;

		foreach ($this->column as $item) 
		{
			if($_POST['search']['value'])
				($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
			$column[$i] = $item;
			$i++;
		}
		
		if(isset($_POST['order'])){
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}*/
	}

	function count_filtered(){
		/*$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();*/
	}

	public function count_all(){
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function save($data){
		$this->db->insert($this->table, $data);
		return true;
	}

	public function update($where, $data){
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete($id){
		$this->db->where($this->primary,$id);
		$this->db->delete($this->table);
		return true;
	}

	public function get_by_id($id){
		$this->db->from($this->table);
		$this->db->where('id_barang',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function get_data_barang(){
		$query =  $this->db->query("SELECT * FROM m_barang,m_kategori,m_warna 
			where m_barang.id_warna = m_warna.id_warna
			AND m_barang.id_kategori = m_kategori.id_kategori");
		return $query->result();
	}

	public function get_data_kategori(){
		$query =  $this->db->query("SELECT * FROM m_kategori");
		return $query->result();
	}

	public function get_data_warna(){
		$query = $this->db->query("SELECT * FROM m_warna");
		return $query->result();
	}

	function cek_max_id(){
		$sql=$this->db->query("SELECT MAX(id_barang) id_barang FROM m_barang");
		if($sql->num_rows()>0) {
			$tmp = ((int)$sql->row()->id_barang)+1;
			$id_barang = $tmp;
		}else{
			$id_barang=1;
		}
		return $id_barang;
	}

}
?>
