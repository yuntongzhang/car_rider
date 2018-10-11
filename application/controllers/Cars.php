<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 class Cars extends CI_Controller {
     public function __construct()
    {
            parent::__construct();
            $this->load->model('Cars_model');
            $this->load->helper('url_helper');
            $this->load->library('session');
    }
 	public function index()
	{
            $user_email = $this->session->userdata('email');
            $data['cars'] = $this->Cars_model->get_cars($user_email);
            $data['title'] = 'Your list of cars.';
            $this->load->view('templates/header',$data);
            $this->load->view('cars/index', $data);
            $this->load->view('templates/footer');
    }

    public function register_view()
    {
        $this->load->helper('form');
        $data['title'] = 'Register your car.';
        $user_email = $this->session->userdata('email');
        $data['driver_email'] = $user_email;
        $this->load->view('templates/header',$data);
        $this->load->view('cars/create');
        $this->load->view('templates/footer');
    }
     public function register_car()
    {
        $this->load->model('Cars_model');
         $data1 = array(
                        'plate_number' => $this->input->post('plate_number'),
                        'driver_email' => $this->input->post('driver_email'),
                        'car_type' => $this->input->post('car_type'),
                        'size' => $this->input->post('size')
                     );
        $this->Cars_model->insert_car($data1);
        $data['cars'] = $this->Cars_model->get_cars($data1['driver_email']);
        $data['title'] = 'Your list of cars.';
        $this->load->view('templates/header',$data);
        $this->load->view('cars/index', $data);
        $this->load->view('templates/footer');
    }
     public function update_view()
    {
        $this->load->helper('form');
        $data['title'] = 'Update your car';
        $user_email = $this->session->userdata('email');
        $data['driver_email'] = $user_email;
        $this->load->view('templates/header',$data);
        $this->load->view('cars/update');
        $this->load->view('templates/footer');
    }
     public function update_car(){
        $this->load->model('Cars_model');
         $data1 = array(
                        'plate_number' => $this->input->post('plate_number'),
                        'driver_email' => $this->input->post('driver_email'),
                        'car_type' => $this->input->post('car_type'),
                        'size' => $this->input->post('size')
                     );
         $this->Cars_model->update_car($data1);
        $data['cars'] = $this->Cars_model->get_cars($data1['driver_email']);
        $data['title'] = 'Your list of cars.';
        $this->load->view('templates/header',$data);
        $this->load->view('cars/index', $data);
        $this->load->view('templates/footer');
    }
     public function delete_car($plate_number,$user_email)
    {
        $this->load->model('Cars_model');
        $data['cars'] = $this->Cars_model->delete_car($plate_number,$user_email);
        $data['title'] = 'Your list of cars.';
        $this->load->view('templates/header',$data);
        $this->load->view('cars/index', $data);
        $this->load->view('templates/footer');
    }
     public function car_rides($plate_number)
    {
        $data['car_rides'] = $this->Cars_model->get_car_rides($plate_number);
         $data['title'] = 'Your list of car rides.';
        $this->load->view('templates/header',$data);
        $this->load->view('cars/car_rides', $data);
       $this->load->view('templates/footer');
    }
}