<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 class User_model extends CI_Model{
 	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function register(){
		//password
		$options = [
    		'cost' => 12,
			];

		$personal_info = array(
			'up_fname' => $this->input->post('txtfname'),
			'up_lname' => $this->input->post('txtlname'),
			'up_email' => $this->input->post('txtemail'),
			'up_dateReg' => date('Y-m-d H:i:s')
		);

		$isUserInfo_added = $this->db->insert('tbl_userprofile',$personal_info);

		//$lup_id = $this->db->insert_id();
		$userAccess_info = array(
			'user_name' => $this->input->post('txtuser'),
			'user_pass' => password_hash($this->input->post('txtpass'), PASSWORD_BCRYPT, $options),
			'user_lvl' => 2,
			'up_id' => $this->db->insert_id(),
			'isApproved' => 0
		);
		$isUser_added = $this->db->insert('tbl_userlogin',$userAccess_info);

		if ($isUserInfo_added && $isUser_added) {
			return true;
		}
		else{
			return false;
		}
	}

	public function login($username, $password){
		$this->db->where('user_name', $username);
			$acct = $this->db->get('tbl_userlogin')->row();
			// print_r ($acct);

			if($acct != NULL){
				if (password_verify($password, $acct->user_pass)) {
					// echo 'password match';
					$this->db->where('user_name', $username);
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