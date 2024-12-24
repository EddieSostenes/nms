<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Training_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Fetch all trainings
    public function get_all_trainings() {
        $query = $this->db->get('trainings');
        return $query->result_array();
    }

    // Fetch a single training by ID
    public function get_training_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('trainings');
        return $query->row_array();
    }

    // Add new training
    public function add_training($data) {
        return $this->db->insert('trainings', $data);
    }

    // Update training
    public function update_training($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('trainings', $data);
    }

    // Delete training
    public function delete_training($id) {
        $this->db->where('id', $id);
        return $this->db->delete('trainings');
    }

    // Method to fetch available programs (trainings)
    public function get_available_programs() {
        // Assuming the trainings table is called 'trainings' and has a status column
        $this->db->select('*');
        $this->db->from('trainings');
        $this->db->where('status', 'active');  // Fetch only active trainings
        $query = $this->db->get();
        return $query->result_array();  // Return an array of results
    }


}
