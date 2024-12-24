<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model {

    public function send_email($to, $subject = 'Training Management System', $message, $from = 'eddiesostenes7@gmail.com', $name = 'Training Management System') {
        // Email configuration
        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'eddiesostenes7@gmail.com', // Your email address
            'smtp_pass' => 'fmzzqtygxauttbrs',         // Your email password, ensure no spaces
            'mailtype'  => 'html', 
            'charset'   => 'utf-8',
            'newline'   => "\r\n", // Required for some servers
            'wordwrap'  => TRUE
        );

        // Load email library and initialize configuration
        $this->load->library('email', $config);
        $this->email->initialize($config);

        // Ensure subject is not empty
        if (empty($subject)) {
            $subject = 'Training Management System'; // Default subject
        }

        // Set email parameters
        $this->email->from($from, $name);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        // Send email
        if ($this->email->send()) {
            return TRUE;
        } else {
            // Log email sending error
            log_message('error', 'Email failed to send. Error: ' . $this->email->print_debugger());
            return FALSE;
        }
    }
}
