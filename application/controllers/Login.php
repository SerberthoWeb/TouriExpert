<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->lang->load('login');
    }

    public function index() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('User_Model');
        $this->form_validation->set_rules("txt_username", "Benutzername", "trim|required");
        $this->form_validation->set_rules("txt_password", "Passwort", "trim|required");
        if ($this->input->post('btn_login') == $this->lang->line('form_login_submit')) {
            if ($this->form_validation->run()) {
                //form validation succeeds
                $username = $this->input->post("txt_username");
                $password = $this->input->post("txt_password");
                $usr_result = $this->User_Model->login($username, $password);
                if ($usr_result) {
                    $this->session->set_userdata('userId', $usr_result->getId());
                    redirect("Welcome");
                } else {
                    $this->session->set_flashdata('invalid_login', $this->lang->line('form_login_invalid'));
                }
            }
        }
        $user = $this->loggedInUser();
        $navdata['user'] = $user;
        $navdata['active'] = 'login';
        $this->load->view('common/header');
        $this->load->view('common/navigation', $navdata);
        $this->load->view('login');
        $this->load->view('common/footer');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect("Login");
    }

}
