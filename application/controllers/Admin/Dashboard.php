<?php 
	class Dashboard extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('pancit_model');
			$this->load->helper('url_helper');
			if (!(isset($_SESSION['admin_session']))){
				redirect('Admin');
			}
			$this->load->database();
			$this->load->model('pancit_model');
		}

		public function index(){
			$data['pancits'] = $this->pancit_model->get_pancit();
			$data["title"] = "Welcome ".$_SESSION['admin_session']['admin_name'];
			$data['devs'] = DEV_NAME;

			$this->load->view('templates/head',$data);
			//$this->load->view('admin/admin_dash',$data);
			$this->load->view('templates/nav',$data);
			$this->load->view('admin/admin_dashboard',$data);
			$this->load->view('templates/footer',$data);
			$this->load->view('templates/tail',$data);
		}

		public function edit_pancit($p_id){
			if ($p_id) {
				$data['pancits'] = $this->pancit_model->get_pancit($p_id);
				$data['pprices'] = $this->pancit_model->get_pprice($p_id);

				if ($data['pancits'] && $data['pprices']) {
				$data["title"] = "Edit Panciteria | ".$_SESSION['admin_session']['admin_name'];
				$data['devs'] = DEV_NAME;
				//$data['p_id'] = htmlspecialchars($_GET('p_id'));
				
				$this->load->view('templates/head',$data);
				$this->load->view('admin/edit_pancit',$data);
				$this->load->view('templates/footer',$data);
				$this->load->view('templates/tail',$data);
				}
				else{
					show_404();
				}
			}
			else{
				show_404();
			}
		}
	}
?>