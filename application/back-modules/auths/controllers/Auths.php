<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auths extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Auths_model');
	}
	
	public function index()
	{
		$this->load->view('index');
		
	}

	public function validate_credentials()
	{
		$user_name 	= $this->input->post('user_name');
		$password 	= md5($this->input->post('password'));
		$is_valid 	= $this->Auths_model->validate($user_name, $password);

		if($is_valid == 1){ 	// Correct username and password

			$data = array(
				'user_name' 	=>$user_name,
				'is_logged_in' 	=>TRUE
			);
			$last_login =  array(
				'last_login'=>date("Y-m-d H:i:s")
			);

			$this->db->update('ci_user',$last_login,array('user_name'=>$user_name));
			$this->session->set_userdata($data);
			redirect('contents/index');

		}elseif($is_valid==0){ // username hase been disabled
			$data['is_disabled'] = TRUE;
			$this->load->view('index', $data);
		}
		else // username not found in database
		{
			$data['not_found'] = TRUE;
			$this->load->view('index', $data);
		}
	}

	public function logout(){
		$newdata = array(
			'user_name'  =>'',
			'is_logged_in' => FALSE
		);
		$this->session->unset_userdata($newdata);
		$this->session->sess_destroy();
		redirect('auths');
	}
}