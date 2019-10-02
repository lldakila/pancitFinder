<?php 
class EditPancit extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if (!isset($_SESSION['admin_session'])){
		redirect('Admin');
		}
	}

	public function index(){
		$data["title"] = "Edit Panciteria | ".$_SESSION['admin_session']['admin_name'];
		$data['devs'] = DEV_NAME;
		$data['p_id'] = htmlspecialchars($_GET('p_id'))
		
		$this->load->view('templates/head',$data);
		$this->load->view('admin/edit_pancit',$data);
		$this->load->view('templates/footer',$data);
		$this->load->view('templates/tail',$data);
	}
}
?>