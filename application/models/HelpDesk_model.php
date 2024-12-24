<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HelpDesk_model extends CI_Model {

    // Submit help request (Student)
    public function submit_help_request($data) {
        return $this->db->insert('helpdesk_tickets', $data);
    }

    // Get tickets by student (Student)
    public function get_tickets_by_student($student_id) {
        $this->db->select('helpdesk_tickets.*, student.full_name');
        $this->db->from('helpdesk_tickets');
        $this->db->join('student', 'student.student_id = helpdesk_tickets.student_id');
        $this->db->where('helpdesk_tickets.student_id', $student_id);  // Ensure we get tickets only for the logged-in student
        $query = $this->db->get();
        return $query->result_array();
    }

    // Get pending tickets (Admin)
    public function get_pending_tickets() {
        $this->db->select('helpdesk_tickets.*, student.full_name');
        $this->db->from('helpdesk_tickets');
        $this->db->join('student', 'student.student_id = helpdesk_tickets.student_id');
        $this->db->where('helpdesk_tickets.status', 'open');  // Only fetch tickets that are open
        $query = $this->db->get();
        return $query->result_array();
    }

    // Get all tickets (Admin)
    public function get_all_tickets() {
        $this->db->select('helpdesk_tickets.*, student.full_name');
        $this->db->from('helpdesk_tickets');
        $this->db->join('student', 'student.student_id = helpdesk_tickets.student_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Update ticket status (Admin)
    public function update_ticket_status($ticket_id, $data) {
        $this->db->where('ticket_id', $ticket_id);
        return $this->db->update('helpdesk_tickets', $data);
    }

    // Get specific ticket by ID (Admin)
    public function get_ticket_by_id($ticket_id) {
        $this->db->select('helpdesk_tickets.*, student.full_name');
        $this->db->from('helpdesk_tickets');
        $this->db->join('student', 'student.student_id = helpdesk_tickets.student_id');
        $this->db->where('helpdesk_tickets.ticket_id', $ticket_id);  // Fetch a specific ticket by its ID
        $query = $this->db->get();
        return $query->row_array();
    }
}
