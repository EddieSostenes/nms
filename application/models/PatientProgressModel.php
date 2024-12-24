<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PatientProgressModel extends CI_Model {

    public function insert_report($data) {
        if (!$this->db->insert('patient_progress_reports', $data)) {
            throw new Exception('Error inserting report.');
        }
    }


    public function update_report($id, $data) {
        $this->db->where('id', $id);
        if (!$this->db->update('patient_progress_reports', $data)) {
            throw new Exception('Error updating report.');
        }
    }
    

    public function get_report($id) {
        $this->db->where('id', $id);
        return $this->db->get('patient_progress_reports')->row_array();
    }

  


    public function get_reports_by_user($user_id, $role) {
        $this->db->where('nurse_id', $user_id);
        $this->db->order_by('id', 'DESC');
        return $this->db->get('patient_progress_reports')->result_array();
    }


    public function get_reports_for_supervisor($supervisor_id) {
        // Fetch all reports assigned to the supervisor with status 'Pending Approval'
        $this->db->where('status', 'Pending Approval');
        $this->db->where('supervisor_id', $supervisor_id); // Add a supervisor-specific filter if applicable
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('patient_progress_reports');
        if (!$query) {
            throw new Exception('Error fetching reports for supervisor.');
        }
        return $query->result_array();
    }
    
    public function get_supervisor_history($supervisor_id) {
        // Fetch all reports handled by the supervisor
        $this->db->where('supervisor_id', $supervisor_id);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('patient_progress_reports');
        if (!$query) {
            throw new Exception('Error fetching supervisor history.');
        }
        return $query->result_array();
    }
    


}
