<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rooms extends MX_Controller
{
	var $ci;
	public function __construct()
	{
		parent::__construct();
		$this->ci = &get_instance();
		if (!$this->session->userdata('is_logged_in')) {
			redirect('auths');
		}
		$this->load->model('Rooms_model');
		$this->load->model('Mo_Apple');
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
		$data['room_type'] =   $this->Rooms_model->getAllRoomType();
		$data['room_feature'] =   $this->Rooms_model->getAllFeatures();
		$data['main_content'] = 'add_rooms/new_rooms';
		$data['data']	= '';
		$this->load->view('back-modules/template', $data);
	}

	public function save_room(){
		
		$config = array(
			'upload_path'	=>FILE_UPLOAD_PATH.'/room/',
			'allowed_types'	=>ALLOWED_TYPES,
			'max_size'		=>FILE_UPLOAD_MAX_SIZE,
			'encrypt_name'	=>TRUE,
			'remove_spaces'	=>TRUE
		);
		$this->load->library('upload', $config);
		if($this->upload->do_upload('file_name')){
			$this->load->library('image_lib');


			$inData = func_get_post_array($this->ci->input->post('values')); 
			$inData['feature']=func_get_post_array_checkbox($this->ci->input->post('sch_checkbox'));
			$inData['url'] =$this->upload->file_name;
			$idx = $this->ci->Mo_Apple->insert('tbl_rooms',$inData);
			
			if($idx){
				$num_imageUpload = count($_FILES['file_namethum']['name']);
				for ($i = 0; $i < $num_imageUpload; $i++) {
					if($this->upload->do_upload('file_namethum',$i)){	
						$inDataGallery = array(
							'rooms_id'	=>$idx,
							'url'	=>$this->upload->file_name,
						);
						$result=$this->db->insert('tbl_rooms_gallery',$inDataGallery);
					}
				}
			}
			
			redirect('Rooms');
		}else{
			$data['result'] = 'message:'.$this->upload->display_errors();
			$data['main_content'] = 'Rooms/new_room';
			$this->load->view('back-modules/template', $data);

		}
		
	}

	public function edit_room(){
		
		$Id = $this->uri->segment(3);
		$resultData = $this->Rooms_model->getRoomById($Id)->result();
		$data['result'] =   '';
		$data['data']	= '';
		$data['room_type'] =   $this->Rooms_model->getAllRoomType();
		$data['room_feature'] =   $this->Rooms_model->getAllFeatures();
		$data['Thumbnail']= $this->Rooms_model->getRoomGalleryByRoomId($Id);
		$data['main_content'] = 'add_rooms/edit_rooms';
		if($resultData){
			$data['data']	= $resultData[0];
		}
		
		$this->load->view('back-modules/template', $data);
	}

	public function update_room(){
		
		$inData = func_get_post_array($this->ci->input->post('values')); 
		// var_dump($inData);
		// exit();
		$Id = $inData['Id'];

		$where = array('Id' =>$Id);
		$config = array(
			'upload_path'	=>FILE_UPLOAD_PATH.'/room/',
			'allowed_types'	=>ALLOWED_TYPES,
			'max_size'		=>FILE_UPLOAD_MAX_SIZE,
			'encrypt_name'	=>TRUE,
			'remove_spaces'	=>TRUE
		);
		if($this->ci->input->post('sch_checkbox')){
			$inData['feature']=func_get_post_array_checkbox($this->ci->input->post('sch_checkbox'));
		}
		
		$num_imagefile = count($_FILES['file_name']['name']);
		if($_FILES['file_name']['size'] >0){
			$this->load->library('upload', $config);
			if($this->upload->do_upload('file_name')){
				$this->load->library('image_lib');
				
				$inData['url'] =$this->upload->file_name;
				$idx = $this->ci->Mo_Apple->Update_Data($inData,$where,'tbl_rooms');
				
				if($idx === TRUE){
					$num_imageUpload = count($_FILES['file_namethum']['name']);
					for ($i = 0; $i < $num_imageUpload; $i++) {
					if($this->upload->do_upload('file_namethum',$i)){	
						$inDataGallery = array(
							'rooms_id'	=>$Id,
							'url'	=>$this->upload->file_name,
						);
						if($_FILES['file_namethum']['size'][$i] >0){
							$result=$this->db->insert('tbl_rooms_gallery',$inDataGallery);
						}
					}
				}
				}
			}
		}else{
			$idx = $this->ci->Mo_Apple->Update_Data($inData,$where,'tbl_rooms');
			if($idx === TRUE){
				$num_imageUpload = count($_FILES['file_namethum']['name']);
				// echo $num_imageUpload;
				$this->load->library('upload', $config);
				for ($i = 0; $i < $num_imageUpload; $i++) {
					if($this->upload->do_upload('file_namethum',$i)){	
						$inDataGallery = array(
							'rooms_id'	=>$Id,
							'url'	=>$this->upload->file_name,
						);
						if($_FILES['file_namethum']['size'][$i] >0){
							$result=$this->db->insert('tbl_rooms_gallery',$inDataGallery);
						}
					}
				}
				// var_dump($_FILES['file_namethum']['size']);
			}

		}
		
        // exit;
		redirect('Rooms');
		
	}

	public function delete_room(){
		$Id = $this->uri->segment(3);
		$where = array('Id' =>$Id);
		$this->ci->Mo_Apple->delete_data('tbl_rooms',$Id);
		redirect('Rooms');
	}
	public function list_feature()
	{
		$data['data'] =   $this->Rooms_model->getAllFeatures();
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


	public function delete_room_thun(){
		$RoomId = $this->uri->segment(3);
		$Id =  $this->uri->segment(4);
		$this->Rooms_model->deleteGalleryById($Id);
		redirect('rooms/edit_room/'.$RoomId);
	}

}
?>