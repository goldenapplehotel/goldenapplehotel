<?php

class Rooms_model extends CI_Model {
	
	public function getAll(){
		$this->db->select()->from('tbl_features');
		return $this->db->get();
	}

	public function get_all_main_gallery(){
		$this->db->select()->from('tbl_main_gallery');
		return $this->db->get();
	}

	public function get_feature_by_id($id){
		$this->db->select()->from('tbl_features');
		$this->db->where('Id', $id);
		return $this->db->get();
	}

	public function get_banner_by_id($id){
			$this->db->select()->from('tbl_banner');
			$this->db->where('Id', $id);
			$query = $this->db->get();
			return $query->row();
		
	}

	public function save_main_gallery($data){
		$this->db->insert('tbl_main_gallery', $data);

	}


	public function save_feature($data){
		$this->db->insert('tbl_features',$data);
	}

	public function getAllRoomType(){
		$this->db->select()->from('tbl_rooms_type');
		return $this->db->get();
	}

	public function getAllRooms(){
		$this->db->select()->from('tbl_rooms');
		return $this->db->get();
	}

}

