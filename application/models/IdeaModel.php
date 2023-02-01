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

		$data = array(
			'nombre' => $this->input->post('nombre'),
			'numero_empleado' => $this->input->post('numero_empleado'),
			'plant' => $this->input->post('plant'),
			'title' => $this->input->post('idea_title'),
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


}
