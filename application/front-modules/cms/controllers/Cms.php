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
		//$this->load->library('email');
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
		$data['room_type']=$this->ci->Mo_Apple->getLanguageData('rooms_type',array('name'=>'name'),$data['lang'],array('_status'=>1));
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

	public function sendEmail(){

		$full_name  = $this->input->post('full_name');
		$sender_email      = $this->input->post('email');
		$message    = $this->input->post('message');

		$this->email->from($sender_email, $full_name);
		$this->email->to(INFO_EMAIL);
		$this->email->subject('Customer Contact');

		$data['message']= $message;
		$data['email_from']=$sender_email;
		$this->email->set_mailtype("html");
		$msg = $this->load->view('send-mail/index',$data,TRUE);
		$mess = '<body style="background:#f2f2f2;font-family:arial;color:gray;text-align:center;line-height:24px;font-size: 14px;">
						<center>
							<table width="600" style="border-collapse:collapse;font-family:arial;color:gray;text-align:center;line-height:24px;font-size: 14px;">
								<tr>
									<td align="left"><img src="'.base_url('assets/css/site/site2/images/u22.png').'"></td>
								</tr>
								<tr>
									<td bgcolor="#35B8E8" style="padding:40px 0;"><h1 align="center" style="color:white;margin:0;">Email Confirmation</h1></td>
								</tr>
								<tr>
									<td style="padding:30px;background:white;">Welcome to Angkorban! To complete your registration, please copy verify code below and click verify email address button. Next, past it in verify code box and click verify now. You’re done!<br/>
										your verify code: <b>1234</b> </td>
								</tr>
								<tr>
									<td align="center" style="padding:0 0 30px 0;background:white;">
										<table style="border-collapse:collapse;">
											<tr>
												<td style="background:#FFB915;padding:10px 30px;"><h3 style="color:white;margin:0;font-family:arial;"><a href="'.site_url('site/confirmemail').'" style="color:white;padding:0;margin:0;text-decoration:none;">Verify email address</a></h3></td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<span>This email sent by Angkorban<br/>
							Copyright @ 2015 Angkorban. All Rights Reserved.
							</span>
						</center>
					 </body>';
		$this->email->message($msg);


        if ($this->email->send()) {
		$data['message_display'] = 'Email Successfully Send !';
		} else {
		$data['message_display'] =  '<p class="error_msg">Invalid Gmail Account or Password !</p>';
		}
		var_dump($data);

	}

	public function room_booking(){

		$full_name  = $this->input->post('full_name');
		$email      = $this->input->post('email');
		$message    = $this->input->post('message');
		$checkIn    = $this->input->post('checkin');
		$checkOut    = $this->input->post('checkout');
		$roomType    = $this->input->post('room_type');
		$people_number    = $this->input->post('guest');
		$phone    = $this->input->post('phone');
		$title = $this->input->post('title');

		$data['message']= $message;
		$data['email_from'] = $email;
		$data['checkin'] = $checkIn;
		$data['checkout'] = $checkOut;
		$data['room_type'] = $roomType;
		$data['guest'] = $people_number;
		$data['phone'] = $phone;
		if($title){
			$data['title'] = $title;
		}
		
		$this->email->set_mailtype("html");
		$this->email->from($email, $full_name);
		$this->email->to(INFO_EMAIL);
		$this->email->subject('Customer Contact');
		$msg = $this->load->view('send-mail/booking',$data,TRUE);
		$this->email->message($msg);
		$this->email->send();
		echo $this->email->print_debugger();

	}
}
