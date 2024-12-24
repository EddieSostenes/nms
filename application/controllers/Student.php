<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Student_model');   // Load the Student model
        $this->load->model('Training_model');  // Load the Training model
        $this->load->model('Payment_model');   // Load the Payment model
        $this->load->model('HelpDesk_model');  // Load the HelpDesk model
        $this->load->library('session');
        $this->load->helper('url');
        
        // Check if the user is logged in and is a student
        if ($this->session->userdata('usertype') != 3 || !$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    // Load the student dashboard
    public function dashboard() {
        $student_id = $this->session->userdata('student_id');  // Ensure student_id is retrieved from session

        if ($this->session->userdata('logged_in') && $this->session->userdata('usertype') == 3) {
            // Fetching necessary data for the dashboard
            $data['programs'] = $this->Training_model->get_available_programs();   // Get available programs
            $data['enrolled_programs'] = $this->Student_model->get_enrolled_programs($student_id);   // Get enrolled programs
            $data['progress'] = $this->Student_model->get_progress($student_id);   // Get student progress
            $data['payments'] = $this->Payment_model->get_payment_status($student_id);   // Get payment info
            $data['help_desk'] = $this->HelpDesk_model->get_tickets_by_student($student_id);   // Get help desk tickets
            $data['activities'] = $this->Student_model->get_activity_logs($student_id);   // Get daily activities
            
            // Loading the student dashboard view
            $this->load->view('student/header');
            $this->load->view('student/dashboard', $data);   // Pass the data to the dashboard view
            $this->load->view('student/footer');
        } else {
            redirect('auth/login');
        }
    }

    // Browse available training programs
    public function browse_programs() {
        $student_id = $this->session->userdata('student_id');
        $data['enrolled_programs'] = $this->Student_model->get_enrolled_programs($student_id);
    
        $this->load->view('student/header');
        $this->load->view('student/browse_programs', $data);
        $this->load->view('student/footer');
    }
    

    // View enrolled programs and progress
    public function view_progress() {
        $student_id = $this->session->userdata('student_id');   // Get student ID from session
        $data['progress'] = $this->Student_model->get_progress($student_id);   // Get progress details

        // Load the view for progress
        $this->load->view('student/header');
        $this->load->view('student/view_progress', $data);
        $this->load->view('student/footer');
    }

    // View payment information
    public function view_payments() {
        $student_id = $this->session->userdata('student_id');   // Get student ID from session
        $data['payments'] = $this->Payment_model->get_payment_status($student_id);   // Get payment status

        // Load the payment view
        $this->load->view('student/header');
        $this->load->view('student/view_payments', $data);
        $this->load->view('student/footer');
    }

    // Add daily activities (like ward rounds, seminars, etc.)
    public function add_daily_activity() {
        $student_id = $this->session->userdata('student_id');   // Get student ID from session
        
        if ($this->input->post()) {
            $activity = array(
                'student_id' => $student_id,
                'activity_description' => $this->input->post('activity_description'),
                'date' => date('Y-m-d')   // Set the current date
            );
            
            // Add the activity to the database
            $this->Student_model->add_activity($activity);
            $this->session->set_flashdata('success', 'Activity added successfully');
            redirect('student/add_daily_activity');
        }

        // Load the view to add daily activity
        $this->load->view('student/header');
        $this->load->view('student/add_daily_activity');
        $this->load->view('student/footer');
    }
}
