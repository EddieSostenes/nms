<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_student_management extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Allocation_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    // View for supervisors to see their allocated students
    public function view_allocated_students() {
        $staff_id = $this->session->userdata('userid');
        $data['allocated_students'] = $this->Allocation_model->get_students_by_supervisor($staff_id);
        $this->load->view('staff/header');
        $this->load->view('staff/view_allocated_students', $data);
        $this->load->view('staff/footer');
    }



    public function update_allocation($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('student_supervisor_allocation', $data);
    }
    

}
