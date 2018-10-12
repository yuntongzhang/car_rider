<?php
class Car_rides extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('car_rides_model');
    }

    // list all car rides which proposed by the current user
    public function own() {
        $data['car_rides'] = $this->car_rides_model->get_own();
        $data['title'] = "Car rides proposed by me";

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
        $data['title'] = "Update a car ride";

        $this->load->view('templates/header', $data);
        $this->load->view('car_rides/edit', $data);
        $this->load->view('templates/footer');
    }

    // action taken to update a car ride
    public function update() {
        $this->car_rides_model->update_car_ride();
        redirect('car_rides/own/');
    }

    // driver delete a proposed car ride
    public function delete($plate_number, $start_time_slug) {
        $start_time = str_replace(' ', '_', $start_time_slug);
        $this->car_rides_model->delete_car_ride($plate_number, $start_time);
        redirect('car_rides/own/');
    }

    // show the details of one car ride
    // this function is common to both driver and passenger
    public function show() {

    }

    // list all car rides not proposed by current user
    public function index() {
        $data['car_rides'] = $this->car_rides_model->get_all();
        $data['title'] = "Car rides to pick";

        $this->load->view('templates/header', $data);
        $this->load->view('car_rides/index', $data);
        $this->load->view('templates/footer');
    }


    // passenger bid for a particular car ride
    public function bid($plate_number, $start_time_slug) {
        $start_time = str_replace(' ', '_', $start_time_slug);

        $this->car_rides_model->add_bid($plate_number, $start_time);
        $data['car_rides'] = $this->car_rides_model->get_bid($plate_number, $start_time);

        $this->load->view('templates/header', $data);
        $this->load->view('car_rides/bid', $data);
        $this->load->view('templates/footer');
    }

    // display the rides which the passenger has bid for
    public function show_bid() {

    }
}