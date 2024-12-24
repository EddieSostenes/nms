<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EnrollmentController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Enrollment_model');
        $this->load->model('Student_model');
        $this->load->model('Staff_model');
        $this->load->model('Program_model');
        $this->load->model('Course_model');
        $this->load->model('Training_model');
        $this->load->library('session');
    }

    // Add Enrollment
    public function add_enrollment() {
        if ($this->input->post()) {
            $data = array(
                'student_id' => $this->input->post('student_id'),
                'supervisor_id' => $this->input->post('supervisor_id'),
                'program_id' => $this->input->post('program_id'),
                'course_id' => $this->input->post('course_id'),
                'training_id' => $this->input->post('training_id'),
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
                'status' => $this->input->post('status')
            );

            $this->Enrollment_model->add_enrollment($data);
            $this->session->set_flashdata('success', 'Enrollment added successfully.');
            redirect('manage-enrollments');
        } else {
            $data['students'] = $this->Student_model->get_approved_students();
            $data['supervisors'] = $this->Staff_model->get_all_supervisors();
            $data['programs'] = $this->Program_model->get_all_programs();
            $data['courses'] = $this->Course_model->get_all_courses();
            $data['trainings'] = $this->Training_model->get_all_trainings();

            $this->load->view('admin/header');
            $this->load->view('admin/enrollment/add_enrollment', $data);
            $this->load->view('admin/footer');
        }
    }

    // Manage Enrollments
    public function manage_enrollments() {
        $data['enrollments'] = $this->Enrollment_model->get_all_enrollments();
        $this->load->view('admin/header');
        $this->load->view('admin/enrollment/manage_enrollments', $data);
        $this->load->view('admin/footer');
    }

    // Edit Enrollment
    public function edit_enrollment($id) {
        if ($this->input->post()) {
            $data = array(
                'student_id' => $this->input->post('student_id'),
                'supervisor_id' => $this->input->post('supervisor_id'),
                'program_id' => $this->input->post('program_id'),
                'course_id' => $this->input->post('course_id'),
                'training_id' => $this->input->post('training_id'),
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
                'status' => $this->input->post('status')
            );

            $this->Enrollment_model->update_enrollment($id, $data);
            $this->session->set_flashdata('success', 'Enrollment updated successfully.');
            redirect('manage-enrollments');
        } else {
            $data['enrollment'] = $this->Enrollment_model->get_enrollment_by_id($id);
            $data['students'] = $this->Student_model->get_approved_students();
            $data['supervisors'] = $this->Staff_model->get_all_supervisors();
            $data['programs'] = $this->Program_model->get_all_programs();
            $data['courses'] = $this->Course_model->get_all_courses();
            $data['trainings'] = $this->Training_model->get_all_trainings();

            $this->load->view('admin/header');
            $this->load->view('admin/enrollment/edit_enrollment', $data);
            $this->load->view('admin/footer');
        }
    }

    // Delete Enrollment
    public function delete_enrollment($id) {
        $this->Enrollment_model->delete_enrollment($id);
        $this->session->set_flashdata('success', 'Enrollment deleted successfully.');
        redirect('manage-enrollments');
    }
}
?>
