<?php
if (!defined('BASEPATH'))
    exit('No direct script access    allowed');

class Person extends MY_Model {
    private $firstname;
    private $secondname;
    private $email;
    
    function __construct() {
        parent::__construct();
    }
    
    public function getFirstname(){
        return $this->firstname;
    }
    
    
}

?>
