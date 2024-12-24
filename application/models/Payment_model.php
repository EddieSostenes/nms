<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load database connection
    }

    // Example method to get the payment status for a student
    public function get_payment_status($student_id) {
        $this->db->where('student_id', $student_id);
        $query = $this->db->get('payments');  // 'payments' should be your payment table
        return $query->result_array();
    }

    // Add any other methods related to payment operations
}
