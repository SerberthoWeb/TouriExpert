<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * 
 * Die Homeview in der Neuigkeiten/Bilder zu sehen sind.
 * 
 */

class HomeController extends MY_Controller {

//--------------------------------------------------------------------------


    function __construct() {
        parent::__construct();
    }

    //--------------------------------------------------------------------------
    // Lädt die View 

    public function index() {
        
        if($this->auth->is_loggedin()){
            $data['site'] = 'Home';
        } else {
            $data['site'] = 'user/UserLogin';
        }
        $this->load->view('common/SiteTemplate', $data);
    }

    //--------------------------------------------------------------------------
}