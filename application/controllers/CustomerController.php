<?php

if (!defined('BASEPATH'))
    exit('No direct script access    allowed');

class Customer_Controller extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model(array('Customer'));
    }
    
    public function index(){
        $data['customers'] = $this->Customer->get_all();
        $this->load->view('customer/Customer_View_All', $data);
    }

}

?>
