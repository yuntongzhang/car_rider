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
                                   AND c.driver_email = '$driver_email'");

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

    // add a bid to database
    public function add_bid($plate_number, $start_time) {
        $passenger_email = $this->session->userdata('email');
        $data = array($passenger_email, $plate_number, $start_time);
        $sql = "INSERT INTO bids
                VALUES (?, ?, ?)";

        // return true if insert correctly
        return $this->db->query($sql, $data);
    }

    // search for all the car rides bidded
    public function get_bid($plate_number, $start_time) {
        $passenger_email = $this->session->userdata('email');
        $data = array($passenger_email);
        $sql = "SELECT r.*
                FROM car_rides r, bids b
                WHERE r.plate_number = b.plate_number
                AND r.start_time = b.start_time
                AND b.passenger_email = ?";

        $query = $this->db->query($sql, $data);
        return $query->result_array();
    }
}