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
}

