<?php


/* ------------------------------------------------

 * 파일명 : mo_bbs.php

 * 개  요 : 게시판 관리

  ------------------------------------------------ */


class Mo_apple extends CI_Model  {



	function __construct() {
		
		$this->load->database('default');

	}

	function insert($table,$data) {
		$this->db->insert($table, $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function Update_Data($data,$where,$table){
		$this->db->set($data);
		$this->db->where($where);
		$this->db->update($table);
		return TRUE;
	}

	public function delete_data($table,$where){
		$this->db->where('Id',$where);
		$this->db->delete($table);
		return TRUE;
	}

}
?>