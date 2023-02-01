<?php

class Records extends MY_Controller{

	public function index()
	{
		$data['title'] = "Registros";
		$data['scans'] = $this->ReportModel->get_scans();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/workspace_start');
		$this->load->view('records/index', $data); //loading page and data
		$this->load->view('templates/footer');
	}


	public function edit($id = NULL)
	{
		$data['title'] = "Editar Registro";
		$data['scan'] = $this->RecordModel->get_record($id);
		$data['locations'] = $this->PlanningGroupModel->get_locations();

		if(empty($data['scan']))
		{
			show_404();
		}

		$this->form_validation->set_rules('id', 'Registro a editar', 'required');
		$this->form_validation->set_rules('emp_number', 'Numero de empleado', 'required');
		$this->form_validation->set_rules('location', 'Ubicación', 'required');
		$this->form_validation->set_rules('schedule', 'Horario', 'required');
		$this->form_validation->set_rules('check_in', 'Hora de entrada', 'required');
		$this->form_validation->set_rules('check_out', 'Hora de salida', 'required');


		if($this->form_validation->run()===FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/workspace_start');
			$this->load->view('records/edit', $data); //loading page and data
			$this->load->view('templates/footer');
		}
		else
		{
			$this->RecordModel->update_record();
			$this->session->set_flashdata('record_updated', 'Registro actualizado');
			redirect(base_url() . 'records');
		}

	}



	public function delete($id = NULL)
	{
		$data['title'] = "Eliminar o Borrar Registro";
		$data['scan'] = $this->RecordModel->get_record($id);
		$data['locations'] = $this->PlanningGroupModel->get_locations();

		if(empty($data['scan']))
		{
			show_404();
		}

		$this->form_validation->set_rules('id', 'Registro a editar', 'required');

		if($this->form_validation->run()===FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/workspace_start');
			$this->load->view('records/delete', $data); //loading page and data
			$this->load->view('templates/footer');
		}
		else
		{
			$this->RecordModel->delete_record();
			$this->session->set_flashdata('record_deleted', 'Registro borrado o eliminado.');
			redirect(base_url() . 'records');
		}

	}





}
