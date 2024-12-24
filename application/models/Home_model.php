<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    // Function to validate login credentials
    public function logindata($un, $pw)
    {
        // Directly compare the plain-text password
        $this->db->where('username', $un);               
        $this->db->where('password', $pw);  // Direct comparison with plain-text password
        $qry = $this->db->get("login_tbl");
        
        if ($qry->num_rows() > 0) {
            return $qry->result_array(); // Return the login data if found
        } else {
            return '';  // Return empty if no match found
        }
    }

    // Function to insert login data
    public function insert_login($data)
    {
        $this->db->insert("login_tbl", $data);
        return $this->db->insert_id();
    }

    // Function to update room data
    public function update_rooms($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('room_tbl', $data);
    }

    // Function to select reservation data
    public function select_reservation()
    {
        $this->db->order_by('reservation_tbl.id', 'DESC');
        $this->db->select("reservation_tbl.*, room_tbl.roomname, booking_tbl.name, booking_tbl.email, booking_tbl.phno");
        $this->db->from("reservation_tbl");
        $this->db->join("room_tbl", 'room_tbl.id=reservation_tbl.room');
        $this->db->join("booking_tbl", 'booking_tbl.id=reservation_tbl.booking_id');
        $qry = $this->db->get();
        if ($qry->num_rows() > 0) {
            return $qry->result_array();
        }
    }

    // Function to select countries data
    public function select_countries()
    {
        $qry = $this->db->get('country_tbl');
        if ($qry->num_rows() > 0) {
            return $qry->result_array();
        }
    }

    // Function to select rooms by ID
    public function select_rooms_byID($id)
    {
        $this->db->where('id', $id);
        $qry = $this->db->get('room_tbl');
        if ($qry->num_rows() > 0) {
            return $qry->result_array();
        }
    }

    // Function to delete login data by ID
    public function delete_login_byID($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("login_tbl");
        return $this->db->affected_rows();
    }

    // Function to insert student login data
    public function insert_student_login($student_id)
    {
        // Fetch student data from the student table
        $this->db->where('student_id', $student_id);
        $student = $this->db->get('student')->row_array();
    
        if ($student) {
            // Prepare login data
            $login_data = array(
                'username' => $student['username'],  // Assuming email or username as login username
                'password' => $student['password'],  // Plain-text password for now
                'usertype' => 3,  // Student usertype
                'status' => 1  // Active status
            );
    
            // Insert into login_tbl and get login_id
            $this->db->insert('login_tbl', $login_data);
            $login_id = $this->db->insert_id();
    
            // Update student table with login_id
            $this->db->where('student_id', $student_id);
            $this->db->update('student', ['login_id' => $login_id]);
        }
    }

    // Function to generate logins for all students without login_ids
    public function generate_login_for_all_students()
    {
        // Fetch all students who do not have a login_id
        $this->db->where('login_id IS NULL', null, false);
        $students = $this->db->get('student')->result_array();

        // Loop through each student and create login entries for them
        foreach ($students as $student) {
            // Prepare login data
            $login_data = array(
                'username' => $student['username'],  // Username from student table
                'password' => $student['password'],  // Plain-text password for now
                'usertype' => 3,  // Student user type
                'status' => 1  // Active status
            );

            // Insert into login_tbl and get the generated login_id
            $this->db->insert('login_tbl', $login_data);
            $login_id = $this->db->insert_id();  // Get the last inserted ID

            // Update student record with the generated login_id
            $this->db->where('student_id', $student['student_id']);
            $this->db->update('student', ['login_id' => $login_id]);
        }

        return count($students) . " students updated with login_ids";
    }
}
