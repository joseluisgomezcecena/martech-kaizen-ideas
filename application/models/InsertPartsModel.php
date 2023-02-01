<?php

class InsertPartsModel extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_mold_inserts()
	{
		$query = $this->db->get('inserts_catalog');
		return $query->result_array();
	}


	public function get_parts()
	{
		$query = $this->db->get('activeparts');
		return $query->result_array();
	}


	public function get_rm(){
		$query = $this->db->get('mresina');
		return $query->result_array();
	}


	public function get_departments()
	{
		$query = $this->db->get('departments');
		return $query->result_array();
	}


}
