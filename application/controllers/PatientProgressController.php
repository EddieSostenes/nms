<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PatientProgressController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('PatientProgressModel');
        $this->load->library(['session', 'form_validation']);
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'You must log in first.');
            redirect('auth/login');
        }
    }

    // Add Report
    public function add() {
        if ($_POST) {
            // Set validation rules
            $this->form_validation->set_rules('hospital_registration_number', 'Hospital Registration Number', 'required');
            $this->form_validation->set_rules('surname', 'Surname', 'required');
            $this->form_validation->set_rules('other_name', 'Other Name', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|numeric');
            $this->form_validation->set_rules('diagnosis', 'Diagnosis', 'required');
            $this->form_validation->set_rules('narration', 'Narration', 'required');
            $this->form_validation->set_rules('treatment_care_plan', 'Treatment, Care & Plan', 'required');
            $this->form_validation->set_rules('designation', 'Designation', 'required');
    
            if ($this->form_validation->run() === FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                $this->load_views('nurse/add_patient_progress');
            } else {
                // Prepare data for insertion
                $data = $this->input->post();
                $data['nurse_id'] = $this->session->userdata('userid');
                $data['reported_by'] = $this->session->userdata('staff_name');
                $data['status'] = 'Draft'; // Default status
    
                // If hypersensitivity is not set, use the default 'None'
                if (empty($data['hypersensitivity'])) {
                    $data['hypersensitivity'] = 'None';
                }
    
                try {
                    $this->PatientProgressModel->insert_report($data);
                    $this->session->set_flashdata('success', 'Patient Progress Report added successfully.');
                } catch (Exception $e) {
                    log_message('error', 'Error adding report: ' . $e->getMessage());
                    $this->session->set_flashdata('error', 'Failed to add report. Please try again later.');
                }
                redirect('PatientProgressController/manage');
            }
        } else {
            $this->load_views('nurse/add_patient_progress');
        }
    }
    

    // Manage Reports
    public function manage() {
        try {
            $nurse_id = $this->session->userdata('userid');
            $data['reports'] = $this->PatientProgressModel->get_reports_by_user($nurse_id, 'nurse');
        } catch (Exception $e) {
            log_message('error', 'Error fetching reports: ' . $e->getMessage());
            $this->session->set_flashdata('error', 'Unable to fetch reports.');
            redirect('dashboard');
        }

        $this->load_views('nurse/manage_patient_progress', $data);
    }

    // Send Report to Supervisor
    public function send_to_supervisor($id) {
        try {
            $report = $this->PatientProgressModel->get_report($id);
    
            // Check if the report is in Draft status
            if ($report['status'] !== 'Draft') {
                $this->session->set_flashdata('error', 'Only reports in Draft status can be sent.');
                redirect('PatientProgressController/manage');
            }
    
            // No status change here; it remains Draft
            $this->session->set_flashdata('success', 'Report sent to supervisor. Status will change to Pending Approval when opened.');
        } catch (Exception $e) {
            log_message('error', 'Error sending report to supervisor: ' . $e->getMessage());
            $this->session->set_flashdata('error', 'Failed to send report. Please try again.');
        }
        redirect('PatientProgressController/manage');
    }
    



    public function manage_supervisor() {
        try {
            $supervisor_id = $this->session->userdata('userid'); // Fetch the supervisor's user ID
            if (!$supervisor_id) {
                $this->session->set_flashdata('error', 'Unauthorized access. Please log in.');
                redirect('auth/login');
            }
    
            // Fetch reports with status 'Pending Approval'
            $data['reports'] = $this->PatientProgressModel->get_reports_for_supervisor($supervisor_id);
    
            // Load the views
            $this->load->view('supervisor/header');
            $this->load->view('supervisor/manage_patient_progress', $data);
            $this->load->view('supervisor/footer');
        } catch (Exception $e) {
            log_message('error', 'Error fetching reports for supervisor: ' . $e->getMessage());
            $this->session->set_flashdata('error', 'Unable to fetch reports for supervisor.');
            redirect('supervisor/dashboard');
        }
    }
    
    public function history_supervisor() {
        try {
            $supervisor_id = $this->session->userdata('userid'); // Fetch the supervisor's user ID
            if (!$supervisor_id) {
                $this->session->set_flashdata('error', 'Unauthorized access. Please log in.');
                redirect('auth/login');
            }
    
            // Fetch all reports handled by this supervisor
            $data['reports'] = $this->PatientProgressModel->get_supervisor_history($supervisor_id);
    
            // Load the views
            $this->load->view('supervisor/header');
            $this->load->view('supervisor/patient_progress_history', $data);
            $this->load->view('supervisor/footer');
        } catch (Exception $e) {
            log_message('error', 'Error fetching history for supervisor: ' . $e->getMessage());
            $this->session->set_flashdata('error', 'Unable to fetch history.');
            redirect('supervisor/dashboard');
        }
    }

   // View Report for Nurse
   public function view_nurse($id) {
    try {
        $data['report'] = $this->PatientProgressModel->get_report($id);

        if (empty($data['report'])) {
            $this->session->set_flashdata('error', 'Report not found.');
            redirect('PatientProgressController/manage');
        }

        // Ensure the nurse is viewing their own report
        if ($data['report']['nurse_id'] != $this->session->userdata('userid')) {
            $this->session->set_flashdata('error', 'You are not authorized to view this report.');
            redirect('PatientProgressController/manage');
        }

        $this->load->view('nurse/header');
        $this->load->view('nurse/view_patient_progress', $data);
        $this->load->view('nurse/footer');
    } catch (Exception $e) {
        log_message('error', 'Error fetching report for nurse: ' . $e->getMessage());
        $this->session->set_flashdata('error', 'An error occurred. Please try again.');
        redirect('PatientProgressController/manage');
    }
}

// View Report for Supervisor
public function view_supervisor($id) {
    try {
        $data['report'] = $this->PatientProgressModel->get_report($id);

        if (empty($data['report'])) {
            $this->session->set_flashdata('error', 'Report not found.');
            redirect('PatientProgressController/manage_supervisor');
        }

        // Ensure the supervisor is viewing reports sent to them
        if ($data['report']['status'] !== 'Pending Approval') {
            $this->session->set_flashdata('error', 'You are not authorized to view this report.');
            redirect('PatientProgressController/manage_supervisor');
        }

        // Mark the report as "Opened"
        if ($data['report']['status'] === 'Pending Approval') {
            $this->PatientProgressModel->update_report($id, ['status' => 'Under Review']);
        }

        $this->load->view('supervisor/header');
        $this->load->view('supervisor/view_patient_progress', $data);
        $this->load->view('supervisor/footer');
    } catch (Exception $e) {
        log_message('error', 'Error fetching report for supervisor: ' . $e->getMessage());
        $this->session->set_flashdata('error', 'An error occurred. Please try again.');
        redirect('PatientProgressController/manage_supervisor');
    }
}

// View Report for DNS
public function view_dns($id) {
    try {
        $data['report'] = $this->PatientProgressModel->get_report($id);

        if (empty($data['report'])) {
            $this->session->set_flashdata('error', 'Report not found.');
            redirect('PatientProgressController/manage_dns');
        }

        // Ensure the DNS is viewing reports sent to them
        if (!in_array($data['report']['status'], ['Under Review', 'Returned to DNS'])) {
            $this->session->set_flashdata('error', 'You are not authorized to view this report.');
            redirect('PatientProgressController/manage_dns');
        }

        $this->load->view('dns/header');
        $this->load->view('dns/view_patient_progress', $data);
        $this->load->view('dns/footer');
    } catch (Exception $e) {
        log_message('error', 'Error fetching report for DNS: ' . $e->getMessage());
        $this->session->set_flashdata('error', 'An error occurred. Please try again.');
        redirect('PatientProgressController/manage_dns');
    }
}
    
    




    // Helper function to load views
    private function load_views($view, $data = []) {
        $this->load->view('nurse/header');
        $this->load->view($view, $data);
        $this->load->view('nurse/footer');
    }
}
