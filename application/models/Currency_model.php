<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Currency_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function add_currency($data) {
        $this->db->insert('currencies', $data);
        return $this->db->insert_id();
    }

    public function get_all_currencies() {
        $query = $this->db->get('currencies');
        return $query->result_array();
    }

    public function get_currency_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('currencies');
        return $query->row_array();
    }

    public function update_currency($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('currencies', $data);
    }

    public function delete_currency($id) {
        $this->db->where('id', $id);
        $this->db->delete('currencies');
    }


   
    

}
