<?php

class Rooms_model extends CI_Model {
	
	public function getAllFeatures(){
		$this->db->select()->from('tbl_features');
		return $this->db->get();
	}

	public function getAllRoomType(){
		$this->db->select()->from('tbl_rooms_type');
		return $this->db->get();
	}

	public function getAllRooms(){
		$this->db->select()->from('tbl_rooms');
		return $this->db->get();
	}
	public function save_main_gallery($data){
		$this->db->insert('tbl_main_gallery', $data);

	}


	public function save_feature($data){
		$this->db->insert('tbl_features',$data);
	}

	

}

