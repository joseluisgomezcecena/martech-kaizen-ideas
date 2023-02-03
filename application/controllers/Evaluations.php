<?php
class Evaluations extends CI_Controller
{
	public function index($id)
	{
		$data['title'] = '💡Evaluaciones | Martech Medical Ideas v2.0.';
		$data['idea'] = $this->IdeaModel->get($id);

		if(empty($data['idea']))
		{
			show_404();
		}



		$this->load->view('templates/main/header',$data);
		$this->load->view('templates/main/topnav');
		$this->load->view('templates/main/sidebar');
		$this->load->view('templates/main/wrapper');
		$this->load->view('evaluations/index', $data); //loading page and data
		$this->load->view('templates/main/footer');
	}
}
