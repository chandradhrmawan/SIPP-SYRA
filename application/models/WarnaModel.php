<?php //session_start();
class WarnaModel extends CI_Model {
	
	var $primary = 'id_warna';
	var $table = 'm_warna';
	var $order = array('id_warna' => 'desc');
	var $column = array('id_warna', 'nama_warna');

	function get_datatables(){
		$query =  $this->db->query("SELECT * FROM m_warna");
		return $query->result();
	}

	private function _get_datatables_query()
	{
		$this->db->from($this->table);
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
		}
	}

	function count_filtered(){
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all(){
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function save($data){
		$this->db->insert($this->table, $data);
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
		$this->db->where('id_warna',$id);
		$query = $this->db->get();

		return $query->row();
	}

}
?>
