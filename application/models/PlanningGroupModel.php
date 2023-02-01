<?php

class PlanningGroupModel extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}


	public function get_locations()
	{
		$query = $this->db->get('locations');
		return $query->result_array();
	}



}
