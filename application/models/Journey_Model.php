<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Journey_Model extends MY_Model {

    protected $id;
    protected $name;
    //protected $destinationId;
    protected $destination;
    protected $destinationTxt;
    protected $guideId;
    protected $guide;
    protected $description;
    protected $maxBooking;
    protected $price;
    protected $start;
    protected $end;
    protected $bookingCount;
    protected $bookings;

    public function __construct($data = null) {
        parent::__construct('journeys', 'journeys.journeyId');
        //$this->load->model("Destination_Model");
        $this->load->model("Booking_Model");
        if ($data != null) {
            $this->id = $data->journeyId;
            $this->name = $data->name;
            //$this->destinationId = $data->destinationId;
            $this->destinationTxt = $data->destinationTxt;
            $this->guideId = $data->guideId;
            $this->description = $data->description;
            $this->maxBookings = $data->maxBookings;
            $this->price = $data->price;
            $this->start = $data->start;
            $this->end = $data->end;
            
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }
    
    public function setName($name){
        $this->name = $name;
    }
    
    public function getDestinationTxt(){
        return $this->destinationTxt;
    }
    
    public function setDestinationTxt($destinationTxt){
        $this->destinationTxt = $destinationTxt;
    }
    
    /*
     * 
     *
    public function getDestinationId() {
        return $this->destinationId;
    }
    
    
    public function setDestinationId($destinationId){
        $this->destinationId = $destinationId;
        $this->description = null;
    }
     */
     /*
     * Currently just a textfield, not a object. Use DestinationTxt.
     * 
     * public function getDestination() {
        if ($this->destination == null) {
            $this->destination = $this->Destination_Model->read($this->destinationId);
        }
        return $this->destination;
    }*/

    public function getGuideId() {
        return $this->guideId;
    }
    
    public function setGuideId($guideId){
        //reset Guide, it's not the same anymore
        if($this->guideId != $guideId){
            $this->guideId = $guideId;
            //If changed reset lazy loading
            $this->guide = null;
        }
        
    }

    /*
     * Lazy loading, just load the guide if it is requested with this funktion;
     */
    public function getGuide() {
        if ($this->guide == null) {
            $this->load->model("Guide_Model");
            $this->guide = $this->Guide_Model->read($this->guideId);
        }
        return $this->guide;
    }
    
    public function setGuide($guide){
        $this->guideId = $guide->getId();
        $this->guide = $guide;
    }

    public function getDescription() {
        return $this->description;
    }
    
    public function setDescription($description){
        $this->description = $description;
    }

    public function getBookingCount() {
        if ($this->bookingCount == null) {
            $this->db->select('COUNT(bookings.bookingId) as count');
            $this->db->from('bookings');
            $this->db->where('bookings.journeyId', $this->getId());
            $this->bookingCount = $this->db->get()->row()->count;
        }
        return $this->bookingCount;
    }

    public function getBookings() {
        if ($this->bookings == null) {
            $this->bookings = array();
            $this->db->select('*');
            $this->db->where('bookings.journeyId', $this->getId());
            $Q = $this->db->get('bookings');
            if ($Q->num_rows() > 0) {
                foreach ($Q->result() as $row) {
                    $this->bookings[] = new Booking_Model($row);
                }
            }
        }
        return $this->bookings;
    }

    public function getMaxBookings() {
        return $this->maxBookings;
    }
    
    public function getPrice() {
        return $this->price;
    }

    public function getStart() {
        return $this->start;
    }

    public function getEnd() {
        return $this->end;
    }
    
    public function create($data){
        
    }
    
    public function read($id) {
        return new Journey_Model(parent::_read($id));
    }

    public function read_all() {
        $data = parent::_read_all();
        $tourList = array();
        foreach ($data as $row) {
            $tourList[] = new Journey_Model($row);
        }
        return $tourList;
    }
    
    public function update(){
        $data['name'] = $this->name;
        $data['destinationTxt'] = $this->destinationTxt;
        $data['guideId'] = $this->guide->getId();
        $data['description'] = $this->description;
        parent::_update($data, $this->id);
        return $this;
    }

    public function delete($id) {
        $this->db->trans_start();
        $this->db->where('journeyId', $id);
        $affected = $this->db->delete('bookings') + parent::delete($id);
        $this->db->trans_complete();
        return $affected;
    }

}

?>
