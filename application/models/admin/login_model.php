<?php 
	class login_model extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();	

		}

		public function login($username, $password){
			// $condition_array = array(
			// 	'admin_uname' => $username,
			// 	password_verify($password,'admin_pwd')
			// 	);
			// $rs = $this->db->get_where('tbl_admin', $condition_array);
			// $row_count = count($rs->row_array());

			// if ($row_count > 0){
			// 	return $rs->row_array();
			// }
			// else{
			// 	return FALSE;
			// }

			$this->db->where('admin_uname', $username);
			$acct = $this->db->get('tbl_admin')->row();
			// print_r ($acct);

			if($acct != NULL){
				if (password_verify($password, $acct->admin_pwd)) {
					//echo 'password match';
					$rs = $this->db->get('tbl_admin');
					$row_count = count($rs->row_array());
					if ($row_count > 0){	
						return $rs->row_array();
					}
					else{
						return FALSE;
					}
				}
			}
		}
	}
 ?>