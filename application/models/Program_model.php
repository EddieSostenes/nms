<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Add a new program
    public function add_program($data) {
        return $this->db->insert('programs', $data);
    }

    // Fetch all programs
    public function get_all_programs() {
        $query = $this->db->get('programs');
        return $query->result_array();
    }

    // Fetch a specific program by ID
    public function get_program_by_id($id) {
        $this->db->where('program_id', $id);
        $query = $this->db->get('programs');
        return $query->row_array();
    }

    // Update a program
    public function update_program($id, $data) {
        $this->db->where('program_id', $id);
        return $this->db->update('programs', $data);
    }

    // Delete a program
    public function delete_program($id) {
        return $this->db->delete('programs', array('program_id' => $id));
    }
}
?>
