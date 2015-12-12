<?php

defined('BASEPATH') OR exit('No direct script access allowed');

get_instance()->load->model('User_Model');

class Guide_Model extends User_Model {

    protected $id;
    protected $userId;

    function __construct($data = null) {
        parent::__construct($data);
        $this->table_name = 'guides';
        $this->primary_key = 'guides.guideId';
        if ($data != null) {
            $this->id = $data->guideId;
            $this->userId = $data->userId;
        }
    }

    public function read($id) {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where($this->primary_key, $id);
        $this->db->join('users', 'users.userId = guides.userId');
        $this->db->join('persons', 'persons.personId = users.personId');
        $data = $this->db->get()->row();
        return new Guide_Model($data);
    }

    public function read_all() {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->join('users', 'users.userId = guides.userId');
        $this->db->join('persons', 'persons.personId = users.personId');
        $Q = $this->db->get();
        $guides = array();
        if ($Q->num_rows() > 0) {
            foreach ($Q->result() as $row) {
                $guides[] = new Guide_Model($row);
            }
        }
        return $guides;
    }

    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->userId;
    }

}

?>
