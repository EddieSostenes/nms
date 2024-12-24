<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CourseController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Course_model');  // Load the Course model
        $this->load->library('session');
        $this->load->helper('url');

        // Ensure the user is logged in (you can modify this as per your authentication method)
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    // Add course view
    public function add_course() {
        if ($this->input->post()) {
            $course_data = array(
                'course_name' => $this->input->post('course_name'),
                'course_category' => $this->input->post('course_category'), // Course category
                'description' => $this->input->post('description'),  // Course description
                'duration' => $this->input->post('duration'),  // Duration
                'status' => 'active', // Default status
                'added_on' => date('Y-m-d H:i:s') // Timestamp
            );

            // Insert course into the database
            if ($this->Course_model->insert_course($course_data)) {
                $this->session->set_flashdata('success', 'Course added successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to add course. Please try again.');
            }
            redirect('courses/manage_courses');
        } else {
            // Load add course view
            $this->load->view('admin/header');
            $this->load->view('admin/courses/add_course');
            $this->load->view('admin/footer');
        }
    }

    // Manage courses view
    public function manage_courses() {
        $data['courses'] = $this->Course_model->get_all_courses();  // Fetch all courses
        $this->load->view('admin/header');
        $this->load->view('admin/courses/manage_courses', $data);
        $this->load->view('admin/footer');
    }

    // Edit course view
    public function edit_course($id) {
        $data['course'] = $this->Course_model->get_course_by_id($id);  // Fetch course by ID

        if ($this->input->post()) {
            $course_data = array(
                'course_name' => $this->input->post('course_name'),
                'course_category' => $this->input->post('course_category'), // Course category
                'description' => $this->input->post('description'),  // Course description
                'duration' => $this->input->post('duration'),  // Duration
                'status' => $this->input->post('status'), // Status
                'added_on' => date('Y-m-d H:i:s')  // Update added_on field
            );

            // Update the course in the database
            if ($this->Course_model->update_course($id, $course_data)) {
                $this->session->set_flashdata('success', 'Course updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to update course. Please try again.');
            }
            redirect('courses/manage_courses');
        } else {
            // Load edit course view
            $this->load->view('admin/header');
            $this->load->view('admin/courses/edit_course', $data);
            $this->load->view('admin/footer');
        }
    }

    // Delete course
    public function delete_course($id) {
        if ($this->Course_model->delete_course($id)) {
            $this->session->set_flashdata('success', 'Course deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete course. Please try again.');
        }
        redirect('courses/manage_courses');
    }
}
