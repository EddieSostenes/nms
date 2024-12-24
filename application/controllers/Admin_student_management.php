<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_student_management extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Student_model');
        $this->load->model('Staff_model');
        $this->load->model('Allocation_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    // View for assigning students to supervisors
    public function assign_supervisor() {
        $data['students'] = $this->Student_model->get_all_students();
        $data['staff'] = $this->Staff_model->get_all_staff();
        $this->load->view('admin/header');
        $this->load->view('admin/assign_supervisor', $data);
        $this->load->view('admin/footer');
    }

    // Function to save the allocation of students to supervisors
    public function save_allocation() {
        $student_id = $this->input->post('student_id');
        $staff_id = $this->input->post('staff_id');

        $allocation_data = array(
            'student_id' => $student_id,
            'staff_id' => $staff_id,
            'allocation_date' => date('Y-m-d'),
            'status' => 'active'
        );

        $result = $this->Allocation_model->assign_student($allocation_data);

        if ($result) {
            $this->session->set_flashdata('success', 'Student assigned to supervisor successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to assign student.');
        }
        redirect('Admin_student_management/assign_supervisor');
    }

    // View to manage students and their assigned supervisors
    public function manage_assigned_students() {
        $data['assignments'] = $this->Allocation_model->get_all_assignments();
        $this->load->view('admin/header');
        $this->load->view('admin/manage_assigned_students', $data);
        $this->load->view('admin/footer');
    }
}
