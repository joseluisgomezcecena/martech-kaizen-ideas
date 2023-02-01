<?php

class ScanModel extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}

	public function create()
	{
		$shift = $this->get_shift(date('H:i:s'));

		if($shift == 1)
		{
			$end = '15:36:00';
		}
		elseif($shift == 2)
		{
			$end = '23:30:00';
		}
		else
		{
			$end = '05:59:59';
		}

		$emp_number = $this->input->post('work_id');
		$date = date('Y-m-d');

		$this->db->order_by('id', 'DESC');
		$this->db->select('*');
		$this->db->from('scans');
		$this->db->where('emp_number', $emp_number);
		$this->db->where('created_at >=', $date . " 00:00:00");
		$this->db->where('created_at <=', $date . " 23:59:59");
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$data_result =  $query->row_array();
			$id = $data_result['id'];
			$check_in = $data_result['check_in'];

			$t1 = strtotime($check_in);
			$t2 = strtotime(date('Y-m-d H:i:s'));
			$diff = $t2 - $t1;
			$hours = $diff / ( 60 * 60 );

			//updating the record for checkout before checking in.
			$data_update = array(
				'check_out' => date('Y-m-d H:i:s'),
				'hours_worked' => $hours,
				'type' => 2,
			);
			$this->db->update('scans', $data_update, array('id' => $id));

			//checking in to the new location.
			$t1 = strtotime(date('Y-m-d H:i:s'));
			$t2 = strtotime(date('Y-m-d') . ' '. $end);
			$diff = $t2 - $t1;
			$hours = $diff / ( 60 * 60 );

			$data = array(
				'emp_number' => $this->input->post('work_id'),
				'location' => $this->input->post('location_id'),
				'check_in' => date('Y-m-d H:i:s'),
				'check_out' => date('Y-m-d' . ' '. $end),
				'type' => 1,
				'hours_worked' => $hours,
			);


		}
		else
		{
			//checking in to the new location if there were no previous records.
			$t1 = strtotime(date('Y-m-d H:i:s'));
			$t2 = strtotime(date('Y-m-d') . ' '. $end);
			$diff = $t2 - $t1;
			$hours = $diff / ( 60 * 60 );

			$data = array(
				'emp_number' => $this->input->post('work_id'),
				'location' => $this->input->post('location_id'),
				'check_in' => date('Y-m-d H:i:s'),
				'check_out' => date('Y-m-d' . ' '. $end),
				'type' => 1,
				'hours_worked' => $hours,
			);
		}

		return $id = $this->db->insert('scans', $data);

	}


	public function get_shift($date, $type){

		if($type == 'regular')
		{
			if($date > date('H:i:s', strtotime('06:00:00')) && $date <= date('H:i:s', strtotime('15:36:00'))){
				$shift = "reg1";
			}
			elseif($date > date('H:i:s', strtotime('15:36:00')) && $date <= date('H:i:s', strtotime('23:35:00'))){
				$shift = "reg2";
			}
			else
			{
				$shift = "reg3";
			}
		}
		elseif ($type == 'rotating')
		{
			if($date > date('H:i:s', strtotime('06:00:00')) && $date <= date('H:i:s', strtotime('18:00:00')))
			{
				$shift = "rot1";
			}
			else
			{
				$shift = "rot2";
			}
		}
		elseif ($type == 'overtime')
		{
			$shift = "ot1";
		}
		elseif ($type == 'weekend')
		{
			if($date > date('H:i:s', strtotime('06:00:00')) && $date <= date('H:i:s', strtotime('15:36:00'))){
				$shift = "w1";
			}
			elseif($date > date('H:i:s', strtotime('15:36:00')) && $date <= date('H:i:s', strtotime('23:35:00'))){
				$shift = "w2";
			}
			else
			{
				$shift = "w3";
			}
		}
		else
		{
			$shift = 0;
		}

		//return $shift;
		return array(
			'shift' => $shift,
			'type' => $type,
		);
	}







	public function get_locations()
	{
		$this->db->order_by('location_id', 'DESC');
		$this->db->select('*');
		$this->db->from('locations');
		$query = $this->db->get();
		return $query->result_array();
	}




	public function get_single_location($location)
	{
		$this->db->select('*');
		$this->db->from('locations');
		$this->db->where('location_id', $location);
		$query = $this->db->get();

		//$last_query = $this->db->last_query();
		//print_r($last_query);

		return $query->row_array();
	}





	public function check_work_id_exists($work_id)
	{
		$date = date('Y-m-d');

		$this->db->select('*');
		$this->db->where('created_at >=', $date . " 00:00:00");
		$this->db->where('created_at <=', $date . " 23:59:59");
		$this->db->where('emp_number', $work_id);
		$query = $this->db->get('scans');

		if(empty($query->row_array()))
		{
			return true;
		}
		else
		{
			return false;
		}
	}








}
