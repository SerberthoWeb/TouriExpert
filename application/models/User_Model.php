<?php

defined('BASEPATH') OR exit('No direct script access allowed');

get_instance()->load->model('Person_Model');

class User_Model extends Person_Model {
    
    protected $id;
    protected $userName;
    protected $password;
    protected $accesslevel;
    
    function __construct($data = null) {
        parent::__construct($data);
        $this->table_name = 'users';
        $this->primary_key = 'users.userId';
        if($data != null){
            $this->id = $data->userId;
            $this->userName = $data->userName;
            $this->password = $data->password;
            $this->accesslevel = $data->accesslevel;
        }
    }
    
    public function read($id) {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where($this->primary_key, $id);
        $this->db->join('persons', 'persons.personId = users.personId');
        $data = $this->db->get()->row();
        return new User_Model($data);
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getUserName(){
        return $this->userName;
    }
    
    public function getPassword(){
        return $this->password;
    }
    
    function login($userName, $password) {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where(array('users.userName'=>$userName));
        $this->db->join('persons', 'persons.personId = users.personId');
        $data = $this->db->get()->row();
        $user = new User_Model($data);
        if(password_verify($password, $user->getPassword())){
            return $user;
        } else {
            return false;
        }
    }
}
?>
