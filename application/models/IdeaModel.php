<?php
class IdeaModel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function create($file)
	{
		$impacto = implode(', ', $this->input->post('impacto'));

		$equipo = $this->input->post('equipo');

		$first = array_slice($equipo, 0, 1);
		$second = array_slice($equipo, 1,1);
		$third = array_slice($equipo, 2,1);

		if($this->input->post("has_team") === null){
			$has_team = 0;
		}else{
			$has_team = 1;
		}

		if($this->input->post("otro") === null)
		{
			$otro = "";
		}
		else
		{
			$otro = $this->input->post("otro");
		}



		$data = array(
			'nombre' => $this->input->post('nombre'),
			'numero_empleado' => $this->input->post('numero_empleado'),
			'plant' => $this->input->post('plant'),
			'title' => $this->input->post('idea_title'),
			'has_team'=>$has_team,
			'equipo1'=>$first[0],
			'equipo2'=>$second[0],
			'equipo3'=>$third[0],
			'description' => $this->input->post('description'),
			'resultado_esperado' => $this->input->post('resultado_esperado'),
			'impacto' => $impacto,
			'impacto_otro'=>$otro,
			'archivo' => $file,
			'fecha' => date('Y-m-d H:i:s'),
		);

		$this->db->insert('ideas', $data);
		return $this->db->insert_id();
	}


	public function search()
	{
		$this->db->select('*');
		$this->db->from('ideas');
		$this->db->where('numero_empleado', $this->input->post('numero_empleado'));
		$this->db->where('id', $this->input->post('id'));

		$query = $this->db->get();
		$idea = $query->row_array();
		return $idea['id'];
	}


	public function edit($id, $file)
	{
		$impacto = implode(', ', $this->input->post('impacto'));

		$equipo = $this->input->post('equipo');

		$first = array_slice($equipo, 0, 1);
		$second = array_slice($equipo, 1,1);
		$third = array_slice($equipo, 2,1);

		if($this->input->post("has_team") === null){
			$has_team = 0;
		}else{
			$has_team = 1;
		}

		if($this->input->post("otro") === null)
		{
			$otro = "";
		}
		else
		{
			$otro = $this->input->post("otro");
		}

		if($file == "empty")
		{
			$data = array(
				'nombre' => $this->input->post('nombre'),
				'numero_empleado' => $this->input->post('numero_empleado'),
				'plant' => $this->input->post('plant'),
				'title' => $this->input->post('idea_title'),
				'has_team'=>$has_team,
				'equipo1'=>$first[0],
				'equipo2'=>$second[0],
				'equipo3'=>$third[0],
				'description' => $this->input->post('description'),
				'resultado_esperado' => $this->input->post('resultado_esperado'),
				'impacto' => $impacto,
				'impacto_otro'=>$otro,
				'fecha' => date('Y-m-d H:i:s'),
			);

		}
		else
		{
			$data = array(
				'nombre' => $this->input->post('nombre'),
				'numero_empleado' => $this->input->post('numero_empleado'),
				'plant' => $this->input->post('plant'),
				'title' => $this->input->post('idea_title'),
				'has_team'=>$has_team,
				'equipo1'=>$first[0],
				'equipo2'=>$second[0],
				'equipo3'=>$third[0],
				'description' => $this->input->post('description'),
				'resultado_esperado' => $this->input->post('resultado_esperado'),
				'impacto' => $impacto,
				'impacto_otro'=>$otro,
				'archivo' => $file,
				'fecha' => date('Y-m-d H:i:s'),
			);

		}


		$query = $this->db->update('ideas', $data, array('id' => $id));
		return $id;
	}


    public function update_status($id, $file)
	{
		if($this->input->post('notas') == "")
		{
			$notas = "N/A";
		}
		else
		{
			$notas = $this->input->post('notas');
		}

		if($file == "empty")
		{
			$data = array(
				'status' => $this->input->post('status'),
				'notas' => $notas,
			);
		}
		else
		{
			$data = array(
				'status' => $this->input->post('status'),
				'archivo_evaluador' => $file,
				'notas' => $notas,
			);
		}


		$query = $this->db->update('ideas', $data, array('id' => $id));
		return $id;
	}

	public function get($id)
	{
		$this->db->select('*');
		$this->db->from('ideas');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}


	public function get_all()
	{
		$query = $this->db->get('ideas');
		return $query->result_array();
	}


	public function get_all_by_status($status)
	{
		$query = $this->db->get_where('ideas', array('status' => $status));
		return $query->result_array();
	}



	public function form_search()
	{
		$status = $this->input->post('status');
		$empleado = $this->input->post('numero_empleado');
		$desde = $this->input->post('desde');
		$hasta = $this->input->post('hasta');

		$this->db->select('*');
		$this->db->from('ideas');
		if($status != "")
		{
			$this->db->where('status', $status);
		}
		if($empleado != "")
		{
			$this->db->where('numero_empleado', $empleado);
		}
		if($desde != "")
		{
			$this->db->where('fecha >=', $desde);
		}
		if($hasta != "")
		{
			$this->db->where('fecha <=', $hasta);
		}
	}


	public function count()
	{
		$query = $this->db->get('ideas');
		return $query->num_rows();
	}


	public function count_by_status($status)
	{
		$query = $this->db->get_where('ideas', array('status' => $status));
		return $query->num_rows();
	}


	public function get_recent()
	{
		$this->db->select('*');
		$this->db->from('ideas');
		$this->db->where('status', 0);
		$this->db->order_by('id', 'desc');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result_array();
	}

}
