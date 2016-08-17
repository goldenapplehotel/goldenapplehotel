<?php

class Cms_model extends CI_Model {

	public function getGallery(){
		$this->db->select()->from('tbl_main_gallery');
		$this->db->join('tbl_gallerys', 'tbl_gallerys.type = tbl_main_gallery.Id');
		return $this->db->get();
	}

	public function getMainGallery(){
		$this->db->select()->from('tbl_main_gallery');
		return $this->db->get();
	}
	public function getBanner(){
		$this->db->select()->from('tbl_banner');
		return $this->db->get();
	}

	public function getRoom(){
		$this->db->select()->from('tbl_rooms');
		$this->db->where('front_status', 0);
		return $this->db->get();
	}

	public function language_validation($arr){
		$result = 'en';
		if(in_array('ch',$arr)){ 
			$result = 'ch' ;
		}
		return $result;
	}
	public function validate_Data_In_Array($data=array(), $where= TRUE){
		$result= FALSE;
		if(is_array($data)){
			if(in_array($where, $data)){
				$result = $where;
			}
		}
		return $result;
	}

	public function get_room_type(){
		$this->db->select()->from('tbl_rooms_type');
		return $this->db->get();
	}

}

