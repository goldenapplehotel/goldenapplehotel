<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contents extends MX_Controller
{
	var $ci;
	public function __construct()
	{
		parent::__construct();
		$this->ci = &get_instance();
		if (!$this->session->userdata('is_logged_in')) {
			redirect('auths');
		}
		$this->load->model('Contents_model');
		$this->load->model('Mo_Apple');
	}

	public function index()
	{
		$data['main_content'] = 'index';
		$this->load->view('back-modules/template', $data);


	}

	public function change_password()
	{
		$data['main_content'] = 'change-password';
		$this->load->view('back-modules/template', $data);


	}
	
	public function process_change_password(){

		$c_password = md5($this->input->post('c_pass'));
		$new_password = $this->input->post('n_pass');
		$con_password = $this->input->post('con_pass');
		$user_name = $this->session->userdata('user_name');
		$get_password = $this->Contents_model->get_user_admin_pass($user_name);

		if($get_password->password != $c_password){
			$json = array('sms'=>1);
			return $this->output->set_content_type('application/json')->set_output(json_encode($json));
		}
		if($new_password != $con_password){
			$json = array('sms'=>0);
			return $this->output->set_content_type('application/json')->set_output(json_encode($json));
		}else{

			$data  = array('password'=>md5($new_password));
			$this->db->update('ci_user', $data,array('user_name'=>$user_name));
			$json = array('sms'=>2);
			return $this->output->set_content_type('application/json')->set_output(json_encode($json));
		}

	}
	public function main_gallery()
	{
		$data['main_gallery'] = $this->Contents_model->get_all_main_gallery();
		$data['main_content'] = 'gallery/main-gallery';
		$this->load->view('back-modules/template', $data);


	}
	public function edit_main_gallery()
	{
		$id = $this->uri->segment(3);
		$data['main_gallery'] = $this->Contents_model->get_all_main_gallery_by_id($id);
		$data['main_content'] = 'gallery/edit-main-gallery';
		$this->load->view('back-modules/template', $data);


	}

	public function sub_gallery()
	{
		$id = $this->uri->segment(3);
		$data['sub_gallery'] = $this->Contents_model->get_all_sub_gallery($id);
		$data['main_gallery'] = $this->Contents_model->get_main_gallery_by_id($id);
		$data['main_content'] = 'gallery/sub-gallery';
		$this->load->view('back-modules/template', $data);


	}

	public function edit_sub_gallery()
	{
		$id = $this->uri->segment(3);
		$data['result'] =   '';
		$data['sub_gallery'] = $this->Contents_model->get_sub_gallery_by_id($id);
		$data['main_content'] = 'gallery/edit-sub-gallery';
		$this->load->view('back-modules/template', $data);


	}

	public function new_main_gallery()
	{
		$data['banner'] = $this->Contents_model->getAll();
		$data['main_content'] = 'gallery/new-main-gallery';
		$this->load->view('back-modules/template', $data);

	}
	public function process_edit_main_gallery()
	{
		$id = $this->input->post('Id');
		if($this->input->post('status') == 'on'){

			$status = 1;
		}else{
			$status = 0;
		}
		$data = array(
			'en_name' 	            =>$this->input->post('en_title'),
			'ch_name' 	            =>$this->input->post('ch_title'),
			'_status' 	            =>$status,

		);
		$this->db->update('tbl_main_gallery', $data,array('Id'=>$id));
		redirect('contents/main_gallery');

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
		if($this->input->post('status') == 'on'){
			$status = 1;
		}else{
			$status = 0;
		}
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
				'_status' 	            =>$status

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

		if($this->input->post('status')){

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

		if($this->input->post('status')){
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
				'create_date' 	            =>$this->input->post('create_date'),
				);
			$this->db->insert('tbl_gallerys', $userArray);
			redirect('contents/sub_gallery/'.$this->input->post('Id'));
		}else{
			$data['result'] = 'message:'.$this->upload->display_errors();
			redirect('contents/new_sub_gallery/'.$this->input->post('Id'));

		}


	}

	public function save_edit_sub_gallery(){

		if($this->input->post('status') == 'on'){
			$status = 1;
		}else{
			$status = 0;
		}
		$id = $this->input->post('Id');
		$id_re = $this->input->post('Id_Re');
		$row = $this->Contents_model->get_sub_gallery_by_id($id);

		$config1 = array(
			'upload_path'	=>FILE_UPLOAD_PATH.'/gallery/',
			'allowed_types'	=>ALLOWED_TYPES,
			'max_size'		=>FILE_UPLOAD_MAX_SIZE,
			'encrypt_name' 	=>TRUE,
			'remove_spaces'	=>TRUE
		);
		$this->load->library('upload', $config1);
		if(!$this->upload->do_upload('file_name')) {
			$photo = $row->url;
		} else {
			@unlink(FILE_UPLOAD_PATH.'/gallery/'.$row->url);
			$photo = $this->upload->file_name;
			$this->load->library('image_lib');

		}
		$data = array(
			'title' 	            =>$this->input->post('title'),
			'_status' 	            =>$status,
			'url'                  =>$photo,
			'create_date'			=>$this->input->post('create_date')
		);
		$this->db->update('tbl_gallerys', $data,array('Id'=>$id));
		redirect('contents/sub_gallery/'.$id_re);

	}

	public function explores()
	{
		$data['explore'] = $this->Contents_model->get_all_explore();
		$data['main_content'] = 'explore/index';
		$this->load->view('back-modules/template', $data);


	}
	public function new_explore()
	{
		$data['result'] = '';
		$data['main_content'] = 'explore/add_explore';
		$this->load->view('back-modules/template', $data);


	}

	public function edit_explore()
	{
		$id = $this->uri->segment(3);
		$data['explore'] = $this->Contents_model->get_explore_by_id($id);
		$data['result'] = '';
		$data['main_content'] = 'explore/edit_explore';
		$this->load->view('back-modules/template', $data);


	}

	public function save_explore(){

		if($this->input->post('status')=='on'){
			$status = 1;
		}else{
			$status = 0;
		}

		$config = array(
			'upload_path'	=>FILE_UPLOAD_PATH.'/explore/',
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
				'en_description' 	            =>$this->input->post('en_des'),
				'ch_description' 	            =>$this->input->post('ch_des'),
				'img'                  =>$this->upload->file_name,
				'_status'			=>$status

			);
			$this->db->insert('tbl_explores', $userArray);
			redirect('contents/explores');
		}else{
			$data['result'] = 'message:'.$this->upload->display_errors();

		}

	}

	public function update_explore(){

		if($this->input->post('status')=='on'){
			$status = 1;
		}else{
			$status = 0;
		}
		$id = $this->input->post('Id');
		$row = $this->Contents_model->get_explore_by_id($id);

		$config1 = array(
			'upload_path'	=>FILE_UPLOAD_PATH.'/explore/',
			'allowed_types'	=>ALLOWED_TYPES,
			'max_size'		=>FILE_UPLOAD_MAX_SIZE,
			'encrypt_name' 	=>TRUE,
			'remove_spaces'	=>TRUE
		);
		$this->load->library('upload', $config1);
		if(!$this->upload->do_upload('file_name')) {
			$photo = $row->img;
		} else {
			@unlink(FILE_UPLOAD_PATH.'/explore/'.$row->img);
			$photo = $this->upload->file_name;
			$this->load->library('image_lib');

		}
		$data = array(
			'en_title' 	            		=>$this->input->post('en_title'),
			'ch_title' 	            		=>$this->input->post('ch_title'),
			'en_description' 	            =>$this->input->post('en_des'),
			'ch_description' 	            =>$this->input->post('ch_des'),
			'img'                           =>$photo,
			'_status'						=>$status
		);
		$this->db->update('tbl_explores', $data,array('Id'=>$id));
		redirect('contents/explores');

	}
	public function news(){

		$data['news'] = $this->Contents_model->get_all_news();
		$data['main_content'] = 'news/list_news';
		$this->load->view('back-modules/template', $data);
	}

	public function new_news(){
		$data['result'] = '';
		$data['news'] = $this->Contents_model->get_all_news();
		$data['main_content'] = 'news/add_news';
		$this->load->view('back-modules/template', $data);
	}

	public function edit_news(){
		$id = $this->uri->segment(3);
		$data['result'] = '';
		$data['news'] = $this->Contents_model->get_news_by_id($id);
		$data['main_content'] = 'news/edit_news';
		$this->load->view('back-modules/template', $data);
	}
	public function save_news(){

		if($this->input->post('status')=='on'){
			$status = 1;
		}else{
			$status = 0;
		}

		$config = array(
			'upload_path'	=>FILE_UPLOAD_PATH.'/news/',
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
				'en_des' 	    		=>$this->input->post('en_des'),
				'ch_des' 	    		=>$this->input->post('ch_des'),
				'date_news'             =>date('Y/M/D'),
				'img'                   =>$this->upload->file_name,
				'_status'			    =>$status

			);
//			var_dump($userArray);die();
			$this->db->insert('tbl_news', $userArray);
			redirect('contents/news');
		}else{
			$data['result'] = 'message:'.$this->upload->display_errors();

		}

	}

	public function update_news(){

		if($this->input->post('status')=='on'){
			$status = 1;
		}else{
			$status = 0;
		}
		$id = $this->input->post('Id');
		$row = $this->Contents_model->get_news_by_id($id);

		$config1 = array(
			'upload_path'	=>FILE_UPLOAD_PATH.'/news/',
			'allowed_types'	=>ALLOWED_TYPES,
			'max_size'		=>FILE_UPLOAD_MAX_SIZE,
			'encrypt_name' 	=>TRUE,
			'remove_spaces'	=>TRUE
		);
		$this->load->library('upload', $config1);
		if(!$this->upload->do_upload('file_name')) {
			$photo = $row->img;
		} else {
			@unlink(FILE_UPLOAD_PATH.'/news/'.$row->img);
			$photo = $this->upload->file_name;
			$this->load->library('image_lib');

		}
		$data = array(
			'en_title' 	            =>$this->input->post('en_title'),
			'ch_title' 	            =>$this->input->post('ch_title'),
			'en_des' 	            =>$this->input->post('en_des'),
			'ch_des' 	            =>$this->input->post('ch_des'),
			'date_news'				=>date('y/m/d'),
			'img'                           =>$photo,
			'_status'						=>$status
		);
		$this->db->update('tbl_news', $data,array('Id'=>$id));
		redirect('contents/news');

	}


	public function welcome(){
		$data['data'] = $this->Contents_model->get_list_content();
		$data['result']='';
		$data['main_content'] = 'content/index';
		$this->load->view('back-modules/template', $data);
		// var_dump($data['news']);
	}
	public function new_content(){
		$data['data'] = array('en_title' =>'','ch_title'=>'');
		$data['result']='';
		$data['main_content'] = 'content/write';
		$this->load->view('back-modules/template', $data);
	}
	public function save_content(){
		$inData = func_get_post_array($this->ci->input->post('values')); 
		$idx = $this->ci->Mo_Apple->insert('tbl_welcome',$inData);
		if($idx){
			redirect('contents/welcome');
		}else{
			$data['data'] = $inData;
			$data['result']='Please try again..';
			$data['main_content'] = 'content/write';
			$this->load->view('back-modules/template', $data);
		}
	}
	public function edit_content(){
		$Id =  $this->uri->segment(3);
		$data['data'] = $this->Contents_model->get_list_content_by_Id($Id);
		$data['result']='';
		$data['main_content'] = 'content/edit';
		$this->load->view('back-modules/template', $data);
	}
	public function update_content(){
		$inData = func_get_post_array($this->ci->input->post('values')); 
		$Id = $this->ci->input->post('Id');
		$where = array('Id' =>$Id);
		$idx = $this->ci->Mo_Apple->Update_Data($inData,$where,'tbl_welcome');
		if($idx){
			redirect('contents/welcome');
		}else{
			$data['data'] = $inData;
			$data['result']='Please try again..';
			$data['main_content'] = 'content/eidt';
			$this->load->view('back-modules/template', $data);
		}
	}
	public function delete_content(){
		$Id =  $this->uri->segment(3);
		$idx = $this->ci->Mo_Apple->delete_data('tbl_welcome',$Id);
		if($idx){
			$data['result']='suucessfully Deleted';
		}else{
			$data['result']='Please try again..';
		}
		redirect('contents/welcome');
	}

	public function delete_banner(){
		$Id = $this->uri->segment(3);
		$where = array('Id' =>$Id);
		$this->ci->Mo_Apple->delete_data('tbl_banner',$Id);
		redirect('contents/banner');
	}
	public function delete_explore(){
		$Id = $this->uri->segment(3);
		$where = array('Id' =>$Id);
		$this->ci->Mo_Apple->delete_data('tbl_explores',$Id);
		redirect('contents/explores');
	}

	public function delete_news(){
		$Id = $this->uri->segment(3);
		$where = array('Id' =>$Id);
		$this->ci->Mo_Apple->delete_data('tbl_news',$Id);
		redirect('contents/news');
	}

	public function delete_main_gallery(){
		$Id = $this->uri->segment(3);
		$where = array('Id' =>$Id);
		$this->Contents_model->delete_sub_garllery_by_type_id($Id);
		$this->ci->Mo_Apple->delete_data('tbl_main_gallery',$Id);
		redirect('contents/main_gallery');
	}

	public function delete_sub_gallery(){
		$Id = $this->uri->segment(3);
		$row = $this->Contents_model->get_sub_gallery_by_id($Id);
		@unlink(FILE_UPLOAD_PATH.'/gallery/'.$row->url);
		$where = array('Id' =>$Id);
		$this->ci->Mo_Apple->delete_data('tbl_gallerys',$Id);
		redirect('contents/sub_gallery/'.$this->uri->segment(4));
	}

	
}
