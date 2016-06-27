<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools extends MX_Controller
{
	var $ci;
	public function __construct()
	{
		parent::__construct();
		$this->ci = &get_instance();
		if (!$this->session->userdata('is_logged_in')) {
			redirect('auths');
		}
		$this->load->model('Mo_Apple');
	}

	public function index()
	{
		
		$data['data']	= $this->Mo_Apple->getAllRooms();
		$data['main_content'] = 'Tools/index';
		$this->load->view('back-modules/template', $data);

	}

	// public function tools_status_update(){
	// 	$Id = $this->uri->segment(3);

	// 	return 

	// }

	public function  tools_status_update(){
		$id=$this->ci->input->post('Id');
		$inData['front_status'] = $this->ci->input->post('front_status');
		$where = array('Id' =>$id);
		$result = $this->ci->Mo_Apple->Update_Data($inData,$where,'tbl_rooms');
		// echo (json_encode($inData));
		echo $result;
	}
}
?>