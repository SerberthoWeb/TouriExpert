<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('language');
        $this->lang->load('de_admin', 'deutsch');
    }
}

?>
