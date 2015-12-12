<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Booking_Model extends MY_Model {

    protected $id;
    protected $customerId;
    protected $customer;
    protected $journeyId;
    protected $journey;

    public function __construct($data = null) {
        parent::__construct('bookings', 'bookings.bookingId');

        if ($data != null) {
            $this->id = $data->bookingId;
            $this->customerId = $data->customerId;
            $this->journeyId = $data->journeyId;
        } 
    }

    public function getId() {
        return $this->id;
    }

    public function read($id) {
        return new Booking_Model(parent::_read($id));
    }

    public function delete($id) {
        parent::_delete($id);
    }

    public function getCustomer() {
        if ($this->customer == null) {
            $this->load->model('Customer_Model');
            $this->customer = $this->Customer_Model->read($this->customerId);
        }
        return $this->customer;
    }
    
    public function getJourney(){
        if($this->journey == null){
            $this->load->model('Journey_Model');
            
        }
    }

}

?>
