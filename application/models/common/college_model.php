<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class College_model extends CI_Model {
	
	function get_streams($id){
		$this->db->select('term_id');
		$this->db->from('mc_college_relations');
		$this->db->where('college_id', $id);
		$this->db->where('term_name', "stream");
		$result = $this->db->get()->result_array();
		$result = array_column($result, 'term_id');
		return $result;
	}

	
	function get_types($id){
		$this->db->select('term_id');
		$this->db->from('mc_college_relations');
		$this->db->where('college_id', $id);
		$this->db->where('term_name', "type");
		$result = $this->db->get()->result_array();
		$result = array_column($result, 'term_id');
		return $result;
	}
	
	
	function get_courses($id){
		$this->db->select('term_id');
		$this->db->from('mc_college_relations');
		$this->db->where('college_id', $id);
		$this->db->where('term_name', "course");
		$result = $this->db->get()->result_array();
		$result = array_column($result, 'term_id');
		return $result;
	}
    
	
	function get_courseswithstream($id){
		$this->db->select('courses.course_id, courses.course_name');
		$this->db->from('mc_courses AS courses');// I use aliasing make joins easier
		$this->db->join('mc_types AS types', 'types.type_id = courses.type_id', 'INNER');
		$this->db->join('mc_streams AS streams', 'streams.stream_id = types.stream_id', 'INNER');
		/**/
		$this->db->where('streams.stream_id',$id);
		$result = $this->db->get()->result_object();
		return $result;
	}
	
	function search_result_course($query){
		/**/
		$this->db->select('ca.*,cl.*,cities.name as city, states.name as state, countries.name as country ');
		$this->db->from('mc_course_assignment AS ca');// I use aliasing make joins easier
		$this->db->join('mc_colleges AS cl', 'cl.id = ca.college_id', 'INNER');
		$this->db->join('cities AS cities', 'cities.id = cl.city', 'LEFT');
		$this->db->join('states AS  states', 'states.id = cl.state', 'LEFT');
		$this->db->join('countries AS countries', 'countries.id = cl.country', 'LEFT');
		/**/
		$this->db->where('ca.course_id', $query['course']);
		$result = $this->db->get()->result_object();
		return $result;
	}

	function search_result_college($query){
		/**/
		/*$this->db->select('cl.*,ca.* ,cities.name as city, states.name as state, countries.name as country ');
		$this->db->from('mc_colleges AS cl');// I use aliasing make joins easier
		$this->db->join('mc_course_assignment AS ca', 'cl.id = ca.college_id', 'INNER');
		$this->db->join('cities AS cities', 'cities.id = cl.city', 'LEFT');
		$this->db->join('states AS  states', 'states.id = cl.state', 'LEFT');
		$this->db->join('countries AS countries', 'countries.id = cl.country', 'LEFT');*/
		/**/
		$this->db->select('cl.*,cities.name as city, states.name as state, countries.name as country ');
		$this->db->from('mc_colleges AS cl');// I use aliasing make joins easier
		$this->db->join('cities AS cities', 'cities.id = cl.city', 'LEFT');
		$this->db->join('states AS  states', 'states.id = cl.state', 'LEFT');
		$this->db->join('countries AS countries', 'countries.id = cl.country', 'LEFT');
		$this->db->where('cl.id', $query['college']);
		$result = $this->db->get()->row_object();
		return $result;
	}	
	
	
	
	/*for admin college view page*/
	function get_college($id){
		/**/
		$this->db->select('cl.* ,cities.name as city, states.name as state, countries.name as country ');
		$this->db->from('mc_colleges AS cl');// I use aliasing make joins easier
		//$this->db->join('mc_course_assignment AS ca', 'cl.id = ca.college_id', 'INNER');
		$this->db->join('cities AS cities', 'cities.id = cl.city', 'LEFT');
		$this->db->join('states AS  states', 'states.id = cl.state', 'LEFT');
		$this->db->join('countries AS countries', 'countries.id = cl.country', 'LEFT');
		/**/
		$this->db->where('cl.id', $id);
		$result = $this->db->get()->row_object();
		return $result;
	}	
	/**/
	
	
	function get_images($id){
		$this->db->select('*');
		$this->db->from('mc_college_image AS image');
		$this->db->where('image.college_id', $id);
		$this->db->where('image.asset_type', 'image');
		$result = $this->db->get()->result_object();
		return $result;
	}
	
	function get_videos($id){
		$this->db->select('*');
		$this->db->from('mc_college_image AS image');
		$this->db->where('image.college_id', $id);
		$this->db->where('image.asset_type', 'video');
		$result = $this->db->get()->result_object();
		return $result;
	}
	
	
	
	/*get all state we have colleges*/
	function get_states(){
		$this->db->select('states.id as id,states.name as name');
		$this->db->from('mc_colleges AS cl');
		$this->db->join('states AS  states', 'states.id = cl.state', 'INNER');
		$this->db->group_by('states.id');
		$this->db->order_by("name", "asc");
		$result = $this->db->get()->result_object();
		return $result;
	}
	
	function get_cities($id){
		$this->db->select('cities.id as id,cities.name as name');
		$this->db->from('mc_colleges AS cl');
		$this->db->join('cities AS cities', 'cities.id = cl.city', 'INNER');
		$this->db->where('cities.state_id', $id);
		$this->db->group_by('cities.id');
		$this->db->order_by("name", "asc");
		$result = $this->db->get()->result_object();
		return $result;
	}
	
}