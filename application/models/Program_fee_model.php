<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program_fee_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Add a new program fee
    public function add_program_fee($data) {
        return $this->db->insert('program_fees', $data);
    }

    // Fetch all program fees
    public function get_all_program_fees() {
        $this->db->select('program_fees.*, programs.program_name');
        $this->db->from('program_fees');
        $this->db->join('programs', 'program_fees.program_id = programs.program_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Fetch a specific program fee by ID
    public function get_program_fee_by_id($id) {
        $this->db->where('program_id', $id);
        $query = $this->db->get('program_fees');
        return $query->row_array();
    }

    // Update a program fee
    public function update_program_fee($id, $data) {
        $this->db->where('program_id', $id);
        return $this->db->update('program_fees', $data);
    }

    // Delete a program fee
    public function delete_program_fee($id) {
        return $this->db->delete('program_fees', array('program_id' => $id));
    }
}
?>
