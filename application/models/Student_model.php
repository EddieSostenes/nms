<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

   

    // Get the programs a student is enrolled in
    public function get_enrolled_programs($student_id) {
        $this->db->select('programs.*, enrollments.status AS enrollment_status');
        $this->db->from('enrollments');
        $this->db->join('programs', 'enrollments.program_id = programs.program_id');
        $this->db->where('enrollments.student_id', $student_id);
        $query = $this->db->get();
        return $query->result_array();
    }

     // Get student progress in enrolled programs
     public function get_student_progress($student_id) {
        $this->db->select('progress.*, programs.program_name');
        $this->db->from('progress');
        $this->db->join('programs', 'progress.program_id = programs.program_id');
        $this->db->where('progress.student_id', $student_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    // Get payment information for a student
    public function get_payment_info($student_id) {
        $this->db->select('*');
        $this->db->from('payments');
        $this->db->where('student_id', $student_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    // Get student progress in enrolled programs
    public function get_progress($student_id) {
        $this->db->select('progress.*, programs.program_name');
        $this->db->from('progress');
        $this->db->join('programs', 'progress.program_id = programs.program_id');
        $this->db->where('progress.student_id', $student_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    // Add daily activity for the student
    public function add_activity($activity_data) {
        return $this->db->insert('daily_activities', $activity_data);
    }

    // Get activity logs for the student
    public function get_activity_logs($student_id) {
        $this->db->select('*');
        $this->db->from('daily_activities');
        $this->db->where('student_id', $student_id);
        $this->db->order_by('date', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Fetch student info by student ID
    public function get_student_info($student_id) {
        $this->db->select('*');
        $this->db->from('student'); // Assuming the student table is called 'student'
        $this->db->where('student_id', $student_id);
        $query = $this->db->get();
        return $query->row_array(); // Return a single row of student info
    }



      // Fetch approved students
      public function get_approved_students() {
        $this->db->select('student_id, full_name');
        $this->db->from('student');
        $this->db->where('status', 'approved');  // Assuming 'approved' is the status for approved students
        $query = $this->db->get();
        return $query->result_array();
    }

    // Fetch all students
    public function get_all_students() {
        return $this->db->get('student')->result_array();
    }
    
     // Fetch student info by username
      public function get_student_by_username($username) {
        $this->db->select('student_id, full_name, email, username');  // Select the required fields
        $this->db->from('student');
        $this->db->where('username', $username);  // Match the username from login_tbl with student.username
        $query = $this->db->get();

        return $query->row_array();  // Return the row as an associative array
    }


}
