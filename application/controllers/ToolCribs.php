<?php
class ToolCribs extends MY_Controller
{

	public function index()
	{

		$data['requests'] = $this->ToolCribModel->get_pending_requests();

		//load header, page & footer
		$this->load->view('templates/header');
		$this->load->view('toolcrib/index', $data); //loading page and data
		$this->load->view('templates/footer');
	}




	public function byplant($plant = NULL)
	{

		$data['plant'] = $plant;
		$data['requests'] = $this->ToolCribModel->get_pending_requests_by_plant($plant);

		//load header, page & footer
		$this->load->view('templates/header');
		$this->load->view('toolcrib/index_plant', $data); //loading page and data
		$this->load->view('templates/footer');
	}




	public function respond($id = NULL)
	{

		$data['request'] = $this->ToolCribModel->get_single_request($id);
		$data['details'] = $this->ToolCribModel->get_pending_requests_detail($id);
		$data['parts'] = $this->ToolCribModel->get_requested($id);

		//form validation
		$this->form_validation->set_rules('id', 'request id', 'required');

		if($this->form_validation->run() === FALSE)
		{
			//load header, page & footer
			$this->load->view('templates/header');
			$this->load->view('toolcrib/respond', $data); //loading page and data
			$this->load->view('templates/footer');

		}
		else
		{
			$this->ToolCribModel->mold_assembled();

			//session message
			$this->session->set_flashdata('armado', 'El molde esta armado y listo para entregarse.');

			redirect(base_url() . 'toolcrib/pending');
		}


	}





	public function deliver($id = NULL)
	{

		$data['request'] = $this->ToolCribModel->get_single_request($id);
		$data['details'] = $this->ToolCribModel->get_pending_requests_detail($id);
		$data['parts'] = $this->ToolCribModel->get_requested($id);

		//form validation
		$this->form_validation->set_rules('id', 'request id', 'required');
		$this->form_validation->set_rules('pickup_by', 'Persona que recibe.', 'required');
		$this->form_validation->set_rules('delivered_by', 'Persona que entrega.', 'required');

		if($this->form_validation->run() === FALSE)
		{
			//load header, page & footer
			$this->load->view('templates/header');
			$this->load->view('toolcrib/deliver', $data); //loading page and data
			$this->load->view('templates/footer');

		}
		else
		{
			$this->ToolCribModel->mold_delivered();

			//session message
			$this->session->set_flashdata('entregado', 'El molde ha sido entregado.');

			redirect(base_url() . 'toolcrib/pending');
		}


	}



}
