<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promotions extends MX_Controller
{
	var $ci;
	public function __construct()
	{
		parent::__construct();
		$this->ci = &get_instance();
		if (!$this->session->userdata('is_logged_in')) {
			redirect('auths');
		}
		
		$this->load->model('Promotion_model');
		$this->load->model('Mo_Apple');
	}

	public function index()
	{
		
		$data['data']	= $this->Promotion_model->getAllPromotion();
		$data['main_content'] = 'index';
		$this->load->view('back-modules/template', $data);
	}

	public function list_promotion(){
		$data['data']	= $this->Promotion_model->getAllPromotion();
		$data['main_content'] = 'index';
		$this->load->view('back-modules/template', $data);
	}

	public function new_promotion(){
		$data['result'] =   '';
		$data['main_content'] = 'write';
		$this->load->view('back-modules/template', $data);

	}

	public function save_promotion(){
		$data = func_get_post_array($this->ci->input->post('values')); 
		// var_dump($data);
		$this->db->insert('tbl_promotions', $data);

		redirect('promotions/list_promotion');
	}

	public function edit_Promotions(){
		$id = $this->uri->segment(3);
		$data['data']	= $this->Promotion_model->getPromotionById($id)->result()[0];
		$data['main_content'] = 'edit';
		$this->load->view('back-modules/template', $data);

	}

	public function update_Promotions(){
		$data = func_get_post_array($this->ci->input->post('values')); 
		$this->db->update('tbl_promotions', $data,array('Id'=>$data['Id']));
		redirect('promotions/list_promotion');
	}

}

?>