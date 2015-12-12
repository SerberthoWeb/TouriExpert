<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        parent::index();
        $user = $this->loggedInUser();
        $navdata['active'] = 'welcome';
        $navdata['user'] = $user;
        $viewdata['user'] = $user;
        $this->load->view('common/header');
        $this->load->view('common/navigation', $navdata);
        $this->load->view('welcome', $viewdata);
        $this->load->view('common/footer');
    }

}
