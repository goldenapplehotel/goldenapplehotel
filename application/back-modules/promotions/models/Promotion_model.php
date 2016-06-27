<?php

class Promotion_model extends CI_Model {

	public function getAllPromotion(){
		$this->db->select()->from('tbl_promotions');
		return $this->db->get();
	}

	public function getPromotionById($Id){
		$this->db->select()->from('tbl_promotions');
		$this->db->where('Id', $Id);
		return $this->db->get();
	}
}


?>