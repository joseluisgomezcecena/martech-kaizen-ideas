<?php

class RecordModel extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}


	public function get_record($id)
	{
		$query = $this->db->get_where('scans', array('id' => $id));
		return $query->row_array();
	}

	public function update_record()
	{
		$schedule = $this->input->post('schedule');

		if($schedule == 'reg1' || $schedule == 'reg2'|| $schedule == 'reg3')
		{
			$type = 'regular';
		}
		elseif ($schedule == 'rot1' || $schedule == 'rot2')
		{
			$type = 'rotating';
		}
		elseif ($schedule == 'w1' || $schedule == 'w2')
		{
			$type = 'weekend';
		}
		else
		{
			$type = 'extra';
		}

		$user_id = $this->session->userdata['user_id']['user_id'];

		$data = array(
			'emp_number' => $this->input->post('emp_number'),
			'location' => $this->input->post('location'),
			'type' => $type,
			'schedule' => $this->input->post('schedule'),
			'check_in' => $this->input->post('check_in'),
			'check_out' => $this->input->post('check_out'),
			'check_out_by'=>'Manual',
			'hours_worked'=>$this->input->post('hours_worked'),
			'was_updated'=>1,
			'updated_by'=>$user_id,
		);

		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('scans', $data);
	}




	public function delete_record()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('scans');
		return true;

	}




}
