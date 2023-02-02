<?php
class Admins extends CI_Controller
{
	public function create()
	{
		$data['title'] = '💡 Ideas Martech | Admin Panel.';
		$data['idea_count'] = $this->IdeaModel->count();

			//load header, page & footer
		$this->load->view('templates/main/header',$data);
		$this->load->view('templates/main/topnav');
		$this->load->view('templates/main/sidebar');
		$this->load->view('templates/main/wrapper');
		$this->load->view('admin/index', $data); //loading page and data
		$this->load->view('templates/main/footer');
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
				//create a session to pass the idea id
				$idea_data = array(
					'idea_id'=>$idea,
					'edit'=>true,
				);
				$this->session->set_userdata($idea_data);


				$this->session->set_flashdata(
					'idea_found', 'Se encontraron resultados con los parametros de busqueda.'
				);
				redirect(base_url('users/ideas/edit/'.$idea));
			}

		}
	}



	public function edit($id)
	{
		$data['title'] = 'Ideas Martech | Editar idea 💡.';

		$data['idea'] = $this->IdeaModel->get($id);

		if(empty($data['idea']))
		{
			show_404();
		}

		if (!isset($this->session->userdata['idea_id']))
		{
			show_404();
		}
		if($this->session->userdata['idea_id'] != $id)
		{
			show_404();
		}

		#$impacto = explode(',', $data['idea']['impacto']);

		$impacto = array_map('trim', explode(',', $data['idea']['impacto']));
		$data['impacto'] = $impacto;


		$data['calidad'] = '';
		$data['entregas'] = '';
		$data['eficiencia'] = '';
		$data['seguridad'] = '';
		$data['productividad'] = '';
		$data['otro']  = '';
		$data['ambiente']  = '';

		$calidad = in_array('calidad', $impacto);

		if($calidad !== false)
		{
			$data['calidad'] = 'checked';
		}

		$entregas = in_array('entregas', $impacto);
		if($entregas !== false)
		{
			$data['entregas'] = 'checked';
		}
		$eficiencia = in_array('eficiencia', $impacto);
		if($eficiencia !== false)
		{
			$data['eficiencia'] = 'checked';
		}
		$seguridad = in_array('seguridad', $impacto);
		if($seguridad !== false)
		{
			$data['seguridad'] = 'checked';
		}
		$productividad = in_array('productividad', $impacto);
		if($productividad !== false)
		{
			$data['productividad'] = 'checked';
		}
		$otro = in_array('otro', $impacto);
		if($otro !== false)
		{
			$data['otro'] = 'checked';
		}
		$ambiente = in_array('ambiente', $impacto);
		if($ambiente !== false)
		{
			$data['ambiente'] = 'checked';
		}



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
			//validation for team members
			$data = 0;
			$team_members = $this->input->post('equipo', TRUE);
			foreach ($team_members as $team_member)
			{
				if ($team_member != '')
				{
					$data++;
				}
			}

			if($data == 0)
			{
				$this->form_validation->set_rules('equipo[]', 'Miembros del equipo', 'required');
			}
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
			$this->load->view('ideas/edit', $data); //loading page and data
			$this->load->view('templates/main/footer');
		}
		else
		{

			//check if file input is empty.
			if(!empty($_FILES["userfile"]["name"]))
			{
				//file upload codeigniter 3
				$config['upload_path'] = './assets/uploads';
				$config['allowed_types'] = 'ppt|xlsx|xls|doc|docx|pdf|jpg|png|jpeg|gif';
				$config['max_size'] = '20480';


				$this->load->library('upload', $config);

				if(!$this->upload->do_upload())
				{
					$errors = array('error' => $this->upload->display_errors());
					$file = 'noimage.jpg';
					$this->session->set_flashdata(
						'errors', 'Error al subir el archivo, asegurate de que sea un archivo valido.'. $errors['error']
					);
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
					$file = $_FILES['userfile']['name'];
				}
			}
			else
			{
				$file = 'empty';
			}


			$id_idea = $this->IdeaModel->edit($id, $file);
			$this->session->set_flashdata(
				'idea_created', 'Tu idea ha sido actualizada, puedes editarla despues. Con el folio: '.$id_idea .' y el numero de empleado registrado: ' . $this->input->post('numero_empleado')
			);
			redirect(base_url());

		}




	}



}
