<?php
class Users_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	//login
	public function verify() {
		$email = $this->security->xss_clean($this->input->post('email'));
		$passwd = $this->security->xss_clean($this->input->post('passwd'));

		$query = $this->db->query("SELECT *
								   FROM users
								   WHERE email = '$email'
								   AND passwd = '$passwd'");

		if($query->num_rows() == 1)
		{
			// If there is a user, then create session data
			$row = $query->row();
			$data = array(
					'email' => $row->email,
					'first_name' => $row->first_name,
					'last_name' => $row->last_name,
					'gender' => $row->gender,
					'age' => $row->age,
					'occupation' => $row->occupation,
					'validated' => true
				     );
			$this->session->set_userdata($data);
			return true;
		}

		return false;
	}
	//register
	public function insert_user($data) {
		$sql = "INSERT INTO users VALUES(?,?,?,?,?,?,?)";
		if($this->db->query($sql, $data)){
			return true;
		}
	}
}
?>
