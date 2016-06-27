<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends MX_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Cms_model');
		$arrayNav = 'Family Room';
	}

	public function error_404(){
		
		$this->load->view('front-modules/error-404');
    }
	public function index()
	{
		$segs = $this->uri->segment_array();
		$data['get_room'] = $this->Cms_model->getRoom();
		$data['data_banner'] = $this->Cms_model->getBanner();
		$data['launchpad'] = 'front-modules/launchpad';
		$data['main_content'] = 'index';
		$data['languageUrl'] = BASE_URL.HOME;
		$data['lang'] = 'en';
		if($segs){
			$data['lang'] = $this->Cms_model->language_validation($segs);
		}
		$data['banner'] = 'front-modules/banner';
		$this->load->view('front-modules/template', $data);
	}
	
	public function gallery(){
		$uri = $this->uri->segment(3);
		$data['main_gallery'] = $this->Cms_model->getMainGallery();
		$data['gallery'] = $this->Cms_model->getGallery();
		$data['languageUrl'] = '';
		$data['lang'] = 'en';
		if($uri){
			$data['lang'] = $uri;
		}
		$data['banner'] = 'front-modules/blank';
		$data['main_content'] = 'gallery';
		$this->load->view('front-modules/template', $data);
	}

	public function contact(){
		$uri = $this->uri->segment(3);
		$data['banner'] = 'front-modules/blank';
		$data['languageUrl'] = '';
		$data['lang'] = 'en';
		if($segs){
			$data['lang'] = $this->Cms_model->language_validation($segs);
		}
		$data['main_content'] = 'contact';
		$this->load->view('front-modules/template', $data);
	}
	public function booking(){
		$data['languageUrl'] = '';
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
		$data['languageUrl'] = '';
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
		$data['languageUrl'] = '';
		$data['lang'] = 'en';
		if($segs){
			$data['lang'] = $this->Cms_model->language_validation($segs);
		}
		$data['banner'] = 'front-modules/blank';
		$data['main_content'] = 'news';
		$this->load->view('front-modules/template', $data);
	}

	public function room(){
		$uri = $this->uri->segment(3);
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
