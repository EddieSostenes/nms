<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_type extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Student_type_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    // Add student type
    public function add_student_type() {
        $this->load->view('admin/header');
        $this->load->view('admin/student_type/add');
        $this->load->view('admin/footer');
    }

    // Insert student type into the database
    public function insert_student_type() {
        $data = array(
            'student_type_name' => $this->input->post('student_type_name'),
            'description' => $this->input->post('description'),
        );

        if ($this->Student_type_model->insert_student_type($data)) {
            $this->session->set_flashdata('success', 'Student Type added successfully');
        } else {
            $this->session->set_flashdata('error', 'Failed to add Student Type');
        }

        redirect('manage-student-type');
    }

    // Manage student types (list view)
    public function manage_student_type() {
        $data['content'] = $this->Student_type_model->get_all_student_types();
        $this->load->view('admin/header');
        $this->load->view('admin/student_type/manage', $data);
        $this->load->view('admin/footer');
    }

    // Edit student type
    public function edit_student_type($id) {
        $data['student_type'] = $this->Student_type_model->get_student_type_by_id($id);
        $this->load->view('admin/header');
        $this->load->view('admin/student_type/edit', $data);
        $this->load->view('admin/footer');
    }

    // Update student type
    public function update_student_type($id) {
        $data = array(
            'student_type_name' => $this->input->post('student_type_name'),
            'description' => $this->input->post('description'),
        );

        if ($this->Student_type_model->update_student_type($id, $data)) {
            $this->session->set_flashdata('success', 'Student Type updated successfully');
        } else {
            $this->session->set_flashdata('error', 'Failed to update Student Type');
        }

        redirect('manage-student-type');
    }

    // Delete student type
    public function delete_student_type($id) {
        if ($this->Student_type_model->delete_student_type($id)) {
            $this->session->set_flashdata('success', 'Student Type deleted successfully');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete Student Type');
        }

        redirect('manage-student-type');
    }
}
