<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contents extends MX_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('is_logged_in')){
			redirect('auths');
		}
	}
	public function index()
	{
		$data['main_content'] = 'index';
		$this->load->view('back-modules/template', $data);


	}

	public function banner()
	{
		$data['main_content'] = 'banner/banner';
		$this->load->view('back-modules/template', $data);

	}

	public function new_banner()
	{
		$data['main_content'] = 'banner/new-banner';
		$this->load->view('back-modules/template', $data);

	}

	public function save_banner(){

		$config = array(
			'upload_path'	=>FILE_UPLOAD_PATH.'/banner/',
			'allowed_types'	=>ALLOWED_TYPES,
			'max_size'		=>FILE_UPLOAD_MAX_SIZE,
			'encrypt_name'	=>TRUE,
			'remove_spaces'	=>TRUE
		);
		$this->load->library('upload', $config);
		if($this->upload->do_upload('file_name')){
			$this->load->library('image_lib');
			$userArray = array(
				'en_title' 	            =>$this->input->post('en_title'),
				'ch_title' 	            =>$this->input->post('ch_title'),
				'en_comfortable_title' 	    =>$this->input->post('en_comfort_title'),
				'ch_comfortable_title' 	     =>$this->input->post('ch_comfort_title'),
				'en_description' 	            =>$this->input->post('en_des'),
				'ch_description' 	            =>$this->input->post('ch_des'),
				'url'                  =>$this->upload->file_name,

			);
			$this->db->insert('tbl_banner', $userArray);
			redirect('contents/banner');
		}else{
			$result = array('code'=>0,'message'=>$this->upload->display_errors());
		}

		return $result;
	}

}