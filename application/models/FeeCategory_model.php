<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FeeCategory_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Add a new fee category
    public function add_category($data) {
        return $this->db->insert('fee_categories', $data);
    }

    // Get all fee categories
    public function get_all_categories() {
        return $this->db->get('fee_categories')->result_array();
    }

    // Get a single category by ID
    public function get_category_by_id($id) {
        return $this->db->where('id', $id)->get('fee_categories')->row_array();
    }

    // Update fee category
    public function update_category($id, $data) {
        return $this->db->where('id', $id)->update('fee_categories', $data);
    }

    // Delete fee category
    public function delete_category($id) {
        return $this->db->where('id', $id)->delete('fee_categories');
    }
}
