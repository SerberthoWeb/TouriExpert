<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class JourneyController extends MY_Controller {

//--------------------------------------------------------------------------


    function __construct() {
        parent::__construct();
        $this->load->model("Journey");
    }

    //--------------------------------------------------------------------------
    // Lädt die View 

    public function index() {
        $data['wrappedView'] = "journey/JourneyList";
        $data['journeyList'] = $this->Journey->read_all();
        $this->load->view('common/SiteTemplate', $data);
    }
    
    public function detail(){
        $id = $this->section=$this->uri->segment(3);

        $data['wrappedView'] = "journey/JourneyDetail";
        $data['journey'] = $this->Journey->read($id);
        $this->load->view('common/SiteTemplate', $data);
    }

    //--------------------------------------------------------------------------
}
?>
