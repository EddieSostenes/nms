<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_model extends CI_Model {


    function insert_staff($data)
    {
        $this->db->insert("staff_tbl",$data);
        return $this->db->insert_id();
    }

    function select_staff()
    {
        $this->db->order_by('staff_tbl.id','DESC');
        $this->db->select("staff_tbl.*,department_tbl.department_name");
        $this->db->from("staff_tbl");
        $this->db->join("department_tbl",'department_tbl.id=staff_tbl.department_id');
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_staff_byID($id)
    {
        $this->db->where('staff_tbl.id',$id);
        $this->db->select("staff_tbl.*,department_tbl.department_name");
        $this->db->from("staff_tbl");
        $this->db->join("department_tbl",'department_tbl.id=staff_tbl.department_id');
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_staff_byEmail($email)
    {

        $this->db->where('email',$email);
        $qry=$this->db->get('staff_tbl');
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_staff_byDept($dpt)
    {
        $this->db->where('staff_tbl.department_id',$dpt);
        $this->db->select("staff_tbl.*,department_tbl.department_name");
        $this->db->from("staff_tbl");
        $this->db->join("department_tbl",'department_tbl.id=staff_tbl.department_id');
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }


    function delete_staff($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("staff_tbl");
        $this->db->affected_rows();
    }

    
    function update_staff($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('staff_tbl',$data);
        $this->db->affected_rows();
    }

    public function get_staff_info($staff_id) {
        $this->db->where('id', $id);
        $query = $this->db->get('staff_tbl');
        return $query->row_array();  // Make sure 'staff_name' is in the result
    }
    

    // Fetch all staff/supervisors
    public function get_all_staff() {
        return $this->db->get('staff_tbl')->result_array();
    }
    






    // Fetch allocated students for a specific staff member
    public function get_allocated_students($staff_id) {
        $this->db->select('student.*, student_supervisor_allocation.*');
        $this->db->from('allocation_tbl');
        $this->db->join('student', 'student.student_id = student_supervisor_allocation.student_id');
        $this->db->where('student_supervisor_allocation.staff_id', $staff_id);

        $query = $this->db->get();

        if (!$query) {
            // Log database error if the query fails
            log_message('error', 'Query to fetch allocated students failed: ' . $this->db->_error_message());
            return false;
        }

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            // Log no results found
            log_message('info', 'No students found allocated to staff_id: ' . $staff_id);
            return [];
        }
    }



    public function get_staff_by_id($staff_id) {
        $this->db->where('id', $staff_id);
        return $this->db->get('staff_tbl')->row_array();
    }

    public function get_all_supervisors() {
        $this->db->select('id, staff_name');
        $this->db->from('staff_tbl');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function get_supervisor_name($staff_id) {
        $this->db->select('staff_name');  // Assuming 'staff_name' is the column in the staff table
        $this->db->from('staff_tbl');     // Assuming 'staff_tbl' is the staff table
        $this->db->where('id', $staff_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->staff_name;
        } else {
            return 'Supervisor';  // Default text if no name found
        }
    }



    public function get_staff_by_username($username) {
        $this->db->select('id, staff_name');
        $this->db->from('staff_tbl');
        $this->db->where('email', $username);  // Assuming login_tbl.username matches staff_tbl.email
        $query = $this->db->get();
        return $query->row_array();  // Return row as an associative array
    }
    




}
