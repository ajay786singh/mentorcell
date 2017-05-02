<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Exam_model extends CI_Model {

    function get_all($table) {
        $row = $this->db->get($table)->result_array();
        return $row;
    }
	function get_all_groupby($table) {
        $this->db->group_by("course_name");
        $row = $this->db->get($table)->result_array();
        return $row;
    }
    function coupons() {
        $this->db->select('*');
        $this->db->from("tbl_coupons");
		$this->db->join("users","tbl_coupons.id = users.id", "left");
 		$this->db->join("tbl_colleges","tbl_coupons.id = tbl_colleges.id", "left");
		$this->db->join("tbl_desire_courses","tbl_coupons.id = tbl_desire_courses.id", "left");
        $row = $this->db->get()->result_array();
        return $row;
    }
	
	function coupons_data($id) {
        $this->db->select('*');
        $this->db->from("tbl_coupons");
		$this->db->join("users","tbl_coupons.id = users.id", "left");
 		$this->db->join("tbl_colleges","tbl_coupons.id = tbl_colleges.id", "left");
		$this->db->join("tbl_desire_courses","tbl_coupons.id = tbl_desire_courses.id", "left");
		$this->db->where("id",$id);
        $row = $this->db->get()->result_array();
        return $row;
    }

    function get_single_row($table, $where_col, $where_val)
    {
		
       $this->db->where("id",$where_val);
	   
        $res= $this->db->get($table)->row_array();
        return $res;
    }

	public function insert($data,$table)
	{
		
		$this->db->insert($table, $data);
		
		$id = $this->db->insert_id();
		
		return (isset($id)) ? $id : FALSE;
	}
	
    public function insert_question($data, $table)
    {
			 $a = $this->db->insert($table,$data);
			return $this->db->insert_id();
    }
	
	 public function insert_options($data, $table)
    {
				$this->db->insert($table,$data);
	}

    public function update($tbl, $data, $wherecol, $whereval)
    {
        $this->db->where($wherecol, $whereval);
        $this->db->update($tbl, $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('mc_exams');
    }
	
	public function get_exams_by_course($course_name){
		$this->db->select('*');
        $this->db->from("mc_exams");
		$this->db->where("course_name",$course_name);
        $row = $this->db->get()->result_array();
        return $row;
	}
    
}