<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


if (!defined('BASEPATH'))
    exit('No direct script access    allowed');

class Destination extends MY_Model {
    private $id;
    private $name;
    
    function __construct($data = '') {
        parent::__construct();
        $this->table_name = "destination";
        
        if($data != ''){
            $this->id = $data->id;
            $this->name = $data->name;
        }
    }
    
    public function read($id){
        return new Destination( parent::read($id) );
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getName(){
        return $this->name;
    }
}
?>
