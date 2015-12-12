<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        parent::index();
    }

    public function createBooking($type = null, $id = null) {
        if ($type != null) {
            if ($type == 'journey') {
                $this->load->model('Booking_Model');
                $this->load->model('Journey_Model');
                $this->load->model('Customer_Model');
                $journey = $this->Journey_Model->read($id);
                if ($journey != null) {
                    //...
                    //...
                    
                    $loadView = 'booking/create_from_journey';
                } else {
                    $loadView = 'booking/create_from_journey';
                    $loadView = 'booking/create_from_customer';
                }
                
                
            } else if ($type == 'customer') {
                
            }
        } else {
            
        }
        
        $this->load->view('common/header');
        $this->load->view('common/navigation', $navdata);
        $this->load->view('journey/journey_detail', $viewdata);
        $this->load->view('common/footer');
    }

}
