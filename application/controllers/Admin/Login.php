<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	class Login extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->database();	

		}

		public function index(){
			$data['title'] = 'Admin | Login';
			$data['devs'] = DEV_NAME;
			
			if (isset($_SESSION['user_session'])){
				show_404();
			}
			elseif (isset($_SESSION['admin_session'])){
				redirect('Admin/Dashboard');
			}
			else{
			$this->load->view('templates/head', $data);
			$this->load->view('admin/admin_login', $data);
			$this->load->view('templates/footer',$data);
			$this->load->view('templates/tail', $data);
			}
		}

		public function verify(){
			$this->form_validation->set_rules('txtuser','Username', 'required');
			$this->form_validation->set_rules('txtpass', 'Password', 'required|callback_check_user');

			if ($this->form_validation->run() === TRUE){
				redirect('Admin/Dashboard');
			}
			else{	
				$this->index();
			}
		}

		public function check_user(){
			$username = $this->input->post('txtuser');
			$password = $this->input->post('txtpass');

			$this->load->model('admin/login_model');
			$login = $this->login_model->login($username, $password);

			if($login){
				$sess_admin = array(
					'admin_name' =>$login['admin_aname'],
					'access' => 'admin',
					'islogged' => TRUE
				);
				$this->session->set_userdata('admin_session',$sess_admin);
				return true;
			}
			else{
				$this->form_validation->set_message('check_user','Invalid username/password');
				return false;
			}
		}
	}
 ?>