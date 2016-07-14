<?php

class Contents_model extends CI_Model {
	
	public function getAll(){
		$this->db->select()->from('tbl_banner');
		return $this->db->get();
	}

	public function get_all_main_gallery(){
		$this->db->select()->from('tbl_main_gallery');
		return $this->db->get();
	}

	public function get_all_sub_gallery($id){
		$this->db->select()->from('tbl_gallerys');
		$this->db->where('type', $id);
		return $this->db->get();
	}

	public function get_banner_by_id($id){
			$this->db->select()->from('tbl_banner');
			$this->db->where('Id', $id);
			$query = $this->db->get();
			return $query->row();
		
	}

	public function get_all_main_gallery_by_id($id){
		$this->db->select()->from('tbl_main_gallery');
		$this->db->where('Id', $id);
		$query = $this->db->get();
		return $query->row();

	}

	public function save_main_gallery($data){
		$this->db->insert('tbl_main_gallery', $data);

	}
	

	public function get_user_admin_pass($user_name){
		$this->db->select()->from('ci_user');
		$this->db->where('user_name', $user_name);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_main_gallery_by_id($id){
		$this->db->select()->from('tbl_main_gallery');
		$this->db->where('Id', $id);
		$query = $this->db->get();
		return $query->row();
	}
	public function get_sub_gallery_by_id($id){
		$this->db->select()->from('tbl_gallerys');
		$this->db->where('Id', $id);
		$query = $this->db->get();
		return $query->row();
	}

//	explore

	public function get_all_explore(){
		$this->db->select()->from('tbl_explores');
		return $this->db->get();
	}

	public function get_explore_by_id($id){
		$this->db->select()->from('tbl_explores');
		$this->db->where('Id', $id);
		$query = $this->db->get();
		return $query->row();
	}
//news

	public function get_all_news(){
		$this->db->select()->from('tbl_news');
		return $this->db->get();
	}

	public function get_news_by_id($id){
		$this->db->select()->from('tbl_news');
		$this->db->where('Id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_list_content(){
		$this->db->select()->from('tbl_welcome');
		$this->db->where('_status', 1);
		$query = $this->db->get();
		return $query;
	}
	public function get_list_content_by_Id($Id){
		$this->db->select()->from('tbl_welcome');
		$this->db->where('Id', $Id);
		$query = $this->db->get();
		return $query;
	}
	public function delete_sub_garllery_by_type_id($id){
		$this -> db -> where('type', $id);
		$this -> db -> delete('tbl_gallerys');
	}
}

