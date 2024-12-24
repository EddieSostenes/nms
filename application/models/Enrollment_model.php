<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enrollment_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // Add enrollment
    public function add_enrollment($data) {
        return $this->db->insert('enrollments', $data);
    }

    // Get all enrollments
    public function get_all_enrollments() {
        $this->db->select('enrollments.*, student.full_name AS student_name, staff_tbl.staff_name AS supervisor_name, programs.program_name, courses.course_name, trainings.training_name');
        $this->db->from('enrollments');
        $this->db->join('student', 'enrollments.student_id = student.student_id');
        $this->db->join('staff_tbl', 'enrollments.supervisor_id = staff_tbl.id');
        $this->db->join('programs', 'enrollments.program_id = programs.program_id');
        $this->db->join('courses', 'enrollments.course_id = courses.id');
        $this->db->join('trainings', 'enrollments.training_id = trainings.id');
        return $this->db->get()->result_array();
    }

    // Get enrollment by ID
    public function get_enrollment_by_id($id) {
        $this->db->select('enrollments.*, student.full_name AS student_name, staff_tbl.staff_name AS supervisor_name, programs.program_name, courses.course_name, trainings.training_name');
        $this->db->from('enrollments');
        $this->db->join('student', 'enrollments.student_id = student.student_id');
        $this->db->join('staff_tbl', 'enrollments.supervisor_id = staff_tbl.id');
        $this->db->join('programs', 'enrollments.program_id = programs.program_id');
        $this->db->join('courses', 'enrollments.course_id = courses.id');
        $this->db->join('trainings', 'enrollments.training_id = trainings.id');
        $this->db->where('enrollments.id', $id);
        return $this->db->get()->row_array();
    }

    // Update enrollment
    public function update_enrollment($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('enrollments', $data);
    }

    // Delete enrollment
    public function delete_enrollment($id) {
        $this->db->where('id', $id);
        return $this->db->delete('enrollments');
    }

    // Add log entry for enrollment changes
    public function add_log($data) {
        return $this->db->insert('enrollment_logs', $data);
    }
}
?>
