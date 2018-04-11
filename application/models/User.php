<?php
	
	Class User extends CI_Model {

		// Read data using username and password
		public function login($username, $password) {

			$condition = "Username=" . "'" . $username . "' AND " . "Password =" . "'" . md5($password) . "'";
			$this->db->select('*');
			$this->db->from('Admin_TBL');
			$this->db->where($condition);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				return $query->result();
			} else {
				return false;
			}
		}

	}

?>