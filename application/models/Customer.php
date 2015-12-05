<?php
include_once 'Person.php';

if (!defined('BASEPATH'))
    exit('No direct script access    allowed');

class Customer extends Person {
    private $bookings;
    
    function __construct() {
        parent::__construct();
        $this->bookings = array();
    }
    
    public function getBookings(){
        return $this->booking;
    }
    
}

?>
