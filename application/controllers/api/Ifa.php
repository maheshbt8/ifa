<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Ifa extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function ifa_users_get($username = '')
	{
        $data=array();
        if(!empty($username)){
            $hods=$this->db->where('username',$username)->get('hod_details');
            if($hods->num_rows() == 1){
                $id=$hods->row()->id;
                $data = $this->db->select('iu.id,iu.first_name,iu.last_name,iu.username')->from("ifa_users as iu")->join('hod_ifas as hi','iu.id = hi.ifa_id')->where(['hi.hod_id' => $id,'iu.status'=>1])->get()->result();   
            }
        }
     
        $this->response($data, REST_Controller::HTTP_OK);
	}
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function ifa_assign_post()
    {
        print_r($_POST);die;
        $input = $this->input->post();
        $this->db->insert('items',$input);
     
        $this->response(['Item created successfully.'], REST_Controller::HTTP_OK);
    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put($id)
    {
        $input = $this->put();
        $this->db->update('items', $input, array('id'=>$id));
     
        $this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        $this->db->delete('items', array('id'=>$id));
       
        $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
    }
    	
}