<?php

class Scans extends CI_Controller {

	public function create($location = NULL)
	{
		$data['title'] = 'Crear nuevo request';
		$data['location_id'] = $location;
		$data['location'] = $this->ScanModel->get_single_location($location);
		$data['shift'] = $this->ScanModel->get_shift(date('H:i:s'));

		$this->form_validation->set_rules('work_id', 'Numero de empleado', 'required');



		//error styles.
		$this->form_validation->set_error_delimiters(
			'<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong class="uppercase"><bdi>Error</bdi></strong> &nbsp;',
			'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
		);


		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/workspace_start');
			$this->load->view('scans/create', $data);
			$this->load->view('templates/footer');
		}
		else
		{

			$this->ScanModel->create();

			//session message
			$this->session->set_flashdata('creado', '<br> Se ha registrado el empleado: ' . $this->input->post('work_id'));
			redirect(base_url() . 'scans/new/' . $location);
		}

	}



	public function location()
	{
		$data['title'] = 'Locations';
		$data['locations'] = $this->ScanModel->get_locations();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/workspace_start');
		$this->load->view('scans/locations', $data);
		$this->load->view('templates/footer');
	}









}
