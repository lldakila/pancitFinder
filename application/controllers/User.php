<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('PHPMailer/PHPMailerAutoload.php');
class User extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->load->database();
		//trap if admin is already logged in
		if (isset($_SESSION['admin_session'])){
			show_404();
		}
	}

	public function index(){
		$data["title"] = "Login User";
		$data['devs'] = DEV_NAME;

		if (isset($_SESSION['user_session'])){
				redirect('Pancit');
		}
		else{
		$this->load->view('templates/head',$data);
		$this->load->view('user/login',$data);
		$this->load->view('templates/footer',$data);
		$this->load->view('templates/tail',$data);
		}
	}

	public function register(){
		$data["title"] = "Register User";
		$data['devs'] = DEV_NAME;

		$this->load->view('templates/head',$data);
		$this->load->view('user/register',$data);
		$this->load->view('templates/footer',$data);
		$this->load->view('templates/tail',$data);
	}

	public function verify(){
		// echo 'Valid';
		// $this->register();
		$this->form_validation->set_rules('txtfname', 'First Name', 'required|trim|strip_tags|max_length[255]|regex_match[/^[a-zA-ZÑñ\s]+$/]');
		$this->form_validation->set_rules('txtlname', 'Last Name', 'required|trim|strip_tags|max_length[255]|regex_match[/^[a-zA-ZÑñ\s]+$/]');
		$this->form_validation->set_rules('txtemail', 'E-mail', 'required|trim|strip_tags|valid_email|is_unique[tbl_userprofile.up_email]');
		$this->form_validation->set_rules('txtuser', 'Username', 'required|trim|strip_tags|min_length[4]|alpha_dash|is_unique[tbl_userlogin.user_name]');
		$this->form_validation->set_rules('txtpass', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('txtrepass', 'Re-type Password', 'required|matches[txtpass]');

		if($this->form_validation->run() === TRUE){
			$this->load->model('user_model');
			$isRegistered = $this->user_model->register();
			if($isRegistered){
				$mail = new PHPMailer();
				$mail->isSMTP();
				$mail->SMTPAuth = true;
				$mail->Host = 'smtp.gmail.com';
				$mail->Port = '465';
				$mail->isHTML();
				$mail->Username = 'tuguepf@gmail.com';
				$mail->Password = 'percoogsAbroip0';
				$mail->SMTPSecure = 'ssl';
				$mail->setFrom('tuguepf@gmail.com', 'Dakila');

				$mail->Subject = 'Account Registration';
				$mail->Body = '<p>To reset your password pls click this link: <a href="'.base_url('confirm-account/'.md5($this->input->post('txtemail'))).'">Confirm Account Now</a></p><p>Ignore if you have not registered.</p>';
				$mail->addAddress($this->input->post('txtemail'));

				$mail->Send();

				if($mail->Send()){
					$data['title'] = 'Registration Successful';
					$data['message'] = 'Account successfuly added.<p>Please check your email</p>';

					$data['devs'] = DEV_NAME;

					$this->load->view('templates/head',$data);
					$this->load->view('user/register_msg',$data);
					$this->load->view('templates/footer',$data);
					$this->load->view('templates/tail',$data);
				}
				else{
					$data['title'] = 'Registraion Succcessful | Something went wrong';
					$data['message'] = 'You have been registered successfuly but an email was not sent.<br>'.$mail->ErrorInfo;
					
					$data['devs'] = DEV_NAME;

					$this->load->view('templates/head',$data);
					$this->load->view('user/register_msg',$data);
					$this->load->view('templates/footer',$data);
					$this->load->view('templates/tail',$data);
				}
			}
			else{
				$data['title'] = 'Registraion Failed';
				$data['message'] = 'Something wnet wrong. Please try again later.';
			}
		}
		else{
			$this->register();
		}

	}

	public function login(){
		$data["title"] = "Login User";
		$data['devs'] = DEV_NAME;

		if (isset($_SESSION['user_session'])){
				redirect('Pancit');
		}
		else{
		$this->load->view('templates/head',$data);
		$this->load->view('user/login',$data);
		$this->load->view('templates/footer',$data);
		$this->load->view('templates/tail',$data);
		}
	}

	public function login_verify(){
		$this->form_validation->set_rules('txtuser','Username', 'required|trim');
  	$this->form_validation->set_rules('txtpass', 'Password', 'required|trim|callback_check_user');

  	if ($this->form_validation->run() === TRUE){
		redirect('Pancit');
		// return true;
  	}
  	else{  
			//$this->login();	
  		redirect('Pancit');
  	}
	}

	public function check_user(){
	  $username = $this->input->post('txtuser');
	  $password = $this->input->post('txtpass');

	  $login_user = $this->user_model->login($username, $password);

	  if($login_user){
			$sess_user = array(
		  	 'user_name' =>$login_user['user_name'],
		     'user_lvl' => $login_user['user_lvl'],
		     'user_id' => $login_user['user_id'],
		     'up_id' => $login_user['up_id'],
		  	 'islogged' => TRUE
			);
			$this->session->set_userdata('user_session',$sess_user);
			return true;
	  }
	  else{
	  	$this->session->set_flashdata('yes', 'Invalid username or password');
			$this->form_validation->set_message('check_user','Invalid username/password');
			return false;
	  }
	}

	public function logout(){
		if(!(isset($_SESSION['user_session']))){
				redirect('Pancit');	
			}
		else{
		$session_array = array('user_name', 'user_lvl', 'user_id', 'up_id', 'islogged');
		$this->session->unset_userdata($session_array);
		$this->session->sess_destroy();

		redirect('Pancit');
		}
	}

	public function add_comment(){
		$this->form_validation->set_rules('comment_content', 'Comment content', 'required|strip_tags|trim');

		if($this->form_validation->run() === TRUE){
			$commentAdded = $this->user_model->add_comment();
			if($commentAdded){
				return true;
			}
			else{
				return false;
			}


		}
	}	


}
?>