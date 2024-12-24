<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Application_model extends CI_Model {

    // Get new applications
    public function get_new_applications() {
        $this->db->where('status', 'new');
        $query = $this->db->get('student');
        return $query->result_array();
    }

    // Get accepted applications
    public function get_accepted_applications() {
        $this->db->where('status', 'accepted');
        $query = $this->db->get('student');
        return $query->result_array();
    }

    // Get rejected applications
    public function get_rejected_applications() {
        $this->db->where('status', 'rejected');
        $query = $this->db->get('student');
        return $query->result_array();
    }

    // Get approved applications
    public function get_approved_applications() {
        $this->db->select('student.*, payments.control_number, payments.receipt_path');
        $this->db->from('student');
        $this->db->join('payments', 'payments.student_id = student.student_id', 'left'); // Left join with payments table
        $this->db->where('student.status', 'approved');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Update status of an application
    public function update_status($student_id, $status) {
        $this->db->where('student_id', $student_id);
        $this->db->update('student', array('status' => $status));
        return $this->db->affected_rows() > 0;
    }

    // Method to approve payment if control number and receipt are present
    public function approve_payment_if_ready($student_id) {
        $this->db->where('student_id', $student_id);
        $payment = $this->db->get('payments')->row();

        if ($payment->control_number && $payment->receipt_path) {
            $this->db->where('student_id', $student_id);
            return $this->db->update('payments', array('status' => 'approved'));
        }

        return false;
    }

    // Method to update control number in the payments table
    public function update_control_number($student_id, $student_name, $control_number) {
        $this->db->where('student_id', $student_id);
        $payment = $this->db->get('payments')->row_array();

        if ($payment) {
            // Update existing payment record
            $this->db->where('student_id', $student_id);
            $this->db->update('payments', array('control_number' => $control_number, 'student_name' => $student_name, 'status' => 'pending'));
            return $this->db->affected_rows() > 0;
        } else {
            // Insert new payment record
            $data = array(
                'student_id' => $student_id,
                'student_name' => $student_name,
                'control_number' => $control_number,
                'status' => 'pending'
            );
            return $this->db->insert('payments', $data);
        }
    }

    // Method to update receipt in the payments table
    public function update_receipt($student_id, $student_name, $receipt_path, $payment_date, $amount) {
        $this->db->where('student_id', $student_id);
        $payment = $this->db->get('payments')->row_array();

        if ($payment) {
            $data = array(
                'receipt_path' => $receipt_path,
                'payment_date' => $payment_date,
                'amount' => $amount,
                'student_name' => $student_name,
                'status' => 'pending'
            );
            $this->db->where('student_id', $student_id);
            $this->db->update('payments', $data);
            return $this->db->affected_rows() > 0;
        } else {
            $data = array(
                'student_id' => $student_id,
                'student_name' => $student_name,
                'receipt_path' => $receipt_path,
                'payment_date' => $payment_date,
                'amount' => $amount,
                'status' => 'pending'
            );
            return $this->db->insert('payments', $data);
        }
    }

    // Get payment details
    public function get_payment_details($student_id) {
        $this->db->where('student_id', $student_id);
        return $this->db->get('payments')->row();
    }

    // Approve application
    public function approve_application($student_id) {
        $this->db->where('student_id', $student_id);
        $this->db->update('student', array('status' => 'approved'));
        return $this->db->affected_rows() > 0;
    }

    // Update payment status
    public function update_payment_status($student_id, $status) {
        $this->db->where('student_id', $student_id);
        $payment = $this->db->get('payments')->row();

        if ($payment) {
            $this->db->where('student_id', $student_id);
            $this->db->update('payments', array('status' => $status));
            return $this->db->affected_rows() > 0;
        }
        return false;
    }





    // Fetch student details by student_id
    public function get_student_by_id($student_id) {
        $this->db->where('student_id', $student_id);
        return $this->db->get('student')->row();
    }

    // Check if the student's username already exists in login_tbl
    public function check_login_credentials($username) {
        $this->db->where('username', $username);
        return $this->db->get('login_tbl')->row();  // Returns the row if credentials exist
    }

   // Add login credentials to login_tbl (non-hashed for testing)
public function add_login_credentials($student_id) {
    // Fetch the student's record from the student table
    $student = $this->get_student_by_id($student_id);

    if ($student) {
        // Check if the username already exists in login_tbl
        $existing_user = $this->check_login_credentials($student->username);

        if (!$existing_user) {
            // Store the plain text password temporarily (not hashed)
            $login_data = array(
                'username' => $student->username,
                'password' => $student->password,  // Store plain-text password (temporary)
                'usertype' => 3,  // User type 3 for students
                'status' => 1      // Active status
            );

            return $this->db->insert('login_tbl', $login_data);
        }
    }

    return false;  // If student not found or user already exists
}

 // Insert a new student into the student table
 public function insert_student($data) {
    return $this->db->insert('student', $data);
}

// Get list of countries (you can use a table or static list)
public function get_countries() {
    $this->db->select('country_name');
    $query = $this->db->get('country_tbl');
    return $query->result_array();
}
    



}
