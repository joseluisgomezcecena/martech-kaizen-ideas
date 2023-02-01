<?php

class ToolCribModel extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}


	public function get_sups()
	{
		$query = $this->db->get('sup');
		return $query->result_array();
	}


	public function get_all_requests()
	{

		//$this->db->select('*');
		$this->db->select('request_id, sup, location, sup_requests.created_at, ready_at, pickup_by, delivered_by, status, id, partno, partno_descrip, boy_sup, maquina, resina, revision');
		$this->db->from('sup_requests');
		$this->db->join('sup', 'sup.id = sup_requests.sup', 'left');
		$query = $this->db->get();

		//#$lastone = $this->db->last_query();
		//#print_r($lastone);

		return $query->result_array();

	}


	public function get_pending_requests()
	{

		//$this->db->select('*');
		$this->db->select('request_id, sup, location, sup_requests.created_at, ready_at, pickup_by, delivered_by, status, id, partno, partno_descrip, boy_sup, maquina, resina, revision');
		$this->db->from('sup_requests');
		$this->db->join('sup', 'sup.id = sup_requests.sup', 'left');
		$this->db->where('status!=',2);
		$query = $this->db->get();

		//#$lastone = $this->db->last_query();
		//#print_r($lastone);

		return $query->result_array();

	}



	public function get_pending_requests_by_plant($plant)
	{

		//$this->db->select('*');
		$this->db->select('request_id, sup, location, sup_requests.created_at, ready_at, pickup_by, delivered_by, status, id, partno, partno_descrip, boy_sup, maquina, resina, revision');
		$this->db->from('sup_requests');
		$this->db->join('sup', 'sup.id = sup_requests.sup', 'left');
		$this->db->where(array('status!='=>2, 'location='=>$plant));
		$query = $this->db->get();

		//#$lastone = $this->db->last_query();
		//#print_r($lastone);'status!=',2

		return $query->result_array();

	}



	public function get_single_request($id)
	{

		$this->db->select('*');
		$this->db->from('sup_requests');
		$this->db->join('sup', 'sup.id = sup_requests.sup', 'left');
		$this->db->where('request_id', $id);
		$query = $this->db->get();

		return $query->row_array();
	}




	public function get_pending_requests_detail($id)
	{
		/*
		 *
		 * select * from sup_requests
		 * left join sup on sup.id = sup_requests.sup
		 * left join r_insert_sup on r_insert_sup.r_sup_id = sup.id
		 * left join inserts_catalog on r_insert_sup.r_insert_id = inserts_catalog.insert_id
		 * left join requested_parts on requested_parts.r_insert_sup_id = r_insert_sup.r_insert_id
		 * WHERE sup_requests.request_id = 28;
		 *
		 */

		$this->db->select('*');
		$this->db->from('sup_requests');
		$this->db->join('sup', 'sup.id = sup_requests.sup', 'left');
		$this->db->join('r_insert_sup', 'r_insert_sup.r_sup_id = sup.id', 'left');
		$this->db->join('inserts_catalog', 'r_insert_sup.r_insert_id = inserts_catalog.insert_id', 'left');
		$this->db->where('sup_requests.request_id', $id);
		$query = $this->db->get();



		//#$lastone = $this->db->last_query();
		//#print_r($lastone);


		return $query->result_array();
	}


	public function get_requested($id)
	{
		$this->db->select('*');
		$this->db->from('requested_parts');
		$this->db->where('request_id', $id);
		$query = $this->db->get();


		return $query->result_array();


	}


	public function mold_assembled()
	{
		$id = $this->input->post('id');
		$assebled = 1;
		$ready_date = date("Y-m-d H:i:s");

		$data = array(
			'status'=>$assebled,
			'ready_at'=>$ready_date,
		);

		return $this->db->update('sup_requests', $data, array("request_id"=>$id));

		//$lastone = $this->db->last_query();
		//print_r($lastone);
	}




	public function mold_delivered()
	{
		$id = $this->input->post('id');
		$delivered = 2;
		$delivery_date = date("Y-m-d H:i:s");

		$data = array(
			'status'=>$delivered,
			'pickup_at'=>$delivery_date,
			'pickup_by'=>$this->input->post('pickup_by'),
			'delivered_by'=>$this->input->post('delivered_by'),
		);

		return $this->db->update('sup_requests', $data, array("request_id"=>$id));

	}




}
