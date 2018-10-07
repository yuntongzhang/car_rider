<?php
class Users extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Users_model');
	}

	public function index() {
		$this->load->view('users/view');
	}
	//login
	public function login_view() {
		$this->load->helper('form');
        $this->load->view('users/login');
	}

	public function verify_user() {
		$result = $this->Users_model->verify();
		// Now we verify the result
		if(!$result){
			// If user did not validate, then show them login page again
			//$msg = '<font color=red>Invalid username and/or password.</font><br />';
			echo 0;
		}else{
			// If user did validate,
			// Send them to members area
			echo $this->session->userdata('email');
			// temp load this action to test whether session works
			redirect('/car_rides/own/');
		}
	}
	//register
	public function register_view() {
		$this->load->helper('form');
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

		$this->Users_model->insert_user($data);

		//$this->load->view('User_view',$data); //maybe redirect to profile
	}

}
?>
