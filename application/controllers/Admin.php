<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct() {
        parent::__construct();
        if($this->session->userdata('userId')==''){
            redirect('auth');
        }
        $this->data['page_type']='admin';
        $this->template = 'layouts/admin/main';
    }


	public function index()
	{
		$this->data['page_name'] = 'dashboard';
		$this->data['page_title'] = 'Dashboard';
		$this->load->view($this->template, $this->data);

	}

	public function registration()
	{

		$this->data['page_name'] = 'registration';
		$this->data['page_title'] = 'IFA Registration';

		$this->load->view($this->template, $this->data);

	}
	public function ifauserslist()
	{

		$this->data['page_name'] = 'ifauserslist';
		$this->data['page_title'] = 'IFA Userslist';
		$res = $this->crud_model->get_ifa_users_list();
		$this->data['userslist'] = $res;
		$this->load->view($this->template, $this->data);

	}

	public function IFA_user_save()
	{

		$this->data['page_name'] = 'registration';
		$this->data['page_title'] = 'IFA Registration';

		if ($this->input->post()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$location = $this->input->post('location');
			$designation = $this->input->post('designation');
			$firstname = $this->input->post('first_name');
			$lastname = $this->input->post('last_name');

			if (!empty($username) && !empty($password)) {
				$res = $this->crud_model->validate_user_credentials($username, $password);

				if (!empty($res)) {
					$this->session->set_flashdata('error_msg', 'Email/Password already exist');
				}
			}
			else {
					$this->session->set_flashdata('error_msg', 'Username and Password Required');
				}
				if (!empty($lastname) && !empty($designation) && !empty($location)) {
					$res = $this->crud_model->saving_user_details($username, $password, $location, $designation, $firstname, $lastname);

				} else {
					$this->session->set_flashdata('error_msg', 'Destination,Location and Firstname Required');
				}
				redirect('registration', '');
			}
			$this->data['page_name'] = 'registration';
			$this->load->view($this->template, $this->data);

		}
	}
