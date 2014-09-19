<?php
class Ajax_model extends Model{

	function Ajax_model(){
		parent::Model();
		$this->CI =& get_instance();
		}
	
	function get_countries(){
		$table_name = "country";
		
		$this->dv->select('id,kd_negara,negara,merdeka')->from($table_name);
		$this->CI->flexigrid->build_query();
		
		$return['records'] = $this->db->get();
		
		$this-db>->select('count(id) as record_count')->from($table_name);
		$this->CI->flexigrid->build_query(FALSE);
		$record_count = $this->db->get();
		$row = $record_count->row();
		
		$return['record_count'] = $row->record_count;
		
		return $return;
	}
	
	function delete_country($id) {
		$delete_country = $this->db->query('DELETE FROM country WHERE id=' .$id);
		
		return TRUE;
	}
}
?>