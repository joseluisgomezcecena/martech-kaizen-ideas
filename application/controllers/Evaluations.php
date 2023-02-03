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

		$this->form_validation->set_rules('status', 'Evaluación', 'required');

		if($this->input->post('status') == '3')//rechazada
		{
			$this->form_validation->set_rules('notas', 'Retroalimentación', 'required');
		}



		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/main/header',$data);
			$this->load->view('templates/main/topnav');
			$this->load->view('templates/main/sidebar');
			$this->load->view('templates/main/wrapper');
			$this->load->view('evaluations/index', $data); //loading page and data
			$this->load->view('templates/main/footer');
		}
		else
		{
			//uploading file
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


			$this->IdeaModel->update_status($id, $file);
			$this->session->set_flashdata('idea_updated', 'Evaluación guardada.');
			redirect(base_url() . 'admin');
		}


	}
}
