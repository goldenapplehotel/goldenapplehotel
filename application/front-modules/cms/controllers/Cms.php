<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends MX_Controller {

	public function __construct() {
		parent::__construct();
		

	}

	public function error_404(){
		
		$this->load->view('front-modules/error-404');
    }
	public function index()
	{
		$data['banner'] = 'front-modules/banner';
		$data['launchpad'] = 'front-modules/launchpad';
		$data['main_content'] = 'index';
		$this->load->view('front-modules/template', $data);
	}
	
	public function gallery(){

		$data['banner'] = 'front-modules/blank';
		$data['main_content'] = 'gallery';
		$this->load->view('front-modules/template', $data);
	}

	public function contact(){

		$data['banner'] = 'front-modules/blank';
		$data['main_content'] = 'contact';
		$this->load->view('front-modules/template', $data);
	}
	public function booking(){

		$data['banner'] = 'front-modules/blank';
		$data['main_content'] = 'booking';
		$this->load->view('front-modules/template', $data);
	}

	public function explore(){

		$data['banner'] = 'front-modules/blank';
		$data['main_content'] = 'explore';
		$this->load->view('front-modules/template', $data);
	}

	public function news(){

		$data['banner'] = 'front-modules/blank';
		$data['main_content'] = 'news';
		$this->load->view('front-modules/template', $data);
	}
}
