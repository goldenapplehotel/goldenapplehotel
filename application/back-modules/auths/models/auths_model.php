<?php

class Auths_model extends CI_Model {

    /**
    * Validate the login's data with the database
    */
	public function validate($user_name, $password)
	{
		$this->db->where('user_name', $user_name);
		$this->db->where('password', $password);
		$query = $this->db->get('ci_user');
		$result = $query->row();
//		return $query;
		if($query->num_rows() == 1)
		{
			if($result->enabled==1){
				return 1;//Active content-management-manager
			}else {
				return 0;//Inactive content-management-manager
			}
		}else {
			return 2;//username not found in database
		}
	}

}

