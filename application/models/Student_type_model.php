<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_type_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Insert student type
    public function insert_student_type($data) {
        return $this->db->insert('student_type', $data);
    }

    // Fetch all student types
    public function get_all_student_types() {
        $query = $this->db->get('student_type');
        return $query->result_array();
    }

    // Get student type by ID
    public function get_student_type_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('student_type');
        return $query->row_array();
    }

    // Update student type
    public function update_student_type($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('student_type', $data);
    }

    // Delete student type
    public function delete_student_type($id) {
        $this->db->where('id', $id);
        return $this->db->delete('student_type');
    }
}
