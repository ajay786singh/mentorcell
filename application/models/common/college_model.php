<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class College_model extends CI_Model {
	
	function get_streams($id){
		$this->db->select('term_id');
		$this->db->from('mc_college_relations');
		$this->db->where('collge_id', $id);
		$this->db->where('term_name', "stream");
		$result = $this->db->get()->result_array();
		$result = array_column($result, 'term_id');
		return $result;
	}

	
	function get_types($id){
		$this->db->select('term_id');
		$this->db->from('mc_college_relations');
		$this->db->where('collge_id', $id);
		$this->db->where('term_name', "type");
		$result = $this->db->get()->result_array();
		$result = array_column($result, 'term_id');
		return $result;
	}
	
	
	function get_courses($id){
		$this->db->select('term_id');
		$this->db->from('mc_college_relations');
		$this->db->where('collge_id', $id);
		$this->db->where('term_name', "course");
		$result = $this->db->get()->result_array();
		$result = array_column($result, 'term_id');
		return $result;
	}
    
}