<?php

class EngineeringModel extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}


	//end at line 81.
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

		}
	}






	public function update()
	{
		$sup_id = $this->input->post('id');

		$data = array(
			'partno'=>$this->input->post('partno'),
			'partno_descrip'=>$this->input->post('partno_descrip'),
			'boy_sup'=>$this->input->post('boy_sup'),
			'maquina'=>$this->input->post('maquina'),
			'resina'=>$this->input->post('resina'),
		);

		$this->db->update('sup',$data, array('id'=>$sup_id));


		//delete relationships between sup and inserts on r_insert_sup table.
		$this->db->delete('r_insert_sup', array('r_sup_id'=>$sup_id));



		$contador = $this->input->post('campos');

		for($x = 1; $x <= $contador; $x++)
		{
			$insert_no = $this->input->post('insert_no_'.$x);
			$insert_pz = $this->input->post('insert_pz_'.$x);
			$insert_position = $this->input->post('insert_position_'.$x);
			$insert_group = $this->input->post('insert_group_'.$x);
			$insert_description = $this->input->post('insert_description_'.$x);

			//checkboxes
			//$is_requested = $this->input->post('is_requested_' . $x);


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
			//$r_insert_sup_id = $this->db->insert_id();

		}
	}





	public function newRevision($revision)
	{
		$newrevision = $revision + 1;



		$data = array(
			'partno'=>$this->input->post('partno'),
			'partno_descrip'=>$this->input->post('partno_descrip'),
			'boy_sup'=>$this->input->post('boy_sup'),
			'maquina'=>$this->input->post('maquina'),
			'resina'=>$this->input->post('resina'),
			'revision'=>$newrevision,
		);

		$this->db->insert('sup', $data);
		$sup_id = $this->db->insert_id();


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

		}


	}





}
