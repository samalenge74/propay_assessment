<?php

class Dropdowns_Model extends CI_Model{

	public function languages()
	{
		$id = array('CHOOSE');
        $name = array('CHOOSE ONE');

        $this->db->select('*');
        $this->db->from('Languages_TBL');
        $this->db->order_by("name");
        $query = $this->db->get();
        $result = $query->result();

        for ($i = 0; $i < count($result); $i++)
        {
          array_push($id, $result[$i]->id);
          array_push($name, $result[$i]->Name);

        }

        return array_combine($id, $name);
	}

    public function interests()
	{
		$id = array();
        $name = array();

        $this->db->select('Name');
        $this->db->from('Interests_TBL');
        $this->db->order_by("name");
        $query = $this->db->get();
        $result = $query->result();

        for ($i = 0; $i < count($result); $i++)
        {
          array_push($id, $result[$i]->Name);
          array_push($name, $result[$i]->Name);

        }

        return array_combine($id, $name);
	}

}


?>
