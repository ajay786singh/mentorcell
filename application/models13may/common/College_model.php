<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class College_model extends CI_Model {
	
	var $table = 'mc_colleges';
    var $column_order = array(null, 'logo','contact_person_name','email_id','address','states','city','country'); //set column field database for datatable orderable
    var $column_search = array('logo','contact_person_name','email_id','address','states','city','country'); //set column field database for datatable searchable 
    var $order = array('id' => 'asc'); // default order 
	
	
	/*ajax pagination*/
	
	private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if(@$_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, @$_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[@$_POST['order']['0']['column']], @$_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
	
	/*ajax pagination*/
	
	function get_streams($id){
		$this->db->select('term_id');
		$this->db->from('mc_college_relations');
		$this->db->where('college_id', $id);
		$this->db->where('term_name', "stream");
		$result = $this->db->get()->result_array();
		$result = array_column($result, 'term_id');
		return $result;
	}
	
	function get_course_relation($id){
		$this->db->distinct();
		$this->db->select('course_id');
		$this->db->from('mc_course_assignment');
		$this->db->where('college_id', $id);
		//$this->db->where('term_name', "stream");
		$result = $this->db->get()->result_array();
		//$result = array_column($result, 'term_id');
		return $result;
	}
	
	function get_stream_relation($id){
		$this->db->distinct();
		$this->db->select('stream_id');
		$this->db->from('mc_course_assignment');
		$this->db->where('college_id', $id);
		//$this->db->where('term_name', "stream");
		$result = $this->db->get()->result_array();
		//$result = array_column($result, 'term_id');
		return $result;
	}
	
	function get_specialize_relation($id){
		$this->db->select('specialization_id');
		$this->db->from('mc_course_assignment');
		$this->db->where('college_id', $id);
		//$this->db->where('term_name', "stream");
		$result = $this->db->get()->result_array();
		//$result = array_column($result, 'term_id');
		return $result;
	}
	
	    function get_spel_data($id)
    {
			$this->db->select('specialization_name');
		$this->db->from('mc_specialization');
		$this->db->where('specialization_id', $id);
        $res= $this->db->get()->row();
        return $res;
    }
	
	   function get_strem_data($id)
    {
			$this->db->select('stream_name');
		$this->db->from('mc_streams');
		$this->db->where('stream_id', $id);
        $res= $this->db->get()->row();
        return $res;
    }
	
	   function get_exam_data($id)
    {
			$this->db->select('*');
		$this->db->from('mc_exams');
		$this->db->where('course_name', $id);
        $res= $this->db->get()->result_array();
        return $res;
    }
	
	   function get_collageid($id)
    {
			$this->db->select('*');
		$this->db->from('mc_course_assignment');
		$this->db->where('course_id', $id);
		$this->db->group_by('college_id');
        $res= $this->db->get()->result_array();
        return $res;
    }
	
	   function get_feedata($id)
    {
			$this->db->select('*');
		$this->db->from('mc_course_assignment');
		$this->db->where('course_id', $id);
		$this->db->group_by('fee');
        $res= $this->db->get()->result_array();
        return $res;
    }
	
	  function get_all_stream()
    {
			$this->db->select('*');
		$this->db->from('mc_streams');
        $res= $this->db->get()->result_array();
        return $res;
    }
	   function get_specialata($id)
    {
			$this->db->select('*');
		$this->db->from('mc_specialization');
		$this->db->where('course_id', $id);
        $res= $this->db->get()->result_array();
        return $res;
    }
	 function get_recognize($id)
    {
			$this->db->select('*');
		$this->db->from('mc_course_assignment');
		$this->db->where('course_id', $id);
        $res= $this->db->get()->result_array();
        return $res;
    }

	
	 function get_location($id)
    {
			$this->db->select('*');
		$this->db->from('mc_colleges');
		$this->db->where('id', $id);
		$this->db->group_by('city');
        $res= $this->db->get()->result_array();
        return $res;
    }
	 function get_city_name($id)
    {
			$this->db->select('*');
		$this->db->from('cities');
		$this->db->where('id', $id);
        $res= $this->db->get()->row();
        return $res;
    }
	
	 function get_course_data($id)
    {
			$this->db->select('*');
		$this->db->from('mc_courses');
		$this->db->where('course_id', $id);
        $res= $this->db->get()->row();
        return $res;
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
    
	function get_courses_detail($id){
		$this->db->select('cr.term_id,ca.*');
		$this->db->from('mc_college_relations AS cr');
		$this->db->join('mc_course_assignment AS ca', 'ca.course_id = cr.term_id', 'INNER');
		$this->db->where('cr.college_id', $id);
		$this->db->where('cr.term_name', "course");
		$this->db->where('ca.college_id', $id);
		//$result = $this->db->get()->result_array();
		//$result = array_column($result, 'term_id');
		$result = $this->db->get()->result_object();
		return $result;
	}
	
		public function get_fees_by_collage($collageid){
		$this->db->select('*');
        $this->db->from("mc_course_assignment");
		$this->db->where("college_id",$collageid);
        $row = $this->db->get()->result_array();
        return $row;
	}
	
	function get_single_courses_detail($college_id,$course_id){
		//print_r($college_id);
		//print_r($course_id);die;
		$this->db->select('cr.term_id,ca.*');
		$this->db->from('mc_college_relations AS cr');
		$this->db->join('mc_course_assignment AS ca', 'ca.course_id = cr.term_id', 'INNER');
		$this->db->where('cr.college_id', $college_id);
		$this->db->where('cr.term_name', "course");
		$this->db->where('ca.college_id', $college_id);
		$this->db->where('ca.course_id', $course_id);
		//$result = $this->db->get()->result_array();
		//$result = array_column($result, 'term_id');
		$result = $this->db->get()->row_object();
		return $result;
	}
	
	function get_courseswithstream($id){
		$this->db->select('courses.course_id, courses.course_name');
		$this->db->from('mc_courses AS courses');// I use aliasing make joins easier
		//$this->db->join('mc_types AS types', 'types.type_id = courses.type_id', 'INNER');
		$this->db->join('mc_streams AS streams', 'streams.stream_id = courses.stream_id', 'INNER');
		/**/
		$this->db->where('streams.stream_id',$id);
		$result = $this->db->get()->result_object();
		return $result;
	}
	
	/*function search_result_course($query){
		
		$this->db->select('ca.*,cl.*,cities.name as city, states.name as state, countries.name as country ');
		$this->db->from('mc_course_assignment AS ca');// I use aliasing make joins easier
		$this->db->join('mc_colleges AS cl', 'cl.id = ca.college_id', 'INNER');
		$this->db->join('cities AS cities', 'cities.id = cl.city', 'LEFT');
		$this->db->join('states AS  states', 'states.id = cl.state', 'LEFT');
		$this->db->join('countries AS countries', 'countries.id = cl.country', 'LEFT');
		
		$this->db->where('ca.course_id', $query['course']);
		$result = $this->db->get()->result_object();
		return $result;
	}*/
	//select * FROM mc_colleges INNER JOIN mc_course_assignment ON mc_colleges.id =  mc_course_assignment.college_id WHERE mc_colleges.city = '176' OR mc_course_assignment.course_id = '41'

	function search_result_course($query){

		$loation = $query['location'];
		$course = $query['course'];
		$this->db->select('*');
		$this->db->from('mc_colleges');
		$this->db->join('mc_course_assignment', 'mc_colleges.id = mc_course_assignment.college_id');
		if($loation==0){
		$where = "mc_course_assignment.course_id = $course";
		}else{
		$where = "mc_colleges.city = $loation OR mc_course_assignment.course_id = $course";	
		}
		
        $this->db->where($where);
		$this->db->group_by('mc_colleges.id');
		$result = $this->db->get()->result_object();
		return $result;
	}
	
	function search_result_cont($query){
		//print_r($query);
		$this->db->distinct();
		$loation = $query['location'];
		$course = $query['course'];
		$this->db->select('*');
		$this->db->from('mc_colleges');
		$this->db->join('mc_course_assignment', 'mc_colleges.id = mc_course_assignment.college_id');
		$where = "mc_colleges.city = $loation OR mc_course_assignment.course_id = $course";
        $this->db->where($where);
		$this->db->group_by('mc_colleges.id');
		$result = $this->db->get();
		$rowcount = $result->num_rows();
		return $rowcount;
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
		$this->db->select('*');
		$this->db->from('mc_colleges');// I use aliasing make joins easier
		//$this->db->join('cities AS cities', 'cities.id = cl.city', 'LEFT');
		//$this->db->join('states AS  states', 'states.id = cl.state', 'LEFT');
		//$this->db->join('countries AS countries', 'countries.id = cl.country', 'LEFT');
		$this->db->where('id', $query['college']);
		$result = $this->db->get()->row_object();
		return $result;
	}	
	
	
	function admission_result($query){
		$this->db->select('ca.*,cl.*,cities.name as city, states.name as state, countries.name as country ');
		$this->db->from('mc_course_assignment AS ca');// I use aliasing make joins easier
		$this->db->join('mc_colleges AS cl', 'cl.id = ca.college_id', 'INNER');
		
		$this->db->join('mc_colleges AS stream', 'cl.id = ca.college_id', 'INNER');
		$this->db->join('mc_courses AS course', 'cl.id = ca.college_id', 'INNER');
		
		$this->db->join('cities AS cities', 'cities.id = cl.city', 'LEFT');
		$this->db->join('states AS  states', 'states.id = cl.state', 'LEFT');
		$this->db->join('countries AS countries', 'countries.id = cl.country', 'LEFT');
		/**/
		$this->db->where('cl.status', '2');
		$result = $this->db->get()->result_object();
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
	
	
	/*for admin college view page*/
	function get_clgstate($id){
		/**/
		$this->db->select('cities.id as city, states.id as state');
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
	
	function get_all_home_logo(){
		$this->db->select('*');
		$this->db->from('mc_logo_slider');
		$this->db->where('status', 1);
		$result = $this->db->get()->result_array();
		return $result;
	}
	
	/*for admin college view page*/
	function get_assigned_college($colleges){
		$colleges = json_decode($colleges);
		$this->db->where_in('id', $colleges);
        $result = $this->db->get('mc_colleges')->result_array();
        return $result;
	}	
	/**/
	
}