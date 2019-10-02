<?php 
class addPancit_model extends CI_Model{
	public function __construct(){
	parent::__construct();
	$this->load->database();
	}

	public function addPInfo(){
		$isppInfo_added = false;

		//pancit info first before price because of foreign key ata?
		$p_info = array(
			'p_name' => $this->input->post('pname'),
			'p_imgLoc' => $this->input->post('fileName'),
			'p_loc' => $this->input->post('location'),
			'p_lat' => $this->input->post('lat'),
			'p_lng' => $this->input->post('lng'),
			'p_oTime' => $this->input->post('potime'),
			'p_cTime' => $this->input->post('pctime'),
		);

		$ispInfo_added = $this->db->insert('tbl_pancit',$p_info);

		$lp_id = $this->db->insert_id();


		$pprice = $_POST['pprice'];
		$ptopps = $_POST['ptopps'];

		foreach($pprice AS $key => $value){
			//echo $value;
			$pp_info = array(
			'pp_price' => $value,
			'pp_topps' => $ptopps[$key],
			'p_id' => $lp_id
			);

			$isppInfo_added = $this->db->insert('tbl_pprice',$pp_info);
		}



		

		if ($ispInfo_added && $isppInfo_added){
			return true;
		}
		else{
			return false;
		}
	}
}
?>