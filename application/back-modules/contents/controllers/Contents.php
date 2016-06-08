<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contents extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('is_logged_in')) {
			redirect('auths');
		}
		$this->load->model('Contents_model');

	}

	public function index()
	{
		$data['main_content'] = 'index';
		$this->load->view('back-modules/template', $data);


	}

	public function main_gallery()
	{
		$data['main_gallery'] = $this->Contents_model->get_all_main_gallery();
		$data['main_content'] = 'gallery/main-gallery';
		$this->load->view('back-modules/template', $data);


	}

	public function sub_gallery()
	{
		$id = $this->uri->segment(3);
		$data['sub_gallery'] = $this->Contents_model->get_all_sub_gallery($id);
		$data['main_content'] = 'gallery/sub-gallery';
		$this->load->view('back-modules/template', $data);


	}

	public function new_main_gallery()
	{
		$data['banner'] = $this->Contents_model->getAll();
		$data['main_content'] = 'gallery/new-main-gallery';
		$this->load->view('back-modules/template', $data);

	}

	public function new_sub_gallery()
	{
		$data['result'] = '';
		$data['main_content'] = 'gallery/new-sub-gallery';
		$this->load->view('back-modules/template', $data);

	}
	public function banner()
	{
		$data['banner']	= $this->Contents_model->getAll();
		$data['main_content'] = 'banner/banner';
		$this->load->view('back-modules/template', $data);

	}

	public function new_banner()
	{
		$data['result'] =   '';
		$data['main_content'] = 'banner/new-banner';
		$this->load->view('back-modules/template', $data);

	}
	public function edit_banner()
	{
		$id = $this->uri->segment(3);
		$data['banner_row']= $this->Contents_model->get_banner_by_id($id);
		$data['main_content'] = 'banner/edit';
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
			$data['result'] = 'message:'.$this->upload->display_errors();
			$data['main_content'] = 'banner/new-banner';
			$this->load->view('back-modules/template', $data);

		}


	}

	public function update_banner(){

		$id = $this->input->post('Id');
		$row = $this->Contents_model->get_banner_by_id($id);

		$config1 = array(
			'upload_path'	=>FILE_UPLOAD_PATH.'/banner/',
			'allowed_types'	=>ALLOWED_TYPES,
			'max_size'		=>FILE_UPLOAD_MAX_SIZE,
			'encrypt_name' 	=>TRUE,
			'remove_spaces'	=>TRUE
		);
		$this->load->library('upload', $config1);
		if(!$this->upload->do_upload('file_name')) {
			$photo = $row->url;
		} else {
			@unlink(FILE_UPLOAD_PATH.'/banner/'.$row->url);
			$photo = $this->upload->file_name;
			$this->load->library('image_lib');

		}
		$data = array(
			'en_title' 	            		=>$this->input->post('en_title'),
			'ch_title' 	            		=>$this->input->post('ch_title'),
			'en_comfortable_title' 	    	=>$this->input->post('en_comfort_title'),
			'ch_comfortable_title' 	     	=>$this->input->post('ch_comfort_title'),
			'en_description' 	            =>$this->input->post('en_des'),
			'ch_description' 	            =>$this->input->post('ch_des'),
			'url'                           =>$photo
		);
		$this->db->update('tbl_banner', $data,array('Id'=>$id));
		redirect('contents/banner');
	}

	public function save_main_gallery(){

		if(!$this->input->post('status')){

			$status = 1;
		}else{
			$status = 0;
		}
		$data = array(
			'en_name' 	            =>$this->input->post('en_title'),
			'ch_name' 	            =>$this->input->post('ch_title'),
			'_status' 	            =>$status
		);

		$this->Contents_model->save_main_gallery($data);
		redirect('contents/main_gallery');
	}

	public function save_sub_gallery(){

		if(!$this->input->post('status')){
			$status = 1;
		}else{
			$status = 0;
		}
		$config = array(
			'upload_path'	=>FILE_UPLOAD_PATH.'/gallery/',
			'allowed_types'	=>ALLOWED_TYPES,
			'max_size'		=>FILE_UPLOAD_MAX_SIZE,
			'encrypt_name'	=>TRUE,
			'remove_spaces'	=>TRUE
		);
		$this->load->library('upload', $config);
		if($this->upload->do_upload('file_name')){
			$this->load->library('image_lib');
			$userArray = array(
				'title' 	            =>$this->input->post('title'),
				'_status' 	            =>$status,
				'type' 	    			=>$this->input->post('Id'),
				'url'                  =>$this->upload->file_name,

			);
			$this->db->insert('tbl_gallerys', $userArray);
			redirect('contents/sub_gallery/'.$this->input->post('Id'));
		}else{
			$data['result'] = 'message:'.$this->upload->display_errors();
			redirect('contents/new_sub_gallery/'.$this->input->post('Id'));

		}


	}
}