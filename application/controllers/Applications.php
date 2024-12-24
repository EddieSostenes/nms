<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applications extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Application_model');  // Load the Application Model
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper(array('url', 'form'));
    }


    // Load registration form
    public function registration() {
        $data['country'] = $this->Home_model->select_countries();  // Fetch country list from Home_model
        $this->load->view('admin/header');  // Admin header
        $this->load->view('applications/registration', $data);  // Registration view
        $this->load->view('admin/footer');  // Admin footer
    }

    // Load new applications
    public function new_applications() {
        $data['new_applications'] = $this->Application_model->get_new_applications();
        $this->load->view('admin/header');
        $this->load->view('applications/new_applications', $data);
        $this->load->view('admin/footer');
    }

    // Load accepted applications
    public function accepted_applications() {
        $data['accepted_applications'] = $this->Application_model->get_accepted_applications();
        $this->load->view('admin/header');
        $this->load->view('applications/accepted_applications', $data);
        $this->load->view('admin/footer');
    }

    // Load rejected applications
    public function rejected_applications() {
        $data['rejected_applications'] = $this->Application_model->get_rejected_applications();
        $this->load->view('admin/header');
        $this->load->view('applications/rejected_applications', $data);
        $this->load->view('admin/footer');
    }

    // Load approved applications
    public function approved_applications() {
        $data['approved_applications'] = $this->Application_model->get_approved_applications();
        $this->load->view('admin/header');
        $this->load->view('applications/approved_applications', $data);
        $this->load->view('admin/footer');
    }

    // Accept an application
    public function accept_application($student_id) {
        $result = $this->Application_model->update_status($student_id, 'accepted');
        if ($result) {
            $this->session->set_flashdata('success', 'Application accepted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to accept application.');
        }
        redirect('applications/new_applications');
    }

    // Reject an application
    public function reject_application($student_id) {
        $result = $this->Application_model->update_status($student_id, 'rejected');
        if ($result) {
            $this->session->set_flashdata('success', 'Application rejected successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to reject application.');
        }
        redirect('applications/new_applications');
    }

    // Approve a student's payment and add login credentials
    public function approve($student_id) {
        // Call the model function to approve the application
        $result = $this->Application_model->approve_application($student_id);
        
        if ($result) {
            // Automatically add credentials if the student is approved
            $this->check_and_add_login_credentials($student_id);
    
            // If the approval is successful, update the payment status to 'approved'
            $payment_result = $this->Application_model->update_payment_status($student_id, 'approved');
    
            if ($payment_result) {
                $this->session->set_flashdata('success', 'Application approved successfully and payment status updated.');
            } else {
                $this->session->set_flashdata('error', 'Failed to update payment status.');
            }
        } else {
            $this->session->set_flashdata('error', 'Failed to approve application.');
        }
    
        redirect('applications/approved_applications');
    }
    
    

    // Delete an application
    public function delete_application($student_id) {
        $result = $this->Application_model->delete_application($student_id);
        if ($result) {
            $this->session->set_flashdata('success', 'Application deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete application.');
        }
        redirect('applications/new_applications');
    }

    // Submit Control Number
    public function submit_control_number() {
        $student_id = $this->input->post('student_id');
        $student_name = $this->input->post('student_name');
        $control_number = $this->input->post('control_number');
        
        if (!empty($student_id) && !empty($control_number)) {
            $result = $this->Application_model->update_control_number($student_id, $student_name, $control_number);
            if ($result) {
                $this->session->set_flashdata('success', 'Control number added/updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to update control number.');
            }
        } else {
            $this->session->set_flashdata('error', 'Control number cannot be empty.');
        }
        redirect('applications/accepted_applications');
    }

    // Submit Receipt
    public function submit_receipt() {
        $student_id = $this->input->post('student_id');
        $student_name = $this->input->post('student_name');
        $payment_date = $this->input->post('payment_date');
        $amount = $this->input->post('amount');
    
        // Config for file upload
        $config['upload_path'] = './uploads/receipts/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['max_size'] = 2048;
        $config['file_name'] = 'receipt_' . $student_id . '_' . time();
    
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('receipt_file')) {
            $upload_data = $this->upload->data();
            $receipt_path = 'uploads/receipts/' . $upload_data['file_name'];
    
            $result = $this->Application_model->update_receipt($student_id, $student_name, $receipt_path, $payment_date, $amount);
            if ($result) {
                $this->session->set_flashdata('success', 'Receipt added/updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to update receipt.');
            }
        } else {
            $this->session->set_flashdata('error', 'Failed to upload receipt: ' . $this->upload->display_errors());
        }
        redirect('applications/accepted_applications');
    }




    public function check_and_add_login_credentials($student_id) {
        // Fetch the student's status
        $student = $this->Application_model->get_student_by_id($student_id);
    
        if ($student && $student->status == 'approved') {
            // Check if credentials already exist in login_tbl
            $credentials_exist = $this->Application_model->check_login_credentials($student->username);
    
            if (!$credentials_exist) {
                // Add credentials if not already in login_tbl
                $result = $this->Application_model->add_login_credentials($student_id);
    
                if ($result) {
                    $this->session->set_flashdata('success', 'Credentials added for approved student.');
                } else {
                    $this->session->set_flashdata('error', 'Failed to add login credentials for approved student.');
                }
            } else {
                $this->session->set_flashdata('info', 'Login credentials already exist for this student.');
            }
        } else {
            $this->session->set_flashdata('error', 'Student is not approved yet.');
        }
    
        // Redirect back to the appropriate page (you can modify this redirection)
        redirect('applications/approved_applications');
    }


    public function register_student() {
    // Set form validation rules
    $this->form_validation->set_rules('full_name', 'Full Name', 'required');
    $this->form_validation->set_rules('dob', 'Date of Birth', 'required');
    $this->form_validation->set_rules('phone_number', 'Phone Number', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[student.email]');
    $this->form_validation->set_rules('university_name', 'University Name', 'required');
    $this->form_validation->set_rules('country', 'Country', 'required');
    $this->form_validation->set_rules('address', 'Address', 'required');
    $this->form_validation->set_rules('contact_person_email', 'University Contact Person Email', 'required|valid_email');
    $this->form_validation->set_rules('passport_number', 'Passport Number', 'required');
    $this->form_validation->set_rules('visa_number', 'Visa Number', 'required');
    $this->form_validation->set_rules('course_name', 'Course Name', 'required');
    $this->form_validation->set_rules('course_category', 'Course Category', 'required');
    $this->form_validation->set_rules('level', 'Level', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required|is_unique[student.username]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
    $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');

    if ($this->form_validation->run() == FALSE) {
        // Validation failed, reload the form with validation errors
        $this->session->set_flashdata('error', validation_errors());
        redirect('applications/registration');
    } else {
        // Prepare data for insertion into the student table
        $data = array(
            'full_name' => $this->input->post('full_name'),
            'dob' => $this->input->post('dob'),
            'phone_number' => $this->input->post('phone_number'),
            'email' => $this->input->post('email'),
            'university_name' => $this->input->post('university_name'),
            'country' => $this->input->post('country'),
            'address' => $this->input->post('address'),
            'contact_person_email' => $this->input->post('contact_person_email'),
            'passport_number' => $this->input->post('passport_number'),
            'visa_number' => $this->input->post('visa_number'),
            'course_name' => $this->input->post('course_name'),
            'course_category' => $this->input->post('course_category'),
            'level' => $this->input->post('level'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'), // Encrypt password
        );

        // Insert into the student table
        if ($this->Application_model->insert_student($data)) {
            $this->session->set_flashdata('success', 'Student registered successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to register student.');
        }
        redirect('applications/registration');
    }
}





}
