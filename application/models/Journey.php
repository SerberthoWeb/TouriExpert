<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Journey extends MY_Model {
    private $id;
    private $name;
    private $destinationId;
    private $destination;
    private $description;
    private $price;
    private $guideId;
    private $guide;
    private $startDate;
    private $endDate;
    private $customers;
    
    
    function __construct($data = '') {
        $this->table_name = "journey";
        parent::__construct();
        $this->load->model("Destination");
        $this->load->model("Guide");
        if($data != ''){
            $this->id = $data->id;
            $this->name = $data->name;
            $this->destinationId = $data->destinationId;
            $this->guideId = $data->guideId;
            $this->start = $data->start;
        }
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function getDestination(){
        if($this->destination == null){
            $this->guide = $this->Destination->read($this->destinationId);
        }
        return $this->guide;
    }
    
    public function getGuide(){
        if($this->guide == null){
            $this->guide = $this->Guide->read($this->guideId);
        }
        return $this->guide;
    }
    
    public function getStart() {
        return $this->start;
    }
    
    public function read($id){
        return new Journey( parent::read($id) );
    }
    
    public function read_all($where = array(), $limit = '', $order_by = '', $group_by = ''){
        $data = parent::read_all('', $where, $this->table_name, $limit, $order_by, $group_by);
        $tourList[] = array();
        for($i=0; $i<count($data); $i++){
            $tourList[$i] = new Journey($data[$i]);
        }
        return $tourList;
    }
}
?>
