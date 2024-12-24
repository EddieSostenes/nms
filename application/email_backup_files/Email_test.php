<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_test extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Email_model');  // Load the Email_model
        $this->load->library('session');
    }

    public function send() {
        $to = $this->input->post('email');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        $name = $this->input->post('name');

        $result = $this->Email_model->send_email($to, $subject, $message, 'eddiesostenes7@gmail.com', $name);

        if ($result) {
            $this->session->set_flashdata('success', 'Email sent successfully!');
        } else {
            $error = $this->email->print_debugger();  // Capture the error details
            $this->session->set_flashdata('error', 'Failed to send email. ' . $error);
        }

        redirect('email_test/send_email_view');  // Redirect back to the form
    }

    public function send_email_view() {
        $this->load->view('admin/header');
        $this->load->view('email_test/send_email_view');
        $this->load->view('admin/footer');
    }
}
