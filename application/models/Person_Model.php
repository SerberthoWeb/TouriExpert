<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Person_Model extends MY_Model {

    protected $id;
    protected $firstname;
    protected $lastname;
    protected $email;

    function __construct($data = null) {
        parent::__construct('persons', 'persons.id');
        if ($data != null) {
            $this->id = $data->personId;
            $this->firstname = $data->firstname;
            $this->lastname = $data->lastname;
            $this->email = $data->email;
        }
    }

    public function read($id) {
        return new Person_Model(parent::read($id));
    }

    public function getId() {
        return $this->id;
    }
    
  

    public function getFirstname() {
        return $this->firstname;
    }
    
     public function setFirstname($firstname){
        $this->firstname = $firstname;
    }
    
    public function getLastname(){
        return $this->lastname;
    }
    
      public function setLastname($lastname){
        $this->name = $lastname;
    }
    public function getEmail(){
        return $this->email;
    }
    
       public function setEmail($email){
        $this->name = $email;
    }
    
    public function update(){
        $data['fistname'] = $this->firstname;
        $data['lastname'] = $this->lastname;
        $data['email'] = $this->email;
        parent::_update($data, $this->id);
        return $this;
    }
    
}

?>
