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
		$data['main_content'] = 'banner';
		$this->load->view('back-modules/template', $data);


	}


}