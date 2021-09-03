<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->data['page_type']='auth';
        $this->template = 'layouts/auth/main';
    }
    public function index(){
        if($this->session->userdata('login_id')==''){
            redirect('login');
        }else{
            $this->crud_model->login_details();
            redirect('admin');
            
        }
    }
    public function login(){
        if($this->session->userdata('login_id') != ''){
            redirect('auth');
        }
        if($this->input->post()){
        $username = $this->input->post('email');
        $password = $this->input->post('password');       
        if(!empty($username) && !empty($password)) {
        $res = $this->crud_model->validate_user_credentials($username, $password);
        if (!empty($res)) {
            $this->session->set_userdata('login_id', $res['id']);
            $this->session->set_userdata('role_id', $res['role_id']);
            redirect('auth', '');
        }else{
            $this->session->set_flashdata('error_msg', 'You Entered Invalid Email/Password');
        } 
        }else{
          $this->session->set_flashdata('error_msg', 'Username and Password Required');  
        }
        redirect('login', '');
        }
        $this->data['page_name']='login';
        $this->load->view($this->template,$this->data);           
    }
    public function login_action() {
        $username = $this->input->post('email');
        $password = $this->input->post('password');       
        $res = $this->crud_model->validate_user_credentials($username, $password);
        if (!empty($res)) {
            $this->session->set_userdata('login_id', $res['id']);
            $this->session->set_userdata('role_id', $res['role_id']);
        }else{
            $this->session->set_flashdata('error_msg', 'Your Enter Invalid Email/Password');
        } 
        redirect('auth', '');
       // redirect('dashboard', '');
    }
    function testauth() {
        $userid = '';
        $userdet = new stdClass();
        $userdet->userId = "karan_testbuyer3";
        $userdet->firstName = "Tulsi";
        $userdet->lastName = "Chandan";
        $userdet->DOB = "08042018";
        $userdet->mobileNumber = "7023416469";
        $userdet->emailAddress = "gemtest23@gmail.com";
        $userdet->ministry = "ministry of commerce";
        $userdet->state = "Delhi";
        $userdet->department = "department of commmerce";
        $userdet->roles = "buyer";
        $userdet->org_name = "GeM";
        $userdet->division = "division 1";
        $userdet->gstin = "";
        $userdet->AADHAR = "359987436746";
        $userdet->designation = "Director";
        $userdet->seqId = "0009";

        if ($userid == '') {
            $userdata = array(
                'user_ticket' => "64464646h99uiuupp",
                'userId' => $userdet->userId,
                'login_id' => $userdet->userId,
                'user_detail' => $userdet,
                'ref_url' => 'google.com',
                'status' => 1,
                'role_id' => 4,
                'accountDetails' => 'Acc Details here',
                'paymentMode' => 1,
            );

            $this->session->set_userdata($userdata);
        }
        if (!empty($userdata)) {
            echo "user set";
        //prx($this->session->all_userdata());            
        echo '<pre>'; print_r($this->session->all_userdata()); die;
        }
    }
    
    function testauthAdmin() {
        $userid = '';
        $userdet = new stdClass();
        $userdet->userId = "gem-admin";
        $userdet->firstName = "Vishal";
        $userdet->lastName = "Tomer";
        $userdet->mobileNumber = "9711660309";
        $userdet->emailAddress = "tulsi.chandan@gem.gov.in";
        $userdet->ministry = "ministry of commerce";
        $userdet->department = "department of commmerce";
        $userdet->roles = "admin";
        $userdet->org_name = "GeM";
        $userdet->division = "division 1";
        $userdet->gstin = "";
        $userdet->AADHAR = "359987436746";
        $userdet->designation = "Director";
        $userdet->seqId = "0009";

        if ($userid == '') {
            $userdata = array(
                'user_ticket' => "64464646h99uiuupp",
                'userId' => $userdet->userId,
                'login_id' => $userdet->userId,
                'user_detail' => $userdet,
                'ref_url' => 'google.com',
                'status' => 1,
                'role_id' => 6,
                'accountDetails' => 'Acc Details here',
                'paymentMode' => 1,
                'groupName' => 'BID VALIDITY EXTENSION,BID ENABLE PREFERENCE,BID CONSIGNEE MAPPING,BID L1 NEGOTIATION,BID NOTIFICATION VIEW,BID CORRIGENDUM UPLOAD'
            );

            $this->session->set_userdata($userdata);
        }
        if (!empty($userdata)) {
            echo "Admin set";
            //print_r($userdata);
            echo '<pre>'; print_r($this->session->all_userdata()); die;
        }
    }
    public function logout(){
     if ($this->session->userdata('login_id') != '')
        {
            $this->crud_model->logout_details();
        }
        session_destroy();
        redirect("auth");
    }
}
?>