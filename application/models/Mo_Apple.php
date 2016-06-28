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

	public function getAllRoomType(){

		$this->db->select()->from('tbl_rooms_type');
		return $this->db->get();
	}



	// room function
	public function getAllRooms(){
		$this->db->select()->from('tbl_rooms');
		return $this->db->get();
	}

	public function getLanguageData($table, $where = TRUE,$lange = 'en',$param=array(),$_status=1){
		$paramSql = array();
		$sql = '';
		$sql .= 'SELECT * ';
		if(is_array($where)){
			foreach ($where as $key => $value) {
				$sql .= ' , '.$lange.'_'.$key.' AS '.$value;
			}
		}
		$sql .= ' FROM  `tbl_'.$table.'` as ads WHERE _status='.$_status;
		if(sizeof($param)>0){
			foreach ($param as $key => $value) {
				$sql .= ' AND '.$key.' = '.$value;
				// array_push($paramSql, $value);
			}
		}
		return $this->db->query($sql);
		// return $sql;
	}

	public function getFeatureByParam($param ='' ){
		$paramAarray = explode('^', $param);

		$sql ='SELECT * FROM tbl_features WHERE _status=1 ';

		foreach ($paramAarray as $key => $value) {
			$sql .= ' OR Id =? ';
		}

		return $sql;
		
	}
}
?>