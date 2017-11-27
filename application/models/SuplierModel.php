<?php //session_start();
class SuplierModel extends CI_Model {
	
	var $primary = 'id_suplier';
	var $table = 'm_suplier';
	var $order = array('id_suplier' => 'desc');
	var $column = array('id_suplier', 'nama_suplier');

	function get_datatables(){
		$query =  $this->db->query("SELECT * FROM m_suplier");
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
		$this->db->where('id_suplier',$id);
		$query = $this->db->get();

		return $query->row();
	}
}
?>
