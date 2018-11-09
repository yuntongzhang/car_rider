<?php
class Car_rides_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // get the car rides proposed by the current user
    public function get_own() {
        $driver_email = $this->session->userdata('email');

        $query = $this->db->query("SELECT r.*
                                   FROM car_rides r, cars c
                                   WHERE r.plate_number = c.plate_number
                                   AND c.driver_email = '$driver_email'
                                   ORDER BY r.plate_number, r.start_time");

        return $query->result_array();
    }

    // get all car rides not proposed by the current user
    public function get_all() {
        $driver_email = $this->session->userdata('email');

        $query = $this->db->query("SELECT *
                                   FROM car_rides r, cars c
                                   WHERE r.plate_number = c.plate_number
                                   AND c.driver_email <> '$driver_email'
                                   ORDER BY start_time ASC");
        return $query->result_array();
    }

    public function get_with_vacancy() {
        $driver_email = $this->session->userdata('email');

        $query = $this->db->query("SELECT *
                                   FROM car_rides r, cars c
                                   WHERE r.plate_number = c.plate_number
                                   AND c.driver_email <> '$driver_email'
                                   AND r.vacancy > ALL (SELECT COUNT(*)
                                                        FROM bids b
                                                        WHERE b.accepted = true
                                                        GROUP BY b.plate_number, b.start_time
                                                        HAVING b.plate_number = r.plate_number
                                                        AND b.start_time = r.start_time)
                                   ORDER BY start_time ASC");
        return $query->result_array();
    }

    // get all cars belong to the driver
    public function get_cars() {
        $driver_email = $this->session->userdata('email');

        $query = $this->db->query("SELECT *
                                   FROM cars c
                                   WHERE c.driver_email = '$driver_email'
                                   ORDER BY c.plate_number ASC");

        return $query->result_array();
    }

    // insert a car ride into database
    public function set_car_ride() {
        $data = array(
            'plate_number' => $this->input->post('plate_number'),
            'start_time' => $this->input->post('start_time'),
            'origin' => $this->input->post('origin'),
            'destination' => $this->input->post('destination'),
            'price' => $this->input->post('price'),
            'vacancy' => $this->input->post('vacancy')
        );

        $sql = "INSERT INTO car_rides
                VALUES (?, ?, ?, ?, ?, ?)";

        // return true if insert sucessfully
        return $this->db->query($sql, $data);
    }

    // update a car ride in the database
    public function update_car_ride() {
        $data = array(
            'origin' => $this->input->post('origin'),
            'destination' => $this->input->post('destination'),
            'price' => $this->input->post('price'),
            'vacancy' => $this->input->post('vacancy'),
            'plate_number' => $this->input->post('plate_number'),
            'start_time' => $this->input->post('start_time')
        );

        $sql = "UPDATE car_rides
                SET origin = ?, destination = ?, price = ?, vacancy = ?
                WHERE plate_number = ?
                AND start_time = ?";

        // return true if updated successfully
        return $this->db->query($sql, $data);
    }

    // delete a car ride in the database
    public function delete_car_ride($plate_number, $start_time) {
        $data = array($plate_number, $start_time);
        $sql = "DELETE FROM car_rides
                WHERE plate_number = ?
                AND start_time = ?";

        // return true if deleted sucessfully
        return $this->db->query($sql, $data);
    }

    // find the car ride in database give plate number and start time
    public function search_car_ride($plate_number, $start_time) {
        $data = array($plate_number, $start_time);
        $sql = "SELECT *
                FROM car_rides
                WHERE plate_number = ?
                AND start_time = ?";

        $query = $this->db->query($sql, $data);
        return $query->row_array();
    }

    public function find_associated_bids($plate_number, $start_time, $status) {
        $data = array($plate_number, $start_time, $status);
        $sql = "SELECT *
                FROM bids
                WHERE plate_number = ?
                AND start_time = ?
                AND accepted = ?";

        $query = $this->db->query($sql, $data);
        return $query->result_array();
    }

     public function cal_meta_data($plate_number, $start_time) {
        $data = array($plate_number, $start_time);
        $sql = "SELECT MIN(PRICE) as minimum, MAX(PRICE) as maximum, ROUND(AVG(PRICE),2) as average, SUM(PRICE) as total
                FROM bids
                WHERE plate_number = ?
                AND start_time = ?
		GROUP BY PLATE_NUMBER, START_TIME
		ORDER BY PLATE_NUMBER, START_TIME";

        $query = $this->db->query($sql, $data);
        return $query->result_array();
    }
}
