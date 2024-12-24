<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load the database
    }

    // Insert a new student into the database
    public function insert_student($data) {
        return $this->db->insert('student', $data);
    }

    public function get_user_by_email($email) {
        $this->db->where('email', $email);
        return $this->db->get('student')->row(); // Assuming 'student' table contains user info
    }

    public function save_reset_token($email, $token) {
        $data = array(
            'reset_token' => $token,
            'reset_token_expiry' => date('Y-m-d H:i:s', strtotime('+1 hour')) // Token valid for 1 hour
        );
        $this->db->where('email', $email);
        return $this->db->update('student', $data);  // Store token and expiry in the user table
    }

    public function verify_reset_token($token) {
        $this->db->where('reset_token', $token);
        $this->db->where('reset_token_expiry >=', date('Y-m-d H:i:s'));
        return $this->db->get('student')->row();  // Check if token is valid and not expired
    }

    public function update_password($email, $new_password) {
        $data = array(
            'password' => $new_password, // Store plain-text password (temporary)
            'reset_token' => NULL,  // Clear the reset token after successful password change
            'reset_token_expiry' => NULL
        );
        $this->db->where('email', $email);
        return $this->db->update('student', $data);
    }
}
