<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model {

    function get_all($table) {
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