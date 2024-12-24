<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();  // Load database
    }

    // Insert new course
    public function insert_course($data) {
        return $this->db->insert('courses', $data);  // Insert into the courses table
    }

    // Fetch all courses
    public function get_all_courses() {
        $this->db->select('*');
        $this->db->from('courses');
        $query = $this->db->get();
        return $query->result_array();  // Return all courses
    }

    // Fetch course by ID
    public function get_course_by_id($id) {
        $this->db->select('*');
        $this->db->from('courses');
        $this->db->where('id', $id);  // Search by course ID
        $query = $this->db->get();
        return $query->row_array();  // Return the specific course
    }

    // Update course
    public function update_course($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('courses', $data);  // Update course by ID
    }

    // Delete course
    public function delete_course($id) {
        $this->db->where('id', $id);
        return $this->db->delete('courses');  // Delete course by ID
    }
}
