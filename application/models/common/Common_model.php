<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model {

    function get_all($table,$offset=false,$limit=10) {
		if($offset!==false) {
			$this->db->limit($limit,$offset);
		}
        $row = $this->db->get($table)->result_array();
        return $row;
    }

    function get_single_var($field, $table, $where_col, $where_val)
    {
		$this->db->where("$where_col",$where_val);
        $res= $this->db->get($table)->row()->$field;
        return $res;
    }

    function get_single_row($table, $where_col, $where_val)
    {
        $this->db->where("$where_col",$where_val);
        $res= $this->db->get($table)->row_array();
        return $res;
    }


    public function insert($data, $table)
    {
        $this->db->insert($table, $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }

    public function update($table, $data, $wherecol, $whereval)
    {
        $this->db->where($wherecol, $whereval);
        $this->db->update($table, $data);
    }

    public function delete($table,$id)
    {
        $this->db->where('id', $id);
        $this->db->delete($table);
    }
	
	public function delete_where($table,$field, $id)
    {
        $this->db->where($field, $id);
        $this->db->delete($table);
    }
	
	public function deletecolumn($table,$field,$id)
    {
        $this->db->where($field, $id);
        $this->db->delete($table);
    }
	
	/**
	*@param tablename, column in where, value
	*result as array
	*/
	function get_all_rows($table, $where_col, $where_val, $order_by="", $limit="")
    {
        $this->db->where("$where_col",$where_val);
		if($order_by) {
			$this->db->order_by($order_by);
		}
		if($limit) {
			$this->db->limit($limit);
		}
        $result = $this->db->get($table)->result_array();
        return $result;
    }
	
	function get_all_rows_inwhere($table, $where_col, $where_val, $order_by="", $limit="")
    {
        $this->db->where_in("$where_col",$where_val);
		if($order_by) {
			$this->db->order_by($order_by);
		}
		if($limit) {
			$this->db->limit($limit);
		}
        $result = $this->db->get($table)->result_array();
        return $result;
    }
	
	/**
	*@param tablename, column in where, value
	*result as array
	*/
	function get_all_college_user()
    {
		$this->db->select('users.id, users.email');
		$this->db->from('users AS users');// I use aliasing make joins easier
		$this->db->join('users_groups AS users_groups', 'users_groups.user_id = users.id', 'INNER');
		$this->db->join('groups AS groups', 'groups.id = users_groups.group_id', 'INNER');
		$this->db->where('groups.name', "college");
		$result = $this->db->get()->result_array();
		return $result;
    }
	
	
	/*get user data to export*/
	function export_user_data(){
		$this->db->select('u.first_name, u.last_name,u.phone, u.email, courses.course_name as Course,coupon.coupon as CouponCode, tot_correct as Total_correct,resultDisplay as Result,score as Score,date_time as Date,district.name as city,state.name as State,dob.meta_value as DOB,about_me.meta_value as AboutMe,bio.meta_value as Bio');
		$this->db->from('users as u ');
		$this->db->join('users_meta as  city_id', 'u.id  = city_id.user_id and city_id.meta_key = "city"', 'LEFT');
		$this->db->join('districts as  district', 'district.id =  city_id.meta_value', 'LEFT');
		$this->db->join('users_meta as  state_id', 'u.id =  state_id.user_id and state_id.meta_key = "state"', 'LEFT');
		$this->db->join('states as  state', 'state.id =  state_id.meta_value', 'LEFT');
		$this->db->join('users_meta as  dob', 'u.id =  dob.user_id and dob.meta_key = "dob"', 'LEFT');
		$this->db->join('users_meta as  about_me', 'u.id =  about_me.user_id and about_me.meta_key = "about_me"', 'LEFT');
		$this->db->join('users_meta as  bio', 'u.id =  bio.user_id and and bio.meta_key = "bio"', 'LEFT');
		$this->db->join('mc_coupons as  coupon', 'u.id =  coupon.user_id', 'LEFT');
		$this->db->join('users_meta as  interest', 'u.id =  interest.user_id and interest.meta_key = "interest"', 'LEFT');
		$this->db->join('mc_streams as  stream', 'stream.stream_id =  interest.meta_value', 'LEFT');
		$this->db->join('users_meta as  course', 'u.id =  course.user_id and course.meta_key = "course"', 'LEFT');
		$this->db->join('mc_courses as  courses', 'courses.course_id =  course.meta_value', 'LEFT');
		
		$result = $this->db->get()->result_array();

		return $result;
		
	}	
	/*get user data to export*/
	
	/**
	*@param tablename, column in where, value
	*result as array
	*/
	function save_point($id)
    {
		
		$this->db->set('points', 'points+1', FALSE);
		$this->db->where('id', $id);
		$this->db->update('users');
		
    }
	
	
    
}