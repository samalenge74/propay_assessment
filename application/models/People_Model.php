<?php

class People_Model extends CI_Model{

	public function View_All_People()
	{
		$condition = "p.Language_ID = l.id";
		$this->db->Select('p.*, l.Name as language');
		$this->db->from('People_TBL as p, languages_TBL as l');
		$this->db->where($condition);
		$query = $this->db->get();

		if($query->num_rows()>0)
			return $query->result();
	}

	public function View_One_Person($id)
	{
		$condition = "id = $id";
		$this->db->Select('*');
		$this->db->from('People_TBL');
		$this->db->where($condition);

		$query = $this->db->get();
		if($query->num_rows() == 1)
			$row = $query->row();
			return $row;
	}

	public function Create_Person($data) {

		$this->db->insert('People_TBL', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function Update_Person($id, $data) {

		$this->db->where('id', $id);
		$this->db->update('People_TBL', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function Delete_Person($id){
		$where_array = array(
			'id' => $id
		);

		$this->db->where($where_array);
		$this->db->delete('People_TBL');
		return ($this->db->affected_rows() != 1) ? false : true;

	}

	public function Email_Exists($email)
	{
		$where_array = array(
			'Email' => $email
		);

		$this->db->where($where_array);
		$this->db->Select('*');
		$this->db->from('People_TBL');
		$query = $this->db->get();

		if($query->num_rows() == 1)
			return true;
		else
			return false;
	}

}


?>
