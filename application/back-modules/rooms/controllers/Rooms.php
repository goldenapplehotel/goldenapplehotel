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
		
		$data['data']	= $this->Rooms_model->getAllRooms();
		$data['main_content'] = 'index';
		$this->load->view('back-modules/template', $data);
		// $data['main_content'] = 'banner/banner';
		// $this->load->view('back-modules/template', $data);

	}

	public function new_room(){
		$data['result'] =   '';
		$data['room_type'] =   '';
		$data['room_feature'] =   '';
		$data['main_content'] = 'add_rooms/new_rooms';
		$this->load->view('back-modules/template', $data);
	}
	public function list_feature()
	{
		$data['data'] =   $this->Rooms_model->getAll();
		$data['main_content'] = 'feature/index';
		$this->load->view('back-modules/template', $data);

	}
	public function new_feature()
	{
		$data['result'] =   '';
		$data['main_content'] = 'feature/new_feature';
		$this->load->view('back-modules/template', $data);

	}

	public function save_feature(){
		$userArray = array(
				'ch_feature' 	            =>$this->input->post('ch_feature'),
				'en_feature' 	            =>$this->input->post('en_feature'),
			);
		$result =$this->db->insert('tbl_features', $userArray);
		redirect('rooms/list_feature');
	}

	public function edit_feature(){

		$id = $this->uri->segment(3);
		$data['result'] =   '';
		$data['row']= $this->Rooms_model->get_feature_by_id($id)->result()[0];
		// var_dump($data['row']);
		$data['main_content'] = 'feature/edit_feature';
		$this->load->view('back-modules/template', $data);
	}

	public function update_feature(){
		$id = $this->input->post('Id');
		$data = array(
			'ch_feature' 	            		=>$this->input->post('ch_feature'),
			'en_feature' 	            		=>$this->input->post('en_feature'),
		);
		$this->db->update('tbl_features', $data,array('Id'=>$id));
		redirect('rooms/list_feature');
	}

	public function list_room_type(){
		$data['data'] =   $this->Rooms_model->getAllRoomType();
		$data['main_content'] = 'rooms_type/index';
		$this->load->view('back-modules/template', $data);
	}

	public function room_type()
	{
		$data['result'] =   '';
		$data['main_content'] = 'rooms_type/list_room_type';
		$this->load->view('back-modules/template', $data);

	}

	public function new_room_type()
	{
		$data['result'] =   '';
		$data['main_content'] = 'rooms_type/new_room_type';
		$this->load->view('back-modules/template', $data);

	}
	public function save_room_type()
	{
		$userArray = array(
				'en_name' 	            =>$this->input->post('en_name'),
				'ch_name' 	            =>$this->input->post('ch_name'),
			);
		$result =$this->db->insert('tbl_rooms_type', $userArray);
		redirect('rooms/list_room_type');

	}

}
?>