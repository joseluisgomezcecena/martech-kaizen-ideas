<?php

class Keyboards extends CI_Controller {


	public function create($location = NULL, $type = NULL)
	{
		$data['title'] = 'Crear nuevo request';
		$data['employees'] = $this->ReportModel->get_employees();
		$data['location_id'] = $location;
		$data['type'] = $type;
		$data['location'] = $this->ScanModel->get_single_location($location);
		$shift = $data['shift'] = $this->ShiftModel->get_shift(date('H:i:s'), $type); //send shift to create function.
		//$shift = $data['shift'] = $this->ShiftModel->get_shift(date('23:59:25'), $type); //test send shift to create function.

		$this->form_validation->set_rules('work_id', 'Numero de empleado', 'required');
		$this->form_validation->set_rules('date', 'Fecha y Hora', 'required');



		//error styles.
		$this->form_validation->set_error_delimiters(
			'<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Error!</strong>&nbsp;&nbsp;',
			'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
		);


		if($this->form_validation->run() === FALSE)
		{
			/*
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/workspace_start');
			$this->load->view('keyboards/create', $data);
			$this->load->view('templates/footer');
			*/

			$this->load->view('templates/main/header');
			$this->load->view('templates/main/topnav');
			$this->load->view('templates/main/sidebar');
			$this->load->view('templates/main/wrapper');
			$this->load->view('keyboards/create', $data); //loading page and data
			$this->load->view('templates/main/footer');

		}
		else
		{
			$shift_excel = $data['shift_excel'] = $this->ShiftModel->get_shift_excel(date('H:i:s'));

			$found = $this->KeyBoardModel->create($shift, $shift_excel, $type);




			if($found == "notfound")
			{
				$notes = "<br><span style='color:#2a2a2a; font-weight: bolder'>Se Registro manualmente</span>.";
			}else{
				$notes = "";
			}
			//session message
			$this->session->set_flashdata('creado', '<br> Se ha registrado el empleado: ' . $this->input->post('work_id') . $notes);
			redirect(base_url() . 'keyboards/new/' . $location . '/' . $type);
		}
	}





	public function location($type = NULL)
	{
		$data['title'] = 'Locations';
		$data['locations'] = $this->ScanModel->get_locations();
		$data['type'] = $type;

		/*
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/workspace_start');
		$this->load->view('keyboards/locations', $data);
		$this->load->view('templates/footer');
		*/

		$this->load->view('templates/main/header');
		$this->load->view('templates/main/topnav');
		$this->load->view('templates/main/sidebar');
		$this->load->view('templates/main/wrapper');
		$this->load->view('keyboards/locations', $data); //loading page and data
		$this->load->view('templates/main/footer');

	}




	public function type()
	{
		$data['title'] = 'Type of registration.';


		/*
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/workspace_start');
		$this->load->view('keyboards/type', $data);
		$this->load->view('templates/footer');
		*/
		$this->load->view('templates/main/header');
		$this->load->view('templates/main/topnav');
		$this->load->view('templates/main/sidebar');
		$this->load->view('templates/main/wrapper');
		$this->load->view('keyboards/type', $data); //loading page and data
		$this->load->view('templates/main/footer');


	}





}
