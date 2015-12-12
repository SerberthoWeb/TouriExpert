<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Journey extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        parent::index();
        $this->load->model('Journey_Model');
        $user = $this->loggedInUser();
        $navdata['active'] = 'journey';
        $navdata['user'] = $user;
        $viewdata['journeyList'] = $this->Journey_Model->read_all();
        $this->session->set_flashdata('abordaction', "Journey/");
        $this->load->view('common/header');
        $this->load->view('common/navigation', $navdata);
        $this->load->view('journey/journey_list', $viewdata);
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
        $navdata['user'] = $user;
        $navdata['active'] = 'journey';
        $journey = $this->Journey_Model->read($id);
        $viewdata['journey'] = $journey;
        $viewdata['bookingList'] = $journey->getBookings();
        $this->session->set_flashdata('abordaction', "Journey/detail/$id");
        $this->load->view('common/header');
        $this->load->view('common/navigation', $navdata);
        $this->load->view('journey/journey_detail', $viewdata);
        $this->load->view('common/footer');
    }

    public function edit($id) {
        parent::index();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Journey_Model');
        $this->load->model('Guide_Model');
        $this->form_validation->set_rules('txt_name', $this->lang->line('journey_name'), 'trim|required');
        $journey = $this->Journey_Model->read($id);
        if ($this->input->post('btn_save') == 'Save') {
            $journey->setName($this->input->post('txt_name'));
            $journey->setDestinationTxt($this->input->post('txt_destination'));
            $journey->setGuide($this->Guide_Model->read($this->input->post('drp_guide')));
            $journey->setDescription($this->input->post('txt_description'));
            if ($this->form_validation->run()) {
                $journey = $journey->update();
            }
        }

        $user = $this->loggedInUser();
        $navdata['user'] = $user;
        $navdata['active'] = 'journey';
        $viewdata['journey'] = $journey;
        $viewdata['bookingList'] = $journey->getBookings();
        $guides = $this->Guide_Model->read_all();
        foreach ($guides as $guide) {
            $viewdata['guideSelection'][$guide->getId()] = $guide->getFirstname() . '&nbsp;' . $guide->getLastname();
        }
        $this->load->view('common/header');
        $this->load->view('common/navigation', $navdata);
        $this->load->view('journey/journey_edit', $viewdata);
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
