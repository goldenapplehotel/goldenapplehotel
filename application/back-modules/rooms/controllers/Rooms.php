<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rooms extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('is_logged_in')) {
			redirect('auths');
		}
		$this->load->model('Rooms_model');

	}

	public function index()
	{
		$data['main_content'] = 'index';
		$this->load->view('back-modules/template', $data);


	}
	public function room_feature()
	{
		$data['main_content'] = 'feature/index';
		$this->load->view('back-modules/template', $data);


	}

	public function room_type()
	{
		$data['main_content'] = 'rooms_type/room_types';
		$this->load->view('back-modules/template', $data);


	}

	public function add_room()
	{
		$data['main_content'] = 'add_rooms/add_rooms';
		$this->load->view('back-modules/template', $data);


	}

}
?>