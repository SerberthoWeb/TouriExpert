<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Destination_Model extends MY_Model {

    protected $id;
    protected $name;

    public function __construct($data = null) {
        parent::__construct('destinations', 'destinations.destinationId');
        if ($data != null) {
            $this->id = $data->destinationId;
            $this->name = $data->name;
        }
    }

    public function read($id) {
        return new Destination_Model(parent::_read($id));
    }
    
    

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

}

?>
