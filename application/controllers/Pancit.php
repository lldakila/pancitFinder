<?php 
class Pancit extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('pancit_model');
		$this->load->helper('url_helper');

		// $tmp_p_id;
	}

	public function index(){
		$this->load->database();

		$data['pancits'] = $this->pancit_model->get_pancit();
		$data['title'] = 'Pancit Finder | Home';
		$data['devs'] = DEV_NAME;

		$this->load->view('templates/head', $data);
		$this->load->view('templates/nav', $data);
		$this->load->view('templates/page-header', $data);
		$this->load->view('pancit/home',$data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/tail', $data);
	}

	public function pview($p_id){
		// echo $p_id;
		//$tmp_p_id = $p_id;
		// echo $tmp_p_id;
		if ($p_id) {
			//$this->load->model("pancit_model");
			$data['pancits'] = $this->pancit_model->get_pancit($p_id);
			$data['pprices'] = $this->pancit_model->get_pprice($p_id);
			// $data['comments'] = $this->pancit_model->get_comments($p_id);


			if ($data['pancits'] && $data['pprices']) {
				$data['title'] = $data['pancits']['p_name'] . '|Pancit Finder';
				$data['devs'] = DEV_NAME;

				$this->load->view('templates/head', $data);
				$this->load->view('templates/nav', $data);
				$this->load->view('pancit/pview',$data);
				$this->load->view('templates/footer', $data);
				$this->load->view('templates/tail', $data);
			}
			else{
				show_404();
			}
		}
		else{
			$this->index();
			//show_404();
		}
	}

	public function spancit(){
		//|strip_tags|max_length[255]|regex_match[/^[a-zA-ZÑñ\s]+$/]
		// $this->form_validation->set_rules('spansi', 'Search', 'required|trim');
		// if($this->form_validation->run() === TRUE){
			$key = $this->input->get('spansi');
		    $data['pancits'] = $this->pancit_model->search($key);

		    $data['title'] = 'Pancit Finder | Seach';
			$data['devs'] = DEV_NAME;

			$this->load->view('templates/head', $data);
			$this->load->view('templates/nav', $data);
			$this->load->view('templates/page-header', $data);
		    $this->load->view('pancit/spview', $data);
		    $this->load->view('templates/footer', $data);
			$this->load->view('templates/tail', $data);
		//}
		// else{
		// 	//show_404();
		// 	$key = $this->input->get('spansi');
		// 	$data['message'] = $key;
		// 	$data['pancits'] = '';
		// 	$data['title'] = 'Pancit Finder | Seach';
		// 	$data['devs'] = DEV_NAME;

		// 	$this->load->view('templates/head', $data);
		// 	$this->load->view('templates/nav', $data);
		// 	$this->load->view('templates/page-header', $data);
		//     $this->load->view('pancit/spview', $data);
		//     $this->load->view('templates/footer', $data);
		// 	$this->load->view('templates/tail', $data);
		// }
	}

	public function fetch_comment($p_id){
		$comments = $this->pancit_model->get_comments($p_id);

		foreach($comments as $comment){
        echo '
          <div class="panel panel-default">
            <div class="panel-heading">By <b>'.$comment['user_name'].'</b> on <i>'.date('M-d-Y h:ia', strtotime($comment['pc_date'])).'</i></div>
            <div class="panel-body">'.$comment['pc_content'].'</div>
            
          </div>
          ';
          //<div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="1">Reply</button></div>
      	} 

	}

	public function add_comment($p_id){
		$this->form_validation->set_rules('comment_content', 'Comment content', 'required|strip_tags|trim');

		if($this->form_validation->run() === TRUE){
		$commentAdded = $this->pancit_model->add_comment($p_id);
			if($commentAdded){
				//return true;
				//$this->pview($p_id);
				$error = '<label class="text-success">Comment Added</label>';
				$data = array(
				 'error'  => $error
				);
				echo json_encode($data);
			}
			else{
				// return false;
				//echo 'Something went wrong';
				$error = '<label class="text-success">something went wrong</label>';
				$data = array(
				 'error'  => $error
				);
				echo json_encode($data);
			}
		}
		else{
			echo validation_errors();
		}
	}
}
 ?>