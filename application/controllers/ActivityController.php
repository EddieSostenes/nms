<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ActivityController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Activity_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
        
        // Check if the user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    // Add Activity View
    public function add_activity() {
        $this->load->view('staff/header');
        $this->load->view('staff/add_activity');
        $this->load->view('staff/footer');
    }

    // Save new activity
    public function save_activity() {
        $this->form_validation->set_rules('activity_name', 'Activity Name', 'required');
        $this->form_validation->set_rules('activity_description', 'Activity Description', 'required');
        $this->form_validation->set_rules('submission_date', 'Submission Date', 'required');
        $this->form_validation->set_rules('submission_time', 'Submission Time', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('staff/header');
            $this->load->view('staff/add_activity');
            $this->load->view('staff/footer');
        } else {
            $data = array(
                'activity_name' => $this->input->post('activity_name'),
                'activity_description' => $this->input->post('activity_description'),
                'questions' => $this->input->post('questions'), // If questions are provided
                'submission_date' => $this->input->post('submission_date'),
                'submission_time' => $this->input->post('submission_time'),
                'added_by' => $this->session->userdata('staff_name'),  // Store supervisor's full name
                'created_at' => date('Y-m-d H:i:s')
            );

            if ($this->Activity_model->insert_activity($data)) {
                $this->session->set_flashdata('success', 'Activity added successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to add activity. Please try again.');
            }

            redirect('activity/manage_activities');
        }
    }

    // Manage Activities View
    public function manage_activities() {
        $data['activities'] = $this->Activity_model->get_all_activities();
        $this->load->view('staff/header');
        $this->load->view('staff/manage_activities', $data);
        $this->load->view('staff/footer');
    }

    // Edit Activity View
    public function edit_activity($activity_id) {
        $data['activity'] = $this->Activity_model->get_activity_by_id($activity_id);
        $this->load->view('staff/header');
        $this->load->view('staff/edit_activity', $data);
        $this->load->view('staff/footer');
    }

    // Update Activity Details
    public function update_activity($activity_id) {
        $this->form_validation->set_rules('activity_name', 'Activity Name', 'required');
        $this->form_validation->set_rules('activity_description', 'Activity Description', 'required');
        $this->form_validation->set_rules('submission_date', 'Submission Date', 'required');
        $this->form_validation->set_rules('submission_time', 'Submission Time', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->edit_activity($activity_id);
        } else {
            $data = array(
                'activity_name' => $this->input->post('activity_name'),
                'activity_description' => $this->input->post('activity_description'),
                'questions' => $this->input->post('questions'),
                'submission_date' => $this->input->post('submission_date'),
                'submission_time' => $this->input->post('submission_time')
            );

            if ($this->Activity_model->update_activity($activity_id, $data)) {
                $this->session->set_flashdata('success', 'Activity updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to update activity. Please try again.');
            }

            redirect('activity/manage_activities');
        }
    }

    // Delete Activity
    public function delete_activity($activity_id) {
        if ($this->Activity_model->delete_activity($activity_id)) {
            $this->session->set_flashdata('success', 'Activity deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete activity. Please try again.');
        }
        redirect('activity/manage_activities');
    }
}
?>
