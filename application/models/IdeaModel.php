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
			'archivo' => $file,
			'fecha' => date('Y-m-d H:i:s'),
		);
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



}
