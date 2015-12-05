<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Guide extends MY_Model {
    private $id;
    private $name;
    
    
    function __construct($data = '') {
        $this->table_name = "tourguide";
        parent::__construct();
        if($data != ''){
            $this->id = $data->id;
            $this->name = $data->name;
        }
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function read($id){
        return new Guide( parent::read($id) );
    }
    
    public function read_all($where = array(), $limit = '', $order_by = '', $group_by = ''){
        $data = parent::read_all('', $where, $this->table_name, $limit, $order_by, $group_by);
        $tourList[] = array();
        for($i=0; $i<count($data); $i++){
            $tourList[$i] = new Tour($data[$i]);
        }
        return $tourList;
    }
}
?>
