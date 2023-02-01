<?php

class EngineeringForms extends MY_Controller {

	public function index()
	{
		$data['sups'] = $this->SupModel->get_sups();

		$this->load->view('templates/header');
		$this->load->view('engineering/index', $data);
		$this->load->view('templates/footer');
	}



	public function create()
	{
		$data['title'] = 'Crear nuevo sup';
		$data['inserts'] = $this->InsertPartsModel->get_mold_inserts();
		$data['parts'] = $this->InsertPartsModel->get_parts();
		$data['rms'] = $this->InsertPartsModel->get_rm();


		$this->form_validation->set_rules('partno', 'Numero de parte', 'required');
		$this->form_validation->set_rules('partno_descrip', 'Descripcion', 'required');
		$this->form_validation->set_rules('boy_sup', 'SUP', 'required');
		$this->form_validation->set_rules('maquina', 'Maquina', 'required');
		$this->form_validation->set_rules('resina', 'Resina', 'required');
		$this->form_validation->set_rules('campos', 'Campos', 'required');


		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('engineering/create', $data);
			$this->load->view('templates/footer');
		}
		else
		{

			//$this->FormModel->create_sup();
			$this->EngineeringModel->create();

			//session message
			$this->session->set_flashdata('creado', 'Se ha creado el sup.');

			redirect(base_url() . 'engineering/create');
		}

	}


	public function update($id = NULL)
	{
		$data['title'] = 'Update';
		$data['sup'] = $this->FormModel->get_single_sup($id);
		$data['details'] = $this->FormModel->get_single_sup_details($id);
		$data['inserts'] = $this->InsertPartsModel->get_mold_inserts();
		$data['parts'] = $this->InsertPartsModel->get_parts();
		$data['rms'] = $this->InsertPartsModel->get_rm();



		$this->form_validation->set_rules('id', 'ID', 'required');
		//$this->form_validation->set_rules('contador', 'Seleccion de partes', 'required');

		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('engineering/update', $data);
			$this->load->view('templates/footer');
		}
		else
		{

			$this->EngineeringModel->update();
			//session message
			$this->session->set_flashdata('updated', 'Se ha actualizado el S.U.P.');
			redirect(base_url() . "engineering/index");

		}
	}




	public function newrevision($id = NULL)
	{
		$data['title'] = 'New Revision';
		$data['sup'] = $this->FormModel->get_single_sup($id);
		$data['details'] = $this->FormModel->get_single_sup_details($id);
		$data['inserts'] = $this->InsertPartsModel->get_mold_inserts();
		$data['parts'] = $this->InsertPartsModel->get_parts();
		$data['rms'] = $this->InsertPartsModel->get_rm();


		$revision = $data['sup']['revision'];


		$this->form_validation->set_rules('id', 'ID', 'required');
		//$this->form_validation->set_rules('contador', 'Seleccion de partes', 'required');

		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('engineering/newrevision', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->EngineeringModel->newRevision($revision);
			//session message
			$this->session->set_flashdata('created', 'Se ha actualizado el S.U.P.');
			redirect(base_url() . "engineering/index");
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
