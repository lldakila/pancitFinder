<?php 
class Pancit_model extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function get_pancit($id = null){
		if($id===null){
			$rs = $this->db->get('tbl_pancit');
				//returns result_array for multiple row results usually for array, refer to documentation
				return $rs->result_array();
		}
		else{
			$rs = $this->db->get_where('tbl_pancit', array('p_id' =>$id));
			//print_r($rs);
			//returns single row of result
			return $rs->row_array();
		}

		// $query = $this->db->get_where('tbl_pancit', array('slug' => $slug));
		// return $query->row_array();
	}

	public function get_pprice($id = null){
		if(!($id===null)){
			$rs = $this->db->get_where('tbl_pprice', array('p_id' =>$id));
			//print_r($rs);
			return $rs->result_array();
		}
	}

	public function search($key){
		$this->db->like('p_loc', $key, 'both');
		//print_r($this->db->like('p_name', $key, 'both'));
		$this->db->or_like('p_name', $key, 'both');
		$this->db->or_like('pp_topps',$key, 'both');
        // $query = $this->db->get('tbl_pancit');
        $this->db->join('tbl_pprice','tbl_pancit.p_id = tbl_pprice.p_id');
        $query = $this->db->get('tbl_pancit');
        //print_r($query->result_array());
        //return $query->result_array();
        if($query->result_array()){
        	return $query->result_array();
        	//echo 'noob';
        }
        // else{
        // 	show_404();
        // 	//print_r($query->result_array());
        // 	// $this->db->like('pp_topps', $key, 'both');
	       //  // $query1 = $this->db->get('tbl_pprice');
	       //  // //print_r($query1->result_array());
	       //  // $p1['p1p'] = $query1->result_array();
	       //  // //print_r($p1);
	       //  // foreach ($p1['p1p']  as $p1ps){
	       //  // 	//print_r($p1ps['p_id']);
	       //  // 	$
	       //  // 	if($p1ps['p_id']){

	       //  // 	}
	       //  // }
	        
        // }
        
	}

	public function get_comments($id = null){
		if(!($id === null)){
			// echo $id;
			$this->db->select('user_name, pc_id, pc_content, pc_date');
			$this->db->from('tbl_pcomment');
			$this->db->join('tbl_userlogin', 'tbl_pcomment.user_id = tbl_userlogin.user_id','inner');
			$this->db->order_by("pc_date", "desc");
			//$rs = $this->db->get_where('tbl_pcomment', array('p_id' =>$id));
			$rs = $this->db->get_where('', array('p_id' =>$id));		
				return $rs->result_array();
		}
	}

	public function get_live_comments($id = null){
		if(!($id === null)){
			// echo $id;
			$this->db->order_by("pc_date", "desc");
			$rs = $this->db->get_where('tbl_pcomment', array('p_id' =>$id),3);		
				return $rs->result_array();
		}
	}

	public function add_comment($p_id){
		$comment_info = array(
			'pc_content' => $this->input->post('comment_content'),
			'p_id' => $p_id,
			'user_name' => $_SESSION['user_session']['user_name'],
			'pc_date' => date('Y-m-d H:i:s')
		);
		$isComment_added = $this->db->insert('tbl_pcomment', $comment_info);

		if($isComment_added){
			return true;
		}
		else{
			return false;
		}

	}
}
?>