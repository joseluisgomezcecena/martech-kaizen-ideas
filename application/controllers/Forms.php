<?php

class Forms extends MY_Controller{

	public function create()
	{
		$data['title'] = 'Crear nuevo request';
		$data['inserts'] = $this->InsertPartsModel->get_mold_inserts();
		$data['parts'] = $this->InsertPartsModel->get_parts();
		$data['rms'] = $this->InsertPartsModel->get_rm();


		$this->form_validation->set_rules('partno', 'Numero de parte', 'required');
		$this->form_validation->set_rules('partno_descrip', 'Descripcion', 'required');
		$this->form_validation->set_rules('boy_sup', 'SUP', 'required');
		$this->form_validation->set_rules('maquina', 'Maquina', 'required');
		$this->form_validation->set_rules('resina', 'Resina', 'required');
		$this->form_validation->set_rules('campos', 'Campos', 'required');
		$this->form_validation->set_rules('location', 'Planta', 'required');
		$this->form_validation->set_rules('checked', 'Insertos seleccionados', 'required|greater_than[0]');

		$this->form_validation->set_error_delimiters(
			'<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong class="uppercase"><bdi>Error</bdi></strong> &nbsp;',
			'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
		);


		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('forms/create', $data);
			$this->load->view('templates/footer');
		}
		else
		{

			//$this->FormModel->create_sup();
			$this->FormModel->create();

			//session message
			$this->session->set_flashdata('creado', 'Se ha creado el sup.');

			redirect(base_url() . 'forms/create');
		}

	}


	public function request($id = NULL)
	{
		$data['title'] = 'Request';
		$data['sup'] = $this->FormModel->get_single_sup($id);
		$data['details'] = $this->FormModel->get_single_sup_details($id);

		$this->form_validation->set_rules('id', 'ID', 'required');
		$this->form_validation->set_rules('contador', 'Seleccion de partes', 'required');
		$this->form_validation->set_rules('checked', 'Insertos seleccionados', 'required|greater_than[0]');
		$this->form_validation->set_rules('location', 'Planta', 'required');


		$this->form_validation->set_error_delimiters(
			'<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong class="uppercase"><bdi>Error</bdi></strong> &nbsp;',
			'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
		);

		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('forms/request', $data);
			$this->load->view('templates/footer');
		}
		else
		{

			$this->FormModel->request();

			//session message
			$this->session->set_flashdata('pedido', 'Se ha pedido el molde.');



			//email test

			$this->load->library('email');

			$subject = 'This is a test';
			$message = '<p>This message has been sent for testing purposes.</p>';

			$result = $this->email
				->from('jgomez@martechmedical.com')
				->reply_to('noreply@martechmedical.com')    // Optional, an account where a human being reads.
				->to('jgomez@martechmedical.com')
				->subject($subject)
				->message($message)
				->send();

			var_dump($result);
			echo '<br />';
			echo $this->email->print_debugger();

			exit;


			//email test end

			//redirect(base_url() . 'forms/request');
			redirect(base_url());
		}

	}



	public function get_insert_details()
	{
		// POST data
		$postData = $this->input->post();

		// load model
		$this->load->model('FormModel');

		// get data
		$data = $this->FormModel->get_insert_details($postData);
		echo json_encode($data);
	}





}
