<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends MX_Controller {

	var $ci;
	public function __construct()
	{
		parent::__construct();
		$this->ci = &get_instance();
		// if (!$this->session->userdata('is_logged_in')) {
		// 	redirect('auths');
		// }
		$this->load->model('Cms_model');
		$this->load->model('Mo_Apple');
	}

	public function error_404(){
		
		$this->load->view('front-modules/error-404');
    }
	public function index()
	{
		$segs = $this->uri->segment_array();
		
		$data['data_banner'] = $this->Cms_model->getBanner();
		$data['launchpad'] = 'front-modules/launchpad';
		$data['main_content'] = 'index';
		$data['languageUrl'] = BASE_URL.HOME;
		$data['lang'] = 'en';
		if($segs){
			$data['lang'] = $this->Cms_model->language_validation($segs);
		}
		$where = array('description' => 'description', 'title' =>'title' );
		$data['get_room'] = $this->ci->Mo_Apple->getLanguageData('rooms',$where,$data['lang'],array('front_status'=>1));
		$data['welcome'] = $this->ci->Mo_Apple->getLanguageData('welcome',array('title'=>'title'),$data['lang'],array('_status'=>1));
		$data['hotel'] = $this->ci->Mo_Apple->getLanguageData('hotel_service',array('title'=>'title'),$data['lang'],array('_status'=>1));

		$data['banner'] = 'front-modules/banner';
		$this->load->view('front-modules/template', $data);
		// var_dump($data['welcome']->result());
	}
	
	public function gallery(){
		$uri = $this->uri->segment(3);
		$data['main_gallery'] = $this->Cms_model->getMainGallery();
		$data['gallery'] = $this->Cms_model->getGallery();
		$data['languageUrl'] = BASE_URL.'cms/gallery';
		$data['lang'] = 'en';
		if($uri){
			$data['lang'] = $uri;
		}
		$data['banner'] = 'front-modules/blank';
		$data['main_content'] = 'gallery';
		$this->load->view('front-modules/template', $data);
	}

	public function contact(){
		$segs = $this->uri->segment_array();
		$data['banner'] = 'front-modules/blank';
		$data['languageUrl'] = BASE_URL.'cms/contact';
		$data['lang'] = 'en';
		if($segs){
			$data['lang'] = $this->Cms_model->language_validation($segs);
		}
		$data['main_content'] = 'contact';
		$this->load->view('front-modules/template', $data);
	}
	public function booking(){
		$segs = $this->uri->segment_array();
		$data['languageUrl'] = BASE_URL.'cms/booking';
		$data['lang'] = 'en';
		if($segs){
			$data['lang'] = $this->Cms_model->language_validation($segs);
		}
		$data['banner'] = 'front-modules/blank';
		$data['main_content'] = 'booking';
		$this->load->view('front-modules/template', $data);
	}

	public function explore(){
		$segs = $this->uri->segment_array();
		$data['languageUrl'] = BASE_URL.'cms/explore';
		$data['lang'] = 'en';
		if($segs){
			$data['lang'] = $this->Cms_model->language_validation($segs);
		}
		$data['banner'] = 'front-modules/blank';
		$data['main_content'] = 'explore';
		$this->load->view('front-modules/template', $data);
	}

	public function news(){
		$segs = $this->uri->segment_array();
		$data['languageUrl'] = BASE_URL.'cms/news';
		$data['lang'] = 'en';
		if($segs){
			$data['lang'] = $this->Cms_model->language_validation($segs);
		}
		$data['banner'] = 'front-modules/blank';
		$data['main_content'] = 'news';
		$this->load->view('front-modules/template', $data);
	}

	public function hotel(){
		$segs = $this->uri->segment_array();
		
		$data['data_banner'] = $this->Cms_model->getBanner();
		$data['launchpad'] = 'front-modules/launchpad';
		$data['lang'] = 'en';
		if($segs){
			$data['lang'] = $this->Cms_model->language_validation($segs);
		}
		
		$data['banner'] = 'front-modules/blank';

		$action_file = $this->Cms_model->validate_Data_In_Array($segs,'view');
		if($action_file != FALSE){
			$data['main_content'] = 'rooms/view';
			$data['languageUrl'] = BASE_URL.HOTEL_URL.'view';
			$where = array('feature' => 'feature' );
			$data['feature'] = $this->ci->Mo_Apple->getLanguageData('features',$where,$data['lang'])->result();
			$where = array('description' => 'description', 'title' =>'title', );
			$param = array('Id'=>$segs[4],'_status' =>1);
			$data['gallery'] = $this->ci->Mo_Apple->getLanguageData('rooms_gallery',true,$data['lang'],array('rooms_id'=>$segs[4]));
			$data['rooms'] = $this->ci->Mo_Apple->getLanguageRoomData('rooms',$where,$data['lang'],$param);
			// echo $data['rooms'];
		}else{
			if(is_numeric($segs[3])){
				$param = array('type_id' =>$segs[3]);
			}else{
				$param = array();
			}
			$data['main_content'] = 'rooms/index';
			$data['languageUrl'] = BASE_URL.HOTEL_URL;
			$where = array('description' => 'description', 'title' =>'title', );
			$data['get_room'] = $this->ci->Mo_Apple->getLanguageData('rooms',$where,$data['lang'],$param);
		}
		$this->load->view('front-modules/template', $data);
	}

	public function hotel_room(){
		// $segs = $this->uri->segment_array();
		
		// $data['data_banner'] = $this->Cms_model->getBanner();
		// $data['launchpad'] = 'front-modules/launchpad';
		// $data['main_content'] = 'rooms/view';
		// $data['languageUrl'] = BASE_URL.HOTEL_URL;
		// $data['lang'] = 'en';
		// if($segs){
		// 	$data['lang'] = $this->Cms_model->language_validation($segs);
		// }
		// $where = array('description' => 'description', 'title' =>'title', );
		// $data['get_room'] = $this->ci->Mo_Apple->getLanguageData('rooms',$where,$data['lang']);
		// $data['banner'] = 'front-modules/blank';
		// $this->load->view('front-modules/template', $data);
	}
	public function languageChange(){
		$segs = $this->uri->segment_array();

		foreach ($segs as $segment)
		{
		        echo $segment;
		        echo '<br />';
		}
	}
}
