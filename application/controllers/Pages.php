<?php

class Pages extends CI_Controller
{
	public function view($page = 'home')
	{
		if(!file_exists(APPPATH . 'views/pages/' . $page . '.php'))
		{
			show_404();
		}

		$data['title'] = "💡Martech Medical | Ideas v2.0.";

		//load header, page & footer

		$this->load->view('templates/main/header',$data);
		$this->load->view('pages/' . $page, $data); //loading page and data
		$this->load->view('templates/main/footer_wide');

	}


}
