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

	public function save_main_gallery($data){
		$this->db->insert('tbl_main_gallery', $data);

	}

}

