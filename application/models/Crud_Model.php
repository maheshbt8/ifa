<?php

class Crud_Model extends CI_Model{
    protected $system_name;
    protected $login_id;
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');   
        //$this->system_name = $this->db->get_where('settings', array('setting_type' => 'system_name'))->row()->description;
        $this->login_id = $this->session->userdata('login_id');
        $this->role_id = $this->session->userdata('role_id');
    }
    
    public function validate_user_credentials($username, $password){
        $where="( username ='".$username."' )";
    	return $this->db->where($where)->get_where("ifa_users", array("password" => hash ( "sha256",$password)))->row_array();
    }
    function login_details(){
        $users_data=$this->db->get_where('login_details',array('user_id'=>$this->session->userdata('userId'),'role_id'=>$this->session->userdata('role_id')));
        if($users_data->num_rows()>0){
            $data['login_at']=date('Y-m-d H:i:s');
            return $this->db->where('id',$users_data->row()->id)->update('login_details',$data);
        }else{
            $data['user_id']=$this->session->userdata('userId');
            $data['role_id']=$this->session->userdata('role_id');
            $data['login_at']=date('Y-m-d H:i:s');
            return $this->db->insert('login_details',$data);
        }
    }
    function logout_details(){
            $data['logout_at']=date('Y-m-d H:i:s');
            return $this->db->where(['user_id'=>$this->login_id,'role_id'=>$this->role_id])->update('login_details',$data);
    }
    public function setssousers()
    {
        $data=array(
                'username'=>$this->session->userdata('userId'),
                'name'=>$this->session->userdata('firstName').' '.$this->session->userdata('lastName'),
            );
        if($this->session->userdata('role_id') == 4){
            $res=$this->db->get_where('buyer_details',array('username'=>$this->session->userdata('userId')))->num_rows();
            if($res == 0){
                $this->db->insert('buyer_details',$data);    
            }
        }elseif($this->session->userdata('role_id') == 6){
            $res=$this->db->get_where('hod_details',array('username'=>$this->session->userdata('userId')))->num_rows();
            //print_r($this->db->last_query());die;
            if($res == 0){
                $this->db->insert('hod_details',$data);    
            }
        }
        return true;
    }
    public function save_user_details($inputData){
        $this->db->insert('users', $inputData);
        $lid = $this->db->insert_id();
        $pid=$this->crud_model->generate_unique_id($lid,$inputData['exam_type']);
        $this->db->where('id',$lid)->update('users',array('unique_id'=>$pid,'modified_at'=>date('Y-m-d H:i:s')));
        $data['l_id']=$lid;
        $data['unique_id']=$pid;
        return $data;
    }
    function saving_insert_details($table,$inputdata){
        $res=$this->db->insert($table,$inputdata);
        if($res){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
	function saving_user_details($username,$password,$location,$designation,$firstname,$lastname){
    	$table="ifa_users";
		$data = array(
			'username'     => $username,
			'password'  => $password,
			'location'   => $location,
			'designation' => $designation,
			'first_name'     => $firstname,
			'last_name'  => $lastname,
			'role_id'   => 1,

		);
		$this->db->insert($table,$data);

	}
    function get_user_details($id = '') {
    		return $this->db->get_where('users',array('id'=>$id))->row_array();
    }
    function get_role_details($id = '') {
    		return $this->db->get_where('roles',array('id'=>$id))->row_array();
    }
    function update_system_settings() {
        if(!empty($this->input->post('system_name'))){
        $data['description'] = $this->input->post('system_name');
        $this->db->where('setting_type', 'system_name');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('system_title'))){
        $data['description'] = $this->input->post('system_title');
        $this->db->where('setting_type', 'system_title');
        $this->db->update('settings', $data);
        }   
        if(!empty($this->input->post('address'))){
        $data['description'] = $this->input->post('address');
        $this->db->where('setting_type', 'address');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('mobile'))){   
        $data['description'] = $this->input->post('mobile');
        $this->db->where('setting_type', 'mobile');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('whatsapp_number'))){   
        $data['description'] = $this->input->post('whatsapp_number');
        $this->db->where('setting_type', 'whatsapp_number');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('system_email'))){
        $data['description'] = $this->input->post('system_email');
        $this->db->where('setting_type', 'system_email');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('email_password'))){
        $data['description'] = $this->input->post('email_password');
        $this->db->where('setting_type', 'email_password');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('fb'))){
        $data['description'] = $this->input->post('fb');
        $this->db->where('setting_type', 'facebook');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('twiter'))){
        $data['description'] = $this->input->post('twiter');
        $this->db->where('setting_type', 'twiter');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('youtube'))){
        $data['description'] = $this->input->post('youtube');
        $this->db->where('setting_type', 'youtube');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('sms_username'))){
        $data['description'] = $this->input->post('sms_username');
        $this->db->where('setting_type', 'sms_username');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('sms_sender'))){
        $data['description'] = $this->input->post('sms_sender');
        $this->db->where('setting_type', 'sms_sender');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('sms_hash'))){
        $data['description'] = $this->input->post('sms_hash');
        $this->db->where('setting_type', 'sms_hash');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('students_opted'))){
        $data['description'] = $this->input->post('students_opted');
        $this->db->where('setting_type', 'students_opted');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('qualified_students'))){
        $data['description'] = $this->input->post('qualified_students');
        $this->db->where('setting_type', 'qualified_students');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('5_star_rated'))){
        $data['description'] = $this->input->post('5_star_rated');
        $this->db->where('setting_type', '5_star_rated');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('exemptions_scored'))){
        $data['description'] = $this->input->post('exemptions_scored');
        $this->db->where('setting_type', 'exemptions_scored');
        $this->db->update('settings', $data);
        }
        return true;
    }  
    // SMS settings.
    function update_sms_settings() {
        
        $data['description'] = $this->input->post('sms_username');
        $this->db->where('setting_type', 'sms_username');
        $this->db->update('settings', $data);
        
        $data['description'] = $this->input->post('sms_sender');
        $this->db->where('setting_type', 'sms_sender');
        $this->db->update('settings', $data);
        
        $data['description'] = $this->input->post('sms_hash');
        $this->db->where('setting_type', 'sms_hash');
        $this->db->update('settings', $data);
    }
    function update_user_password($password,$user_id){
        $password=hash ( "sha256",$password);
        $data['password'] = $password;
        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }
    function set_row_status($table,$type,$where,$status=0){
        $data['row_status']=$status;
        $data['modified_at']=date('Y-m-d H:i:s');
        return $this->db->where($type,$where)->update($table,$data);
    }
    function get_requestcallback_info(){
        return $this->db->order_by('id','DESC')->get_where('requestcallback',array('row_status !='=>0))->result_array();
    }
    
    /*
     * Common Operations
     * ********************************************************************************************************************
     */
    
    function insert_operation($inputdata, $table)
    {
        $result  = $this->db->insert($table,$inputdata);
        return $this->db->insert_id();
    }
    function update_operation($inputdata,$table, $where)
    {
        return $this->db->where($where)->update($table,$inputdata);
    }
    /*function update_operation( $inputdata, $table, $where ){
        $result  = $this->db->update($table,$inputdata, $where);
        return $result;
    }*/
    ///GET NAME BY TABLE NAME AND ID///
    function get_type_name_by_id($type, $type_id = '', $field = 'name')
    {
        if ($type_id != '') {
            $l = $this->db->get_where($type, array(
                'id' => $type_id
            ));
            $n = $l->num_rows();
            if ($n > 0) {
                return $l->row()->$field;
            }else{
                return FALSE;
            }
        }
    }
    
    ///GET NAME BY TABLE NAME AND ID///
    function get_type_name_by_where($type, $where_column = 'id', $type_id = '', $field = 'name')
    {
        if ($type_id != '') {
            $l = $this->db->get_where($type, array($where_column => $type_id));
            $n = $l->num_rows();
            if ($n > 0) {
                return $l->row()->$field;
            }else{
                return FALSE;
            }
        }
    }
    
    
    function count_records( $table, $condition = '' ){
        if( !(empty($condition)) )
            $this->db->where( $condition );
            $this->db->from($table);
            $reocrds = $this->db->count_all_results();
            //echo $this->db->last_query();
            return $reocrds;
    }

    function get_common_data_by_where($type, $where)
    {
        if ($type != '') {
            $l = $this->db->where($where)->get($type);
            $n = $l->num_rows();
            if ($n > 0) {
                return $l->result_array();
            }
        }
    }
    /**
     *@author Mahesh
     *@param table string
     *@param where Array
     *@param order_by Array
     *@desc To fetch data from respective table with given condition and order
     */
    public function select_results_info($table, $where='', $order_by='',$limit='',$data_start='')
    {
        if($where != ''){
            $this->db->where($where);
        }
        if($order_by!=''){
            $this->db->order_by($order_by);
        }
        if($limit!=''){
            $this->db->limit($limit,$data_start);
        }
        $query = $this->db->get($table);
        //echo $this->db->last_query();die;
            return $query;
    }
}

?>
