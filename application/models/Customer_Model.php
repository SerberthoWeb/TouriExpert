<?php

defined('BASEPATH') OR exit('No direct script access allowed');

get_instance()->load->model('Person_Model');

class Customer_Model extends Person_Model {

    protected $id;
    protected $personId;
    protected $payment;
    protected $bookings = null;

    function __construct($data = null) {
        parent::__construct($data);
        $this->table_name = 'customers';
        $this->primary_key = 'customers.customerId';
        if ($data != null) {
            $this->id = $data->customerId;
            $this->personId = $data->personId;
            $this->payment = $data->payment;
        }
    }

    public function getCustomerId() {
        return $this->payment;
    }

    public function getPayment() {
        return $this->payment;
    }
 
    public function setPayment($payment) {
        $this->name = $payment;
    }

    public function read($id) {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where($this->primary_key, $id);
        $this->db->join('persons', 'persons.personId = customers.personId');
        $data = $this->db->get()->row();
        return new Customer_Model($data);
    }

    public function read_all() {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->join('persons', 'persons.personId = customers.personId');
        $Q = $this->db->get();
        $customerList = array();
        foreach ($Q->result() as $row) {
            $customerList[] = new Customer_Model($row);
        }
        return $customerList;
    }

    public function getId() {
        return $this->id;
    }

    public function getPersonId() {
        return $this->personId;
    }

    public function getBooking() {
        if ($this->bookdings == null) {
            $this->load->model('Booking_Model');
            $this->db->select('*');
            $this->db->from('bookings');
            $this->db->where('bookings.customerId', $this->id);
            $Q = $this->db->get();
            $this->bookings = array();
        }
        return $this->bookings;
    }

    public function createBooking($data) {
        if ($this->bookdings == null) {
            $this->load->model('Booking_Model');
            $this->db->insert('bookings', $data);

            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function update() {
        $this->db->trans_start();
        $Q = $this->db->query("UPDATE `customers`
            JOIN `persons` ON `persons`.`personId` = `customers`.`personId` 
            SET `persons`.`firstname` = ? 
            WHERE `customers`.`customerId` = ?"
                , array(
            $this->firstname,
            $this->id
        ));
        print_r( $this->firstname );
        $this->db->trans_commit();
        $this->db->trans_complete();
        return $this;
    }
    
    public function delete(){
        $this->db->trans_start();
        $this->db->where('persons.personId', $this->personId);
        $affected = $this->db->delete('persons') + parent::_delete();
        $this->db->trans_commit();
        $this->db->trans_complete();
        return $affected;
    }

}

?>
