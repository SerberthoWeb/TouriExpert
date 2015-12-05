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
    }
    
    public function hasPermission($user, $permission){
        return true;
    }

    //--------------------------------------------------------------------------
}