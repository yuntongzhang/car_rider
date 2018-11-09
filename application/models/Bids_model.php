<?php
class Bids_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();

    }

    // check whether a bid exists
    // return true if a such bid exists
    public function has_bid($passenger_email, $plate_number, $start_time) {
        $data = array($passenger_email, $plate_number, $start_time);
        $sql = "SELECT *
                FROM bids
                WHERE passenger_email = ?
                AND plate_number = ?
                AND start_time =?";

        $query = $this->db->query($sql, $data);
        return !empty($query->result_array());
    }

    // add a bid to database
    public function add_bid($plate_number, $start_time) {
        $passenger_email = $this->session->userdata('email');
        $data = array($passenger_email, $plate_number, $start_time, 'price' => $this->input->post('price'), false);
        $sql = "INSERT INTO bids
                VALUES (?, ?, ?, ?, ?)";

        // return true if insert correctly
        return $this->db->query($sql, $data);
    }

    // update the price of a bit to database
    public function update_bid_price($plate_number, $start_time) {
        $passenger_email = $this->session->userdata('email');
        $new_price = $this->input->post('price');
        $data = array($passenger_email, $plate_number, $start_time);
        $sql = "UPDATE bids
                SET price = $new_price
                WHERE passenger_email = ?
                AND plate_number = ?
                AND start_time = ?";
        // return true if update correctly
        return $this->db->query($sql, $data);
    }

    // delete a bid from database
    public function delete_bid($plate_number, $start_time) {
        $passenger_email = $this->session->userdata('email');
        $data = array($passenger_email, $plate_number, $start_time);

        $sql = "DELETE FROM bids
                WHERE passenger_email = ?
                AND plate_number = ?
                AND start_time = ?";

        // return true if deleted sucessfully
        return $this->db->query($sql, $data);
    }

    // search for all the car rides bidded
    public function get_own_bids() {
        $passenger_email = $this->session->userdata('email');
        $data = array($passenger_email);
        $sql = "SELECT r.*, b.price AS my_price, b.accepted AS accepted
                FROM car_rides r, bids b
                WHERE r.plate_number = b.plate_number
                AND r.start_time = b.start_time
                AND b.passenger_email = ?";

        $query = $this->db->query($sql, $data);
        return $query->result_array();
    }

    // set a bid from pending to accepted
    public function select_bid($passenger_email, $plate_number, $start_time) {
        $data = array($passenger_email, $plate_number, $start_time);
        $sql = "UPDATE bids
                SET accepted = true
                WHERE passenger_email = ?
                AND plate_number = ?
                AND start_time = ?";

        // return true if update the bid status correctly
        $this->db->query($sql, $data);
        return $this->db->affected_rows();
    }

    // set a bit from accepted to pending
    public function reject_bid($passenger_email, $plate_number, $start_time) {
        $data = array($passenger_email, $plate_number, $start_time);
        $sql = "UPDATE bids
                SET accepted = false
                WHERE passenger_email = ?
                AND plate_number = ?
                AND start_time = ?";

        // return true if update the bid status correctly
        return $this->db->query($sql, $data);
    }
}