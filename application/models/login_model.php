<?php 
	class login_model extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();	

		}

		public function login($username, $password){
			$this->db->where('user_name', $username);
			$acct = $this->db->get('tbl_userlogin')->row();
			//print_r ($acct);

			if($acct != NULL){
				if (password_verify($password, $acct->user_pass)) {
					//print_r('password match');
					$rs = $this->db->get('tbl_userlogin');
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