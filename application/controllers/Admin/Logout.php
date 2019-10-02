<?php 
	class Logout extends CI_Controller{
		public function __construct(){
			parent::__construct();
			if(!(isset($_SESSION['admin_session']))){
				redirect('Admin');	
			}
		}

		public function index(){
			unset($_SESSION['admin_session']);
			redirect('Admin');
		}
	}
 ?>