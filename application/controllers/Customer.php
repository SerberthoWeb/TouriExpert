<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        parent::index();
        $this->load->model('Customer_Model');
        $user = $this->loggedInUser();
        $navdata['active'] = 'customer';
        $navdata['user'] = $user;
        $viewdata['customerList'] = $this->Customer_Model->read_all();
        $this->session->set_flashdata('abordaction', "Customer/");
        $this->load->view('common/header');
        $this->load->view('common/navigation', $navdata);
        $this->load->view('customer/customer_list', $viewdata);
        $this->load->view('common/footer');
    }

    public function create() {
        parent::index();
        $this->load->model('Journey_Model');
        $user = $this->loggedInUser();
        $navdata['active'] = 'journey';
        $navdata['user'] = $user;
        $viewdata = null;
        $this->load->view('common/header');
        $this->load->view('common/navigation', $navdata);
        $this->load->view('journey/journey_create', $viewdata);
        $this->load->view('common/footer');
    }

    public function detail($id) {
        parent::index();
        $this->load->model('Journey_Model');
        $user = $this->loggedInUser();
        $navdata['active'] = 'journey';
        $navdata['user'] = $user;
        $viewdata['journey'] = $this->Journey_Model->read($id);
        $this->session->set_flashdata('abordaction', "Journey/detail/$id");
        $this->load->view('common/header');
        $this->load->view('common/navigation', $navdata);
        $this->load->view('journey/journey_detail', $viewdata);
        $this->load->view('common/footer');
    }

 

    public function delete($id, $commit = false) {
        parent::index();
        
        $this->load->model('Journey_Model');
        
        $user = $this->loggedInUser();
        $navdata['user'] = $user;
        $navdata['active'] = 'journey';
        $this->load->view('common/header');
        $this->load->view('common/navigation', $navdata);
        if ($commit) {
            $journey = $this->Journey_Model->delete($id);
            $this->load->view('journey/journey_delete_commit');
        } else {
            $viewdata['journey'] = $this->Journey_Model->read($id);
            if ($this->session->flashdata('abordaction')) {
                $this->session->keep_flashdata('abordaction');
                $viewdata['abordaction'] = $this->session->flashdata('abordaction');
            } else {
                $viewdata['abordaction'] = "Welcome";
            }
            $this->load->view('journey/journey_delete', $viewdata);
        }
        $this->load->view('common/footer');
    }

    
      public function addbooking($id) {
          parent::index();
        $this->load->model('Journey_Model');
        $this->load->model('Booking_Model');
        $user = $this->loggedInUser();
        $navdata['active'] = 'journey';
        $navdata['user'] = $user;
        $viewdata = null;
        $this->load->view('common/header');
        $this->load->view('common/navigation', $navdata);
        $this->load->view('booking/addbooking', $viewdata);
        $this->load->view('common/footer');
    }
    
      public function edit($id) {
        parent::index();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Customer_Model');
        $this->load->model('Person_Model');
        //$this->form_validation->set_rules('txt_name', $this->lang->line('customer_name'), 'trim|required');
        $customer = $this->Customer_Model->read($id);
        if ($this->input->post('btn_save') == 'Save') {
            $customer->setFirstname($this->input->post('txt_firstname'));
            
                echo 'update -> ' . $customer->getFirstname();
                $customer = $customer->update();
        }

        $user = $this->loggedInUser();
        $navdata['user'] = $user;
        $navdata['active'] = 'customer';
        $viewdata['customer'] = $customer;
       
       
        $this->load->view('common/header');
        $this->load->view('common/navigation', $navdata);
        $this->load->view('customer/customer_edit', $viewdata);
        $this->load->view('common/footer');
    }
    
    
    
}

?>
