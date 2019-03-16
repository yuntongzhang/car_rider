<?php
class Bids extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('bids_model');
        $this->load->model('car_rides_model');
    }

    // passenger bid for a particular car ride
    // display all of the passenger's bids after bidding
    public function bid($plate_number, $start_time_slug) {
        $start_time = str_replace(' ', '_', $start_time_slug);

        $passenger_email = $this->session->userdata('email');
        if ($this->bids_model->has_bid($passenger_email, $plate_number, $start_time)) {
            // passenger bid for this ride before, so he is updateing
            $this->bids_model->update_bid_price($plate_number, $start_time);
        } else {
            // passenger bid for the first time, add a new record
            $this->bids_model->add_bid($plate_number, $start_time);
        }

        // gathering necessary data for displaying passenger_view page
        $data['ride'] = $this->car_rides_model->search_car_ride($plate_number, $start_time);
        $data['pending_bids'] = $this->car_rides_model->find_associated_bids($plate_number, $start_time, false);
        $data['accepted_bids'] = $this->car_rides_model->find_associated_bids($plate_number, $start_time, true);

        $this->load->view('templates/header', $data);
        $this->load->view('car_rides/passenger_show', $data);
        $this->load->view('templates/footer');
    }

    // passenger cancels his bid on a ride
    public function delete_bid($plate_number, $start_time_slug) {
        $start_time = str_replace(' ', '_', $start_time_slug);

        // perform the delettion
        $this->bids_model->delete_bid($plate_number, $start_time);

        // gather information for passenger_show view
        $data['ride'] = $this->car_rides_model->search_car_ride($plate_number, $start_time);
        $data['pending_bids'] = $this->car_rides_model->find_associated_bids($plate_number, $start_time, false);
        $data['accepted_bids'] = $this->car_rides_model->find_associated_bids($plate_number, $start_time, true);

        // render
        $this->load->view('templates/header', $data);
        $this->load->view('car_rides/passenger_show', $data);
        $this->load->view('templates/footer');
    }

    // display the rides which the passenger has bid for
    public function show_bids() {
        $data['car_ride_bids'] = $this->bids_model->get_own_bids();
        $data['title'] = "Bids I have placed";

        $this->load->view('templates/header', $data);
        $this->load->view('bids/index', $data);
        $this->load->view('templates/footer');
    }

    // Driver select a bid, turn a bit from pending to accepted
    public function select_bid($plate_number, $start_time_slug, $email_slug) {
        $start_time = str_replace(' ', '_', $start_time_slug);
        $passenger_email = str_replace('-', '@', $email_slug);
        $affected_rows = $this->bids_model->select_bid($passenger_email, $plate_number, $start_time);

        $data['ride'] = $this->car_rides_model->search_car_ride($plate_number, $start_time);
        $data['pending_bids'] = $this->car_rides_model->find_associated_bids($plate_number, $start_time, false);
        $data['accepted_bids'] = $this->car_rides_model->find_associated_bids($plate_number, $start_time, true);
        $data['title'] = "Details of car ride";
        $data['meta_data'] = $this->car_rides_model->cal_meta_data($plate_number, $start_time);

        if ($affected_rows != 1) {
            // fail due to trigger
            echo "<script>alert('No. of accepted bids cannot be more than no. of vacancy!');</script>";
        }
        $this->load->view('templates/header', $data);
        $this->load->view('car_rides/show', $data);
        $this->load->view('templates/footer');
    }

    // Driver set a bid from accepted to pending
    public function reject_bid($plate_number, $start_time_slug, $email_slug) {
        $start_time = str_replace(' ', '_', $start_time_slug);
        $passenger_email = str_replace('-', '@', $email_slug);
        $this->bids_model->reject_bid($passenger_email, $plate_number, $start_time);

        $data['ride'] = $this->car_rides_model->search_car_ride($plate_number, $start_time);
        $data['pending_bids'] = $this->car_rides_model->find_associated_bids($plate_number, $start_time, false);
        $data['accepted_bids'] = $this->car_rides_model->find_associated_bids($plate_number, $start_time, true);
        $data['title'] = "Details of car ride";
        $data['meta_data'] = $this->car_rides_model->cal_meta_data($plate_number, $start_time);

        $this->load->view('templates/header', $data);
        $this->load->view('car_rides/show', $data);
        $this->load->view('templates/footer');
    }
}
