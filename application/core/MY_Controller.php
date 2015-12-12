<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }
    
    public function index() {
        if (!$this->session->has_userdata('userId')) {
            redirect('Login');
        }
    }

    public function loggedInUser(){
        $this->load->model('User_Model');
        if ($this->session->has_userdata('userId')) {
            return $this->User_Model->read($this->session->userdata('userId'));
        } else {
            return false;
        }
    }

}
