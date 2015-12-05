<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * 
 * Die Homeview in der Neuigkeiten/Bilder zu sehen sind.
 * 
 */

class UserController extends MY_Controller {

//--------------------------------------------------------------------------


    function __construct() {
        parent::__construct();
    }

    //--------------------------------------------------------------------------
    // Lädt die View 

    public function index() {
        $UserController = new UserController();
        if($UserController->hasPermission($this->session->userdata('user'), 'HomeController/index')){
            $data['site'] = 'Home_View';
        } else {
            $data['site'] = 'Login_View';
        }
        $this->load->view('common/SiteTemplate', $data);
    }
    
    public function hasPermission($user, $permission){
        return true;
    }

    //--------------------------------------------------------------------------
}