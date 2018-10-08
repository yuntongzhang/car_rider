<?php
class Cars_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_cars($user_email)
        {   
                $query = $this->db->query("SELECT * FROM cars c WHERE c.driver_email = '".$user_email."';");
                return $query->result_array();
        }

        public function insert_car($data)
        {
                $sql = "INSERT INTO cars VALUES(?,?,?,?)";
		if($this->db->query($sql, $data)){
			return true;
		}
        }

        public function update_car($data)
        {
                $this->load->helper('url');

                $plate_number = $data["plate_number"];
                $driver_email = $data["driver_email"];
                $car_type = $data["car_type"];
                $size = $data["size"];
                
                if ($car_type != null) {
                        $this->db->query("UPDATE cars SET car_type = '".$car_type."' WHERE plate_number = '".$plate_number."' ;");
                }

                if ($size != null) {
                        $this->db->query("UPDATE cars SET size = '".$size."' WHERE plate_number = '".$plate_number."' ;");
                }
                
                $query = $this->db->query("SELECT * FROM cars c1 WHERE c1.driver_email = '".$driver_email."';");
                return $query->result_array();
                
        }

        public function delete_car($plate_number,$user_email)
        {

                $this->db->query("DELETE FROM cars WHERE plate_number = '".$plate_number."'");
                $query = $this->db->query("SELECT * FROM cars c1 WHERE c1.driver_email = '".$user_email."';");
                return $query->result_array();
        }

        public function get_car_rides($plate_number)
        {   
                $query = $this->db->query("SELECT * FROM car_rides cr WHERE cr.plate_number = '".$plate_number."';");
                return $query->result_array();
        }
}