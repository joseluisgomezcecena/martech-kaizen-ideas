<?php
class Ideas extends CI_Controller
{
	public function create()
	{
		$data['title'] = 'Ideas Martech | Registrar idea 💡.';

		$this->form_validation->set_rules('nombre', 'Nombre del empleado', 'required');
		$this->form_validation->set_rules('numero_empleado', 'Numero de empleado', 'required');
		$this->form_validation->set_rules('plant', 'Planta', 'required');
		$this->form_validation->set_rules('idea_title', 'Nombre de la idea', 'required');
		$this->form_validation->set_rules('description', 'Descripción de la idea', 'required');
		$this->form_validation->set_rules('resultado_esperado', 'Resultado esperado.', 'required');
		$this->form_validation->set_rules('impacto[]', 'Areas de impacto.', 'required');

		if($this->input->post('impacto[]') == 'Otro')
		{
			$this->form_validation->set_rules('otro', 'Otro', 'required');
		}

		if($this->input->post('has_team') == '1')
		{
			$this->form_validation->set_rules('equipo[]', 'Miembros del equipo', 'required');
		}

		$this->form_validation->set_error_delimiters(
			'<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error en el registro</strong>',
			'<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>'
		);

		if($this->form_validation->run() === FALSE)
		{
			//load header, page & footer
			$this->load->view('templates/main/header',$data);
			$this->load->view('templates/main/topnav');
			$this->load->view('templates/main/sidebar');
			$this->load->view('templates/main/wrapper');
			$this->load->view('ideas/create', $data); //loading page and data
			$this->load->view('templates/main/footer');
		}
		else
		{
			//file upload codeigniter 3
			$config['upload_path'] = './assets/uploads';
			$config['allowed_types'] = 'ppt|xlsx|xls|doc|docx|pdf|jpg|png|jpeg|gif';
			$config['max_size'] = '20480';
			#$config['max_width'] = '2000';
			#$config['max_height'] = '2000';

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload())
			{
				$errors = array('error' => $this->upload->display_errors());
				$file = 'noimage.jpg';
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$file = $_FILES['userfile']['name'];
			}


			$id_idea = $this->IdeaModel->create($file);
			$this->session->set_flashdata(
				'idea_created', 'Tu idea ha sido registrada, puedes editarla despues. Con el folio: '.$id_idea .' y el numero de empleado registrado: ' . $this->input->post('numero_empleado')
			);
			redirect(base_url());
		}
	}


	public function search()
	{
		$data['title'] = 'Ideas Martech | Buscar idea 💡.';

		$this->form_validation->set_rules('numero_empleado', 'Numero de empleado', 'required');
		$this->form_validation->set_rules('id', 'Numero de Folio', 'required');

		$this->form_validation->set_error_delimiters(
			'<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error en parametros de busqueda</strong>',
			'<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>'
		);

		if($this->form_validation->run() === FALSE)
		{
			//load header, page & footer
			$this->load->view('templates/main/header',$data);
			$this->load->view('templates/main/topnav');
			$this->load->view('templates/main/sidebar');
			$this->load->view('templates/main/wrapper');
			$this->load->view('ideas/search', $data); //loading page and data
			$this->load->view('templates/main/footer');
		}
		else
		{
			$idea = $this->IdeaModel->search();
			if($idea == 0)
			{
				$this->session->set_flashdata(
					'idea_not_found', 'No se encontraron resultados con los parametros de busqueda.'
				);
				redirect(base_url('users/ideas/search'));
			}
			else
			{
				$this->session->set_flashdata(
					'idea_found', 'Se encontraron resultados con los parametros de busqueda.'
				);
				redirect(base_url('users/ideas/edit/'.$idea));
			}
			//redirect(base_url('users/ideas/edit/'.$idea));
		}
	}

}
