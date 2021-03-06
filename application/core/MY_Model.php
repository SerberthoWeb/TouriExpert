<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Model extends CI_Model {

    protected $table_name = '';
    protected $primary_key = '';

    public function __construct($table_name = '', $primary_key = '') {
        parent::__construct();
        $this->table_name = $table_name;
        $this->primary_key = $primary_key;
        $this->load->database();
        $this->load->helper('inflector');
        if (!$this->table_name) {
            $this->table_name = strtolower(get_class($this));
        }
    }

    protected function _create($data) {
        $data['date_created'] = $data['date_updated'] = date('Y-m-d H:i:s');
        $data['created_from_ip'] = $data['updated_from_ip'] = $this->input->ip_address();
        $success = $this->db->insert($this->table_name, $data);
        if ($success) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }

    protected function _read($id) {
        return $this->db->get_where($this->table_name, array($this->primary_key => $id))->row();
    }

    protected function _read_all($fields = '', $where = array(), $table = '', $limit = '', $order_by = '', $group_by = '') {
        $data = array();
        if ($fields != '') {
            $this->db->select($fields);
        }
        if (count($where)) {
            $this->db->where($where);
        }
        if ($table != '') {
            $this->table_name = $table;
        }
        if ($limit != '') {
            $this->db->limit($limit);
        }
        if ($order_by != '') {
            $this->db->order_by($order_by);
        }
        if ($group_by != '') {
            $this->db->group_by($group_by);
        }
        $Q = $this->db->get($this->table_name);
        if ($Q->num_rows() > 0) {
            foreach ($Q->result() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    protected function _update($data, $id) {
        //$data['date_updated'] = date('Y-m-d H:i:s');
        //$data['updated_from_ip'] = $this->input->ip_address();
        $this->db->where($this->primary_key, $id);
        return $this->db->update($this->table_name, $data);
    }

    protected function _delete($id) {
        $this->db->where($this->primary_key, $id);
        return $this->db->delete($this->table_name);
    }
}

?>