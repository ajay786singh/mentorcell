<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Coupon_model extends CI_Model {
	
    function get_all_coupons($a_params) {
		$count			=	$a_params['count'];
		
		$this->db->select("a.coupon_id, a.coupon, b.course_name, concat(c.first_name,' ',c.last_name) as username, d.name as college_name");
		$this->db->join("mc_courses b",'a.course_id = b.course_id','left');
		$this->db->join("users c",'a.user_id = c.id','inner');
		$this->db->join("mc_colleges d",'a.college_id = d.id','left');		
		$this->db->from("mc_coupons a");
		
		if($count) {
			$result = $this->db->get();
			return $result->num_rows();
		} else {
			$a_whereClause	=	$a_params['whereClause'];
			$num			=	$a_params['num'];
			$offset			=	$a_params['offset'];
			
			if($a_whereClause) {
				foreach($a_whereClause as $key=>$val) {
					$this->db->where($key,$val);
				}
			}			
			$this->db->limit($num, $offset);		
			$this->db->order_by('coupon_id',"DESC");
			if($result = $this->db->get()) {
				//echo $this->db->last_query();die;
				return $result->result_array();
			} else {
				return false;
			}
		}
	}
	
	function is_valid_coupon($coupon) {
		$this->db->select("*");
		$this->db->from("mc_coupons");
		$this->db->where('coupon',$coupon);
		$result = $this->db->get();
		//echo $this->db->last_query();
		if($result->num_rows() > 0) {
			return $result->row_array();
		} else {
			return false;
		}
	}
	
	function is_exists_coupon($coupon) {
		$this->db->select("a.*, b.course_name, concat(c.first_name,' ',c.last_name) as username, d.name as college_name");
		$this->db->join("mc_courses b",'a.course_id = b.course_id','left');
		$this->db->join("users c",'a.user_id = c.id','inner');
		$this->db->join("mc_colleges d",'a.college_id = d.id','left');		
		$this->db->from("mc_coupons a");
		$this->db->where('coupon',$coupon);
		$this->db->where('a.college_id <> ',0);
		$result = $this->db->get();
		//echo $this->db->last_query();
		if($result->num_rows() > 0) {
			return $result->row_array();
		} else {
			return false;
		}
	}
	
	function get_all_courses($college_id) {
		$this->db->select('a.course_id,a.course_name,incentive');
		$this->db->join('mc_course_assignment b','a.course_id = b.course_id','inner');
		$this->db->where('b.college_id',$college_id);
		$this->db->group_by('a.course_id');
		$result	=	$this->db->get('mc_courses a');
		//echo $this->db->last_query();die;
		if($result->num_rows() > 0) {
			return $result->result_array();
		} else {
			return false;
		}
	}
	
	function get_all_spec($college_id) {
		$this->db->select('*');
		$this->db->from('mc_course_assignment');
		$this->db->where('college_id', $college_id);
		$this->db->group_by('specialization_id');
		$result = $this->db->get()->result_array();
		//if($result->num_rows() > 0) {
			return $result;
		/*} else {
			return false;
		}*/
	}
	
	function get_all_specname($speciid) {
		$this->db->select('*');
		$this->db->from('mc_specialization');
		$this->db->where('specialization_id', $speciid);
		 $res= $this->db->get()->row();
			return $res;
	}
	function get_insentive($college_id,$coupon_course) {
		$this->db->select('*');
		$this->db->from('mc_course_assignment');
		$this->db->where('college_id', $college_id);
		$this->db->where('specialization_id', $coupon_course);
		 $res= $this->db->get()->row();
			return $res;
	}
	
	function get_coupon_value($userid) {
		$this->db->select('*');
		$this->db->from('mc_coupons');
		$this->db->where('user_id', $userid);
		 $res= $this->db->get()->row();
			return $res;
	}
	
	public function record_count() {
        return $this->db->count_all("countries");
    }
	
	public function fetch_countries($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("countries");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
}