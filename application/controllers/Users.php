<?php
class Users extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Users_model');
	}

	public function index() {
		$this->load->view('users/view');
	}
	//login
	public function login_view() {
        	$this->load->view('users/login');
	}

	public function verify_user() {
		$result = $this->Users_model->verify();
		// Now we verify the result
		if(!$result){
			// If user did not validate, then show them login page again
			//$msg = '<font color=red>Invalid username and/or password.</font><br />';
			//echo 0;
			$this->load->view('users/login');
		}else{
			// If user did validate,
			echo $this->session->userdata('email');
			redirect('/cars', 'refresh');
		}
	}
	//register
	public function register_view() {
		$this->load->view('users/add');
	}

	public function register_user() {
		$data = array(
				'email' => $this->input->post('email'),
				'passwd' => $this->input->post('passwd'),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'gender' => $this->input->post('gender'),
				'age' => $this->input->post('age'),
				'occupation' => $this->input->post('occupation')
			     );

		if($this->Users_model->insert_user($data)){
			$this->load->view('users/login');
		}
		else{
			echo "<script>alert('This email is already registered!');</script>";
			$this->load->view('users/add');
		}
	}
	//logout
	public function logout_user() { 		
		 //removing session data 
		 $this->session->unset_userdata(array(
					'email',
					'first_name',
					'last_name',
					'gender',
					'age',
					'occupation',
					'validated'
				     )); 
		 $this->load->view('users/view'); 
      } 

}
?>
