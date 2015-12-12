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

    public function edit($id) {
        parent::index();
        $this->load->model('Journey_Model');
        $user = $this->loggedInUser();
        $navdata['active'] = 'journey';
        $navdata['user'] = $user;
        $data['journey'] = $this->Journey_Model->read($id);
        $this->load->view('common/header');
        $this->load->view('common/navigation', $navdata);
        $this->load->view('journey/journey_edit', $data);
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

}

?>
