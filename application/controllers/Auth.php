<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');  // Load the Auth model
        $this->load->model('Home_model');  // Load the Home model to access countries
        $this->load->library(array('form_validation', 'session'));  // Load form validation and session
        $this->load->helper(array('url', 'form'));  // Load URL and form helpers
    }

    // Display the registration form
    public function register() {
        $data['country'] = $this->Home_model->select_countries();  // Fetch country list from Home_model
        $this->load->view('templates/header');
        $this->load->view('auth/register', $data);  // Pass country data to the view
        $this->load->view('templates/footer');
    }

    public function registration_success() {
        $this->load->view('auth/registration_success');
    }

    // Handle student registration
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
            $data['country'] = $this->Home_model->select_countries();  // Fetch country list again
            $this->load->view('auth/registration_error', $data);
        } else {
            // Validation passed, prepare the data for insertion
            $data = array(
                'full_name' => $this->input->post('full_name'),
                'dob' => $this->input->post('dob'),
                'phone_number' => $this->input->post('phone_number'),
                'email' => $this->input->post('email'),
                'university_name' => $this->input->post('university_name'),
                'country' => $this->input->post('country'),  // Get country input
                'address' => $this->input->post('address'),
                'contact_person_email' => $this->input->post('contact_person_email'),
                'passport_number' => $this->input->post('passport_number'),
                'visa_number' => $this->input->post('visa_number'),
                'course_name' => $this->input->post('course_name'),
                'course_category' => $this->input->post('course_category'),
                'level' => $this->input->post('level'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),  // Temporarily store plain text password
            );

            // Insert the student into the database
            if ($this->Auth_model->insert_student($data)) {
                $this->session->set_flashdata('success', 'Congratulations! You have registered successfully. You will receive an email for further processes.');
                redirect('auth/registration_success');  // Redirect to success page
            } else {
                // Simplify the error message to a generic one
                $this->session->set_flashdata('error', 'Registration failed. Invalid username or email.');
                redirect('auth/registration_error');  // Redirect to the registration_error page
            }
        }
    }

    public function forgot_password() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/forgot_password');
        } else {
            $email = $this->input->post('email');
            $user = $this->Auth_model->get_user_by_email($email);

            if ($user) {
                // Generate a reset token
                $token = bin2hex(random_bytes(50));
                $this->Auth_model->save_reset_token($email, $token);

                // Send reset email
                $reset_link = base_url('auth/reset_password/' . $token);
                $message = "Please click on the following link to reset your password: " . $reset_link;

                // Send email (you can configure email settings in CodeIgniter)
                mail($email, "Password Reset", $message);

                $this->session->set_flashdata('message', 'A password reset link has been sent to your email.');
                redirect('auth/forgot_password');
            } else {
                $this->session->set_flashdata('message', 'Email address not found.');
                redirect('auth/forgot_password');
            }
        }
    }
}
