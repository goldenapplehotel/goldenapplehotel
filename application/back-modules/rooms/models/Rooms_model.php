<?php

class Rooms_model extends CI_Model {
	
	public function getAllFeatures(){
		$this->db->select()->from('tbl_features');
		return $this->db->get();
	}

	public function getAllPromotion(){
		$this->db->select()->from('tbl_promotions');
		return $this->db->get();
	}

	public function getAllRoomType(){
		$this->db->select()->from('tbl_rooms_type');
		return $this->db->get();
	}
	public function getRoomTypeById($Id){
		$this->db->select()->from('tbl_rooms_type');
		$this->db->where('Id', $Id);
		return $this->db->get();
	}

	public function get_room_thum_by_id($Id){
		$this->db->select()->from('tbl_rooms_gallery');
		$this->db->where('Id', $Id);
		$query = $this->db->get();
		return $query->row();
	}

	public function getAllRooms(){
		$this->db->select()->from('tbl_rooms');
		return $this->db->get();
	}

	public function getRoomById($Id){
		$sql = 'SELECT * , (SELECT en_name from tbl_rooms_type where Id=ads.type_id) as en_name,(SELECT ch_name from tbl_rooms_type where Id=ads.type_id) as ch_name
			,(SELECT en_title from tbl_promotions where Id=ads.promotion_id) as en_title_pro
			,(SELECT ch_title from tbl_promotions where Id=ads.promotion_id) as ch_title_pro
			FROM `tbl_rooms` as ads WHERE Id=?';
		return $this->db->query($sql,array($Id));
	}

	
	public function save_main_gallery($data){
		$this->db->insert('tbl_main_gallery', $data);

	}


	public function save_feature($data){
		$this->db->insert('tbl_features',$data);
	}

	public function getFeatureById($Id){
		$this->db->select()->from('tbl_features');
		$this->db->where('Id', $Id);
		return $this->db->get();
	}

	public function getRoomGalleryByRoomId($Id){
		$this->db->select()->from('tbl_rooms_gallery');
		$this->db->where('rooms_id', $Id);
		return $this->db->get();
	}

	public function deleteGalleryById($Id){
		$this->db->where('Id', $Id);
		$this->db->delete('tbl_rooms_gallery');
	}



	

}

