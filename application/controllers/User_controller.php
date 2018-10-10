<?php 
   class User_controller extends CI_Controller {
	
      function __construct() { 
        parent::__construct(); 
        $this->load->helper('url'); 
	$this->load->library('session');
        $this->load->database(); 
      } 
  
      public function index() {   
	$this->load->view('User_view'); 
      }
//login
      public function login_view() {
	$this->load->helper('form'); 
	$this->load->view('User_login'); 
      }

      public function verify_user() { 
	$this->load->model('User_Model');
	$result = $this->User_Model->verify();
		// Now we verify the result
		if(!$result){
		    // If user did not validate, then show them login page again
		    //$msg = '<font color=red>Invalid username and/or password.</font><br />';
		    echo 0;
		}else{
		    // If user did validate, 
		    // Send them to members area
		    echo $this->session->userdata('email');
		}        
      }
//register
      public function register_view() { 
	$this->load->helper('form'); 
        $this->load->view('User_add'); 
      }

      public function register_user() {
	$this->load->model('User_Model');

 	$data = array( 
            'email' => $this->input->post('email'), 
            'passwd' => $this->input->post('passwd'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'gender' => $this->input->post('gender'),
            'age' => $this->input->post('age'),
            'occupation' => $this->input->post('occupation')
         ); 
			
        $this->User_Model->insert_user($data);
    	
        //$this->load->view('User_view',$data); //maybe redirect to profile
      }

}
?>
