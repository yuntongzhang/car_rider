<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Administrators extends CI_Controller {
    function login() {
        $data['title'] = 'Administrator Login';
        $this->load->library('session');
        $this->load->view("administrators/login", $data);
    }

    function login_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run()) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            //Model
            $this->load->model('Administrators_model');
            if($this->Administrators_model->can_login($email, $password)) {
                $session_data = array('email' => $email);
                $this->session->set_userdata($session_data);
                redirect(base_url() . 'Adminstrators/enter');
            } else {
                $this->session->set_flashdata('error', 'Invalid Email and Password');
                redirect(base_url() . 'Administrators/login');
            }
        } else {
            $this->login();
        }
    }

    function enter() {
        if($this->session->userdata('email') != '') {
            echo '<h2>Welcome - '.$this->session->userdata('email').'</h2>';
            echo '<label><a href="'.base_url().'Administrators/logout">Logout</a></label>';
        } else {
            redirect(base_url() . 'Administrators/login');
        }
    }

    function logout() {
        $this->session->unset_userdata('email');
        redirect(base_url() . 'Administrators/login');
    }
}
