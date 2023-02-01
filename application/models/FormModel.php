<?php

class FormModel extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_sups()
	{
		$query = $this->db->get('sup');
		return $query->result_array();
	}


	public function get_single_sup($id)
	{

		$query = $this->db->get_where('sup', array("id"=>$id));
		return $query->row_array();
	}



	public function get_single_sup_details($id)
	{
		$this->db->select('*');
		$this->db->from('sup');
		$this->db->join('r_insert_sup', 'r_insert_sup.r_sup_id = sup.id', 'left');
		$this->db->join('inserts_catalog', 'inserts_catalog.insert_id = r_insert_sup.r_insert_id', 'left');
		$this->db->where('sup.id', $id);
		$query = $this->db->get();

		//$lastone = $this->db->last_query();
		//print_r($lastone);

		return $query->result_array();
	}



	public function request()
	{
		$id = $this->input->post('id');
		$created_at = date("Y-m-d H:i:s");

		$data = array(
			'sup'=>$id,
			'created_at'=>$created_at,
			'location'=>$this->input->post('location'),
		);

		$this->db->insert('sup_requests',$data);
		$request_id = $this->db->insert_id();

		$contador = $this->input->post('contador');

		for($x = 1; $x <= $contador; $x++)
		{
			$pz = $this->input->post('pz_' . $x);

			if($pz != NULL || $pz != 0 )
			{
				$data2 = array(
					'r_insert_sup_id'=>$pz,
					'request_id'=>$request_id,
					'requested'=>1
				);
				$this->db->insert('requested_parts', $data2);
			}
		}
	}


	public function create()
	{
		$data = array(
			'partno'=>$this->input->post('partno'),
			'partno_descrip'=>$this->input->post('partno_descrip'),
			'boy_sup'=>$this->input->post('boy_sup'),
			'maquina'=>$this->input->post('maquina'),
			'resina'=>$this->input->post('resina'),
		);

		$this->db->insert('sup', $data);
		$sup_id = $this->db->insert_id();

		//requesting the sup here:
		$created_at = date("Y-m-d H:i:s");
		$data5 = array(
			'sup'=>$sup_id,
			'created_at'=>$created_at,
			'location'=>$this->input->post('location'),
		);
		$this->db->insert('sup_requests',$data5);
		$request_id = $this->db->insert_id(); //getting the request_id
		//end sup request



		$contador = $this->input->post('campos');

		for($x = 1; $x <= $contador; $x++)
		{
			$insert_no = $this->input->post('insert_no_'.$x);
			$insert_pz = $this->input->post('insert_pz_'.$x);
			$insert_position = $this->input->post('insert_position_'.$x);
			$insert_group = $this->input->post('insert_group_'.$x);
			$insert_description = $this->input->post('insert_description_'.$x);

			//checkboxes
			$is_requested = $this->input->post('is_requested_' . $x);


			$query = $this->db->get_where('inserts_catalog', array("insert_no"=>$insert_no));
			echo $num = $query->num_rows();


			if($num != 0)
			{
				echo "entra if";
				$row = $query->row_array();

				$lastone = $this->db->last_query();
				print_r($lastone);
				$insert_id = $row['insert_id'];
			}
			else
			{
				echo "entra else";

				$data2 = array(
					'insert_no'=>$insert_no,
					'insert_group'=>$insert_group,
					'insert_description'=>$insert_description
				);

				$this->db->insert('inserts_catalog', $data2);
				$insert_id = $this->db->insert_id();

			}

			$data3 = array(
				'r_sup_id'=>$sup_id,
				'r_insert_id'=>$insert_id,
				'r_insert_pz'=>$insert_pz,
				'r_insert_position'=>$insert_position,
			);

			$this->db->insert('r_insert_sup', $data3);

			//requested part/insert the one marked with a checkbox.
			$r_insert_sup_id = $this->db->insert_id();


			if($is_requested != NULL || $is_requested != 0 )
			{
				$data4 = array(
					'r_insert_sup_id'=>$r_insert_sup_id,
					'request_id'=>$request_id,
					'requested'=>$is_requested
				);
				$this->db->insert('requested_parts', $data4);
			}
		}

		//request the sup was made here:

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



	public function get_insert_details($postData)
	{
		$response = array();

		$this->db->select('insert_group, insert_description, insert_id, insert_no');
		$this->db->where('insert_no', $postData['plant_id']);
		$q = $this->db->get('inserts_catalog');
		$response = $q->result_array();

		return $response;
	}









}
