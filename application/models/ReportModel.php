<?php

class ReportModel extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}


	//reports
	public function get_scans()
	{
		if($this->input->post('date_start'))
		{
			$start_date = $this->input->post('date_start');
			$end_date = $this->input->post('date_end');
			$this->db->where('created_at >=', $start_date . " 06:00:00");
			$this->db->where('created_at <=', $end_date . " 17:59:59");
		}
		else
		{
			$today = date('Y-m-d');
			$this->db->where('created_at >=', $today . " 06:00:00");
			$this->db->where('created_at <=', $today . " 17:59:59");
		}


		$this->db->order_by('id', 'DESC');
		$this->db->select('*');
		$this->db->from('scans');
		$this->db->join('locations', 'scans.location = locations.location_id', 'left');
		$query = $this->db->get();

		//$lastone = $this->db->last_query();
		#print_r($lastone);

		return $query->result_array();
	}


	public function get_hours_by_planning_group()
	{
		if($this->input->post('date_start'))
		{
			$start_date = $this->input->post('date_start');
			$end_date = $this->input->post('date_end');
			$this->db->where('created_at >=', $start_date . " 06:00:00");
			$this->db->where('created_at <=', $end_date . " 17:59:59");
		}
		else
		{
			$today = date('Y-m-d');
			$this->db->where('created_at >=', $today . " 06:00:00");
			$this->db->where('created_at <=', $today . " 17:59:59");
		}
		/*
		SELECT SUM(hours_worked), planner_id, plant_id
		FROM`scans`
		LEFT JOIN `locations` ON `scans`.`location` = `locations`.`location_id`
		WHERE `created_at` >= '2023-01-30 06:00:00' AND `created_at` <= '2023-01-30 17:59:59'
		GROUP BY planner_id, plant_id
		ORDER BY `id` DESC
		*/

		$this->db->group_by('planner_id, plant_id');
		$this->db->order_by('id', 'DESC');
		$this->db->select('SUM(hours_worked) as hours_worked, planner_id, plant_id');
		$this->db->from('scans');
		$this->db->join('locations', 'scans.location = locations.location_id', 'left');

		$query = $this->db->get();

		$lastone = $this->db->last_query();
		print_r($lastone);

		return $query->result_array();

	}


	//reports get planning group hours by employee and location
	public function get_hours_employee_location()
	{
		$query = $this->db->query("SELECT emp_number, MAX(best) as mejor, planner_id FROM (SELECT emp_number, SUM(hours_worked) as best,planner_id FROM scans LEFT JOIN locations ON locations.location_id = scans.location WHERE created_at BETWEEN '2022-09-01' AND '2022-09-24' GROUP BY emp_number, location) as bests GROUP BY emp_number");
		//$query = $this->db->get();
		//$lastone = $this->db->last_query();
		//print_r($lastone);

		return $query->result_array();
		//print_r($query->result_array());
	}







	//reports
	public function get_scans_by_location()
	{
		//SELECT COUNT(id) as cuenta,locations.location_name,type FROM `scans`
		// left join locations on scans.location = locations.location_id GROUP by locations.location_name;
		if($this->input->post('date_start'))
		{
			$start_date = $this->input->post('date_start');
			$end_date = $this->input->post('date_end');
			$this->db->where('created_at >=', $start_date . " 00:00:00");
			$this->db->where('created_at <=', $end_date . " 23:59:59");
		}
		else
		{
			$today = date('Y-m-d');
			$this->db->where('created_at >=', $today . " 00:00:00");
			$this->db->where('created_at <=', $today . " 23:59:59");
		}



		$this->db->select('COUNT(id) as cuenta,locations.location_name,type');
		$this->db->from('scans');
		$this->db->join('locations', 'scans.location = locations.location_id', 'left');
		$this->db->group_by('locations.location_name');
		$query = $this->db->get();

		//$last_query = $this->db->last_query();
		//print_r($last_query);

		return $query->result_array();
	}



	public function get_employees()
	{
		$query = $this->db->get('empleados');
		return $query->result_array();
	}




	public function get_scans_by_location_employee()
	{
		//SELECT COUNT(id) as cuenta,locations.location_name,type FROM `scans`
		// left join locations on scans.location = locations.location_id GROUP by locations.location_name;
		if($this->input->post('date_start'))
		{
			$start_date = $this->input->post('date_start');
			$end_date = $this->input->post('date_end');
			$this->db->where('created_at >=', $start_date . " 00:00:00");
			$this->db->where('created_at <=', $end_date . " 23:59:59");
		}
		else
		{
			$today = date('Y-m-d');
			$this->db->where('created_at >=', $today . " 00:00:00");
			$this->db->where('created_at <=', $today . " 23:59:59");
		}



		$this->db->select('COUNT(id) as cuenta,locations.location_name,type');
		$this->db->from('scans');
		$this->db->join('locations', 'scans.location = locations.location_id', 'left');
		$this->db->where('mod(type,2) <> ', 0);
		$this->db->group_by('locations.location_name');
		$query = $this->db->get();

		//$last_query = $this->db->last_query();
		//print_r($last_query);

		return $query->result_array();
	}




	public function get_hours(){

		$data = array();
		$data2 = array();


		if($this->input->post('date_start'))
		{
			$start_date = $this->input->post('date_start');
			$end_date = $this->input->post('date_end');
			$this->db->where('created_at >=', $start_date . " 00:00:00");
			$this->db->where('created_at <=', $end_date . " 23:59:59");
		}
		else
		{
			$today = date('Y-m-d');
			$this->db->where('created_at >=', $today . " 00:00:00");
			$this->db->where('created_at <=', $today . " 23:59:59");
		}



		$this->db->select('COUNT(id) as cuenta,locations.location_name,type,emp_number');
		$this->db->from('scans');
		$this->db->join('locations', 'scans.location = locations.location_id', 'left');
		$this->db->group_by('locations.location_name');
		$query = $this->db->get();

		//$last_query = $this->db->last_query();
		//print_r($last_query);

		//return $query->result_array();

		foreach ($query->result_array() as $row)
		{
			$data[$row['location_name']] = $row['cuenta'];
		}

	}




}
