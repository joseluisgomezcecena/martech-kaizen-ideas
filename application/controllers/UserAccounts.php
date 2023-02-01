<?php
class UserAccounts extends MY_Controller{


	public function index(){

		$data['users'] = $this->UserModel->get_users();

		$this->load->view('templates/header');
		$this->load->view('users/index', $data);
		$this->load->view('templates/footer');

	}



	public function view($id = NULL){

		$data['user'] = $this->UserModel->get_user($id);
		$data['departments'] = $this->InsertPartsModel->get_departments();

		$this->load->view('templates/header');
		$this->load->view('users/view', $data);
		$this->load->view('templates/footer');

	}





	public function delete($id = NULL){

		$this->UserModel->delete_user($id);
		redirect('/users/index');

	}


}
