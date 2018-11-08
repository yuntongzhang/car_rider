<?php
class Car_rides extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('car_rides_model');
    }

    // list all car rides which proposed by the current user
    public function own() {
        $data['car_rides'] = $this->car_rides_model->get_own();
        $data['title'] = "All Rides Proposed by Me";

        $this->load->view('templates/header', $data);
        $this->load->view('car_rides/own', $data);
        $this->load->view('templates/footer');
    }

    // render the page to create a new car ride
    public function new() {
        $data['cars'] = $this->car_rides_model->get_cars();
        $data['title'] = "Create a new car ride";

        $this->load->view('templates/header', $data);
        $this->load->view('car_rides/new', $data);
        $this->load->view('templates/footer');
    }

    // action taken to create a new car ride
    public function create() {
        // $this->form_validation->set_rules('title', 'Title', 'required');
        // $this->form_validation->set_rules('text', 'Text', 'required');

        // if ($this->form_validation->run() === FALSE) {
        //     $this->load->view('templates/header', $data);
        //     $this->load->view('car_rides/new');
        //     $this->load->view('templates/footer');

        // } else {
            $this->car_rides_model->set_car_ride();

            redirect('/car_rides/own/');
        // }
    }

    // render the page to edit a car ride
    public function edit($plate_number, $start_time_slug) {
        $start_time = str_replace(' ', '_', $start_time_slug);
        $data['plate_number'] = $plate_number;
        $data['start_time'] = $start_time;
        $data['car_ride'] = $this->car_rides_model->search_car_ride($plate_number, $start_time);
        $data['title'] = "Update Ride";

        $this->load->view('templates/header', $data);
        $this->load->view('car_rides/edit', $data);
        $this->load->view('templates/footer');
    }

    // action taken to update a car ride
    public function update($plate_number, $start_time_slug) {
        $this->car_rides_model->update_car_ride();
        $show_ride_url = site_url('car_rides/show/'.$plate_number.'/'.$start_time_slug);
        redirect($show_ride_url);
    }

    // driver delete a proposed car ride
    public function delete($plate_number, $start_time_slug) {
        $start_time = str_replace(' ', '_', $start_time_slug);
        $this->car_rides_model->delete_car_ride($plate_number, $start_time);
        redirect('car_rides/own');
    }

    // show the details of one car ride
    // this function is for drivers to inspect the details of the ride, and also select from the biddings
    public function show($plate_number, $start_time_slug) {
        $start_time = str_replace(' ', '_', $start_time_slug);
        $data['ride'] = $this->car_rides_model->search_car_ride($plate_number, $start_time);
        $data['pending_bids'] = $this->car_rides_model->find_associated_bids($plate_number, $start_time, false);
        $data['accepted_bids'] = $this->car_rides_model->find_associated_bids($plate_number, $start_time, true);
        $data['title'] = "Details of car ride";
	    $data['meta_data'] = $this->car_rides_model->cal_meta_data($plate_number, $start_time);
        $this->load->view('templates/header', $data);
        $this->load->view('car_rides/show', $data);
        $this->load->view('templates/footer');
    }

    // show the details of one car ride
    // this function is for passengers to inspect the details of the ride, enter a bid, or update a bid
    public function passenger_show($plate_number, $start_time_slug) {
        $start_time = str_replace(' ', '_', $start_time_slug);
        $data['ride'] = $this->car_rides_model->search_car_ride($plate_number, $start_time);
        $data['pending_bids'] = $this->car_rides_model->find_associated_bids($plate_number, $start_time, false);
        $data['accepted_bids'] = $this->car_rides_model->find_associated_bids($plate_number, $start_time, true);
        $data['title'] = "Details of car ride";

        $this->load->view('templates/header', $data);
        $this->load->view('car_rides/passenger_show', $data);
        $this->load->view('templates/footer');
    }

    // list all car rides not proposed by current user
    public function index() {
        $data['car_rides'] = $this->car_rides_model->get_all();
        $data['title'] = "Car rides to pick";

        $this->load->view('templates/header', $data);
        $this->load->view('car_rides/index', $data);
        $this->load->view('templates/footer');
    }
}
