<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HelpDeskController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('HelpDesk_model');
        $this->load->model('Student_model');
        $this->load->library(['session', 'form_validation']);
        $this->load->helper('url');
        
        // Check if the user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    // Load common views for students
    private function _load_student_view($view, $data = []) {
        $this->load->view('student/header');
        $this->load->view($view, $data);
        $this->load->view('student/footer');
    }

    // Load common views for admin
    private function _load_admin_view($view, $data = []) {
        $this->load->view('admin/header');
        $this->load->view($view, $data);
        $this->load->view('admin/footer');
    }

    // Student: Request help
        public function request_help() {
            $student_id = $this->session->userdata('userid');  // Fetch student_id from session
        
            // Check if the student_id exists
            if (empty($student_id)) {
                echo "Student ID is missing from session.";
                print_r($this->session->userdata());  // Debug session data
                exit;  // Stop execution to debug
            }
        
            // Proceed with submitting the help request using the student_id
            $this->form_validation->set_rules('issue_description', 'Issue Description', 'required|trim');
        
            if ($this->form_validation->run() === FALSE) {
                $this->_load_student_view('student/request_help');
            } else {
                // Prepare data for helpdesk submission
                $data = [
                    'student_id' => $student_id,  // Use the correct student_id from session
                    'issue_description' => $this->input->post('issue_description', TRUE),
                    'status' => 'open',
                    'submitted_on' => date('Y-m-d H:i:s')
                ];
        
                // Insert help request
                if ($this->HelpDesk_model->submit_help_request($data)) {
                    $this->session->set_flashdata('success', 'Your help request has been submitted.');
                } else {
                    $this->session->set_flashdata('error', 'Failed to submit your help request. Please try again.');
                }
        
                redirect('helpdesk/status');  // Redirect to the status page
            }
        
        }
    
    
    

    // Student: View current request status
    public function view_help_status() {
        $student_id = $this->session->userdata('userid');  // Get the current student's ID
        $data['tickets'] = $this->HelpDesk_model->get_tickets_by_student($student_id);  // Fetch tickets for the logged-in student
        $this->_load_student_view('student/view_help_status', $data);
    }



    // Admin: View and approve helpdesk requests
    public function admin_approve() {
        $data['tickets'] = $this->HelpDesk_model->get_pending_tickets();  // Fetch pending tickets for approval
        $this->_load_admin_view('admin/approve_helpdesk', $data);
    }

    // Admin: View history of helpdesk requests
    public function helpdesk_history() {
        $data['tickets'] = $this->HelpDesk_model->get_all_tickets();  // Fetch all tickets for history
        $this->_load_admin_view('admin/helpdesk_history', $data);
    }

    // Admin: Take action on a helpdesk request
    public function admin_action($ticket_id) {
        // Fetch the ticket details including student name
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('reason', 'Reason', 'required|trim');
    
        if ($this->form_validation->run() === FALSE) {
            // Fetch the ticket details along with student name using a join
            $data['ticket'] = $this->HelpDesk_model->get_ticket_by_id($ticket_id);
    
            // Check if 'student_name' or 'full_name' is fetched in the result
            if (empty($data['ticket']['full_name'])) {
                echo "Error: Student name not found.";
                exit;
            }
    
            $this->_load_admin_view('admin/admin_action', $data);
        } else {
            $status = $this->input->post('status', TRUE);
            $reason = $this->input->post('reason', TRUE);
    
            $data = [
                'status' => $status,
                'admin_reason' => $reason,
                'resolved_at' => ($status == 'resolved') ? date('Y-m-d H:i:s') : null
            ];
    
            // Update the ticket status
            if ($this->HelpDesk_model->update_ticket_status($ticket_id, $data)) {
                $this->session->set_flashdata('success', 'Action taken on helpdesk request.');
            } else {
                $this->session->set_flashdata('error', 'Failed to take action on helpdesk request.');
            }
    
            redirect('admin/helpdesk');
        }
    }
    



}
