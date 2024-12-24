<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Allocation_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Function to assign a student to a supervisor
    public function assign_student($data) {
        return $this->db->insert('student_supervisor_allocation', $data);
    }

  

    // Delete an allocation
    public function delete_allocation($id) {
        $this->db->where('id', $id);
        return $this->db->delete('student_supervisor_allocation');
    }

    // Fetch all staff/supervisors
    public function get_all_staff() {
        return $this->db->get('staff_tbl')->result_array();
    }

    // Fetch all students
    public function get_all_students() {
        return $this->db->get('student')->result_array();
    }


// Function to update the allocation
public function update_allocation($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('student_supervisor_allocation', $data);
}

// Fetch allocation details by ID
public function get_allocation_by_id($id) {
    $this->db->select('ssa.*, s.full_name as student_name, st.staff_name as supervisor_name');
    $this->db->from('student_supervisor_allocation ssa');
    $this->db->join('student s', 'ssa.student_id = s.student_id', 'left');
    $this->db->join('staff_tbl st', 'ssa.staff_id = st.id', 'left');
    $this->db->where('ssa.id', $id);
    return $this->db->get()->row_array();
}

// Fetch all allocations
public function get_all_assignments() {
    $this->db->select('ssa.*, s.full_name as student_name, st.staff_name as supervisor_name');
    $this->db->from('student_supervisor_allocation ssa');
    $this->db->join('student s', 'ssa.student_id = s.student_id', 'left');
    $this->db->join('staff_tbl st', 'ssa.staff_id = st.id', 'left');
    return $this->db->get()->result_array();
}










}
