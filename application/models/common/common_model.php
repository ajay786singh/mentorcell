<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model {

    function get_all($table) {
        $row = $this->db->get($table)->result_array();
        return $row;
    }

    function get_college_interest() {
        $this->db->select('*');
        $this->db->from("tbl_edu_interest");
        $this->db->where('userid',$id);
        $row = $this->db->get()->result_array();
        return $row;
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

    public function delete($table,$field,$value)
    {
        $this->db->where($field, $value);
        $this->db->delete($table);
    }
	
	/**
	*@param tablename, column in where, value
	*result as array
	*/
	function get_all_rows($table, $where_col, $where_val)
    {
        $this->db->where("$where_col",$where_val);
        $result = $this->db->get($table)->result_array();
        return $result;
    }
	
	
	/**
	*@param tablename, column in where, value
	*result as array
	*/
	function get_all_rows_inwhere($table, $where_col, $where_val)
    {
        $this->db->where_in("$where_col",$where_val);
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
    
}