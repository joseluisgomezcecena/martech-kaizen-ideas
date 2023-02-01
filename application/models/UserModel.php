<?php

class UserModel extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}

	public function register($encrypted_pwd)
	{
		$data = array(
			'user_name'=>$this->input->post('user_name'),
			'email'=>$this->input->post('email'),
			'user_department_id'=>$this->input->post('user_department_id'),
			'password'=>$encrypted_pwd,
			'user_martech_number'=>$this->input->post('user_martech_number'),
		);

		return $this->db->insert('users', $data);
	}


	public function update($encrypted_pwd, $id)
	{
		$data = array(
			'user_name'=>$this->input->post('user_name'),
			'email'=>$this->input->post('email'),
			'user_department_id'=>$this->input->post('user_department_id'),
			'password'=>$encrypted_pwd,
			'user_martech_number'=>$this->input->post('user_martech_number'),
		);

		return $this->db->update('users', $data, array('user_id'=>$id));
		//return $this->db->insert('users', $data);
	}


	public function edit_profile($post_image, $uploaded, $user_id, $encrypted_pwd)
	{
		$id = $user_id;

		if($uploaded== 0)
		{
			$data = array(
				'name'=>$this->input->post('name'),
				'email'=>$this->input->post('email'),
				'username'=>$this->input->post('username'),
				'phone'=>$this->input->post('phone'),
				'password'=>$encrypted_pwd,
				'bio'=>$this->input->post('bio'),
			);
		}
		else
		{
			$data = array(
				'name'=>$this->input->post('name'),
				'email'=>$this->input->post('email'),
				'username'=>$this->input->post('username'),
				'phone'=>$this->input->post('phone'),
				'password'=>$encrypted_pwd,
				'bio'=>$this->input->post('bio'),
				'profile_image'=>$post_image,
			);
		}

		return $this->db->update('users', $data, array('id'=>$id));


	}


	public function login($username, $password)
	{
		$authdb = $this->load->database('authdb', TRUE);


		$authdb->select('*');
		$authdb->from('users');
		$authdb->where('user_email', $username);
		$authdb->where('user_department_id', '1');
		$query = $authdb->get();

		$last_query = $authdb->last_query();
		print_r($last_query);

		$result = $query->row_array();

		if (!empty($result) && password_verify($password, $result['user_password'])) {
			return $result;
		} else {
			return false;
		}
	}


	public function check_username_exists($username)
	{
		$query = $this->db->get_where('users', array('user_name' => $username));

		if(empty($query->row_array()))
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	public function check_email_exists($email)
	{
		$query = $this->db->get_where('users', array('email' => $email));

		if(empty($query->row_array()))
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	public function delete_user($id)
	{
		$this->db->delete('users', array('id' => $id));
	}


	public function get_user($id)
	{
		$query = $this->db->get_where('users', array('user_id'=>$id));
		return $query->row_array();
	}




	public function get_users()
	{
		//$query = $this->db->get('users');
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('departments', 'users.user_department_id = departments.department_id', 'left');
		$query = $this->db->get();
		return $query->result_array();
	}


	public function get_users_quality()
	{
		//otra db
		$authdb = $this->load->database('authdb', TRUE);

		$query = $authdb->get_where('users', array('user_department_id'=>3));
		return $query->result_array();
	}

}
