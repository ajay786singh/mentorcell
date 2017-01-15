<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Student_model extends CI_Model {

    function get_all($table) {
        $row = $this->db->get($table)->result_array();
        return $row;
    }

    function get_student_interest() {
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
//            $res= $this->db->get($table)->result_array();
        return $res;
    }


    public function insert($data, $table)
    {
        $this->db->insert($table, $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }

    public function update($tbl, $data, $wherecol, $whereval)
    {
        $this->db->where($wherecol, $whereval);
        $this->db->update($tbl, $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('ei_universities');
    }
    
}