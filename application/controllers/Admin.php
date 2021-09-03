<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct() {
        parent::__construct();
        if($this->session->userdata('login_id')==''){
            redirect('auth');
        }
        $this->data['page_type']='admin';
        $this->template = 'layouts/admin/main';
    }

	public function index()
	{
		$this->data['page_name']='dashboard';
		$this->data['page_title']='Dashboard';
		$this->load->view($this->template,$this->data);
	}
}