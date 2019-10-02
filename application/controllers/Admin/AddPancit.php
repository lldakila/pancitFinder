<?php 
class AddPancit extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if (!isset($_SESSION['admin_session'])){
		redirect('Admin');
		}
	}

	public function index(){
		$data["title"] = "Add Panciteria | ".$_SESSION['admin_session']['admin_name'];
		$data['devs'] = DEV_NAME;
		
		$this->load->view('templates/head',$data);
		$this->load->view('admin/add_pancit',$data);
		$this->load->view('templates/footer',$data);
		$this->load->view('templates/tail',$data);
	}

	public function ajax_upload(){
		if(isset($_FILES["image_file"]["name"])){
			$config['upload_path'] = './upload/';
			$config['max_size'] = '10000';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('image_file')){
				echo $this->upload->display_errors();
			}
			else{
				$data = $this->upload->data();
				echo '<img src="'.base_url().'upload/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" alt="" />';
				echo '<input type="hidden" name="fileName" id="Filename" value="'.$data["file_name"].'">';
			}
		}
		else{
			redirect('AddPancit');
		}
	}

	public function addpInfo(){
		//main info
		$this->form_validation->set_rules('pname','Pansitan Name','required|trim|is_unique[tbl_pancit.p_name]');
		$this->form_validation->set_rules('fileName','Image Location','required|trim');
		$this->form_validation->set_rules('location','Location','required|trim|is_unique[tbl_pancit.p_loc]');
		$this->form_validation->set_rules('lat','Latitude','required|trim|is_unique[tbl_pancit.p_lat]');
		$this->form_validation->set_rules('lng','Longitude','required|trim|is_unique[tbl_pancit.p_lng]');
		$this->form_validation->set_rules('potime','Time Open','required|trim');
		$this->form_validation->set_rules('pctime','Close Time','required|trim');


		//price list
		$this->form_validation->set_rules('pprice[]', 'Price', 'required|trim');
		$this->form_validation->set_rules('ptopps[]', 'Toppings', 'required|trim');

		if ($this->form_validation->run() === TRUE) {
			$this->load->model('admin/addPancit_model');
			$isAdded = $this->addPancit_model->addPInfo();

			if ($isAdded) {
				echo '<p>Adding Success</p>';
				echo '<p>Panciteria was added successfully</p>';
			}
			else{
				echo '<p>Adding Failed</p>';
				echo '<p>Something went wrong pls try again later.</p>';
			}
			$this->index();
		}
		else{
			$this->index();
		}
	}
}
?>