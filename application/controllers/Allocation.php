<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Allocation extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Allocation_model');
        $this->load->model('Student_model');
        $this->load->model('Staff_model');
        $this->load->library('session');
    }

    // Assign a student to a supervisor (Admin use)
    public function assign_student() {
        if ($this->input->post()) {
            // Get posted student and staff IDs
            $student_id = $this->input->post('student_id');
            $staff_id = $this->input->post('staff_id');
            
            // Fetch the student and supervisor names from their respective tables
            $student = $this->Student_model->get_student_by_id($student_id);
            $staff = $this->Staff_model->get_staff_by_id($staff_id);
    
            // Make sure the student and staff exist before proceeding
            if ($student && $staff) {
                // Prepare the data array to be inserted into the database
                $data = array(
                    'student_id' => $student_id,
                    'student_name' => $student['full_name'], // Fetch full_name from student table
                    'staff_id' => $staff_id,
                    'supervisor_name' => $staff['staff_name'], // Fetch staff_name from staff_tbl
                    'allocation_date' => date('Y-m-d'), // Set current date as allocation date
                    'status' => 'active' // Default to active upon assignment
                );
    
                // Insert the allocation data into the database
                $this->Allocation_model->assign_student($data);
    
                // Set success message
                $this->session->set_flashdata('success', 'Student assigned successfully.');
    
                // Redirect to the assignments view page
                redirect('allocation/view_assignments');
            } else {
                // If student or supervisor doesn't exist, set an error message
                $this->session->set_flashdata('error', 'Invalid student or supervisor selected.');
                redirect('allocation/assign_student');
            }
        } else {
            // Fetch students and staff to populate the dropdowns in the form
            $data['students'] = $this->Student_model->get_all_students();
            $data['staff'] = $this->Staff_model->get_all_staff();
            
            // Load the views with data
            $this->load->view('admin/header');
            $this->load->view('allocation/assign_student', $data);
            $this->load->view('admin/footer');
        }
    }
    
    
    
    // Edit allocation function
    public function edit($id) {
        $data['allocation'] = $this->Allocation_model->get_allocation_by_id($id);
        $data['students'] = $this->Student_model->get_all_students();
        $data['staff'] = $this->Staff_model->get_all_staff();
    
        if ($this->input->post()) {
            $student_id = $this->input->post('student_id');
            $staff_id = $this->input->post('staff_id');
    
            // Ensure that valid student_id and staff_id are passed
            if (!empty($student_id) && !empty($staff_id)) {
                // Fetch the student and supervisor names
                $student = $this->Student_model->get_student_by_id($student_id);
                $staff = $this->Staff_model->get_staff_by_id($staff_id);
    
                // Check if student and staff exist
                if ($student && $staff) {
                    $update_data = array(
                        'student_id' => $student_id,
                        'student_name' => $student['full_name'], // Update student name
                        'staff_id' => $staff_id,
                        'supervisor_name' => $staff['staff_name'], // Update supervisor name
                        'status' => $this->input->post('status')
                    );
    
                    $this->Allocation_model->update_allocation($id, $update_data);
                    $this->session->set_flashdata('success', 'Allocation updated successfully.');
                } else {
                    $this->session->set_flashdata('error', 'Invalid student or supervisor.');
                }
            } else {
                $this->session->set_flashdata('error', 'Both student and supervisor must be selected.');
            }
    
            redirect('allocation/manage');
        }
    
        // Load edit view
        $this->load->view('admin/header');
        $this->load->view('allocation/edit', $data);
        $this->load->view('admin/footer');
    }
    
    

    // Manage allocated students
    public function manage() {
        $data['assignments'] = $this->Allocation_model->get_all_assignments();  // Get all assignments

        // Load the manage view
        $this->load->view('admin/header');
        $this->load->view('allocation/manage', $data);
        $this->load->view('admin/footer');
    }

    // View all student-supervisor assignments (Admin)
    public function view_assignments() {
        $data['assignments'] = $this->Allocation_model->get_all_assignments();
        $this->load->view('admin/header');
        $this->load->view('allocation/view_assignments', $data);
        $this->load->view('admin/footer');
    }

    // View students assigned to a specific supervisor (Staff view)
    public function view_my_students() {
        $staff_id = $this->session->userdata('userid'); // Assuming staff ID is stored in session
        $data['students'] = $this->Allocation_model->get_students_by_supervisor($staff_id);
        $this->load->view('staff/header');
        $this->load->view('allocation/view_my_students', $data);
        $this->load->view('staff/footer');
    }



    // Delete allocation
    public function delete($id) {
        // Call model method to delete the allocation
        $result = $this->Allocation_model->delete_allocation($id);

        if ($result) {
            $this->session->set_flashdata('success', 'Allocation deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete allocation.');
        }

        redirect('allocation/manage');
    }



    // Update allocation
    public function update($id) {
        if ($this->input->post()) {
            $student_id = $this->input->post('student_id');  // Hidden or passed student ID
            $staff_id = $this->input->post('staff_id');
            
            // Fetch the student and supervisor names
            $student = $this->Student_model->get_student_by_id($student_id);
            $staff = $this->Staff_model->get_staff_by_id($staff_id);
    
            // Validate if the student and supervisor are found
            if (!$student || !$staff) {
                $this->session->set_flashdata('error', 'Invalid student or supervisor.');
                redirect('allocation/edit/' . $id);
                return;
            }
    
            // Prepare the data for updating
            $update_data = array(
                'student_id' => $student_id,
                'student_name' => $student['full_name'],
                'staff_id' => $staff_id,
                'supervisor_name' => $staff['staff_name'],
                'status' => $this->input->post('status')
            );
    
            // Update the allocation in the database
            $this->Allocation_model->update_allocation($id, $update_data);
    
            // Set a success message and redirect
            $this->session->set_flashdata('success', 'Allocation updated successfully.');
            redirect('allocation/manage');
        } else {
            // If form is not submitted, load the edit view
            $data['allocation'] = $this->Allocation_model->get_allocation_by_id($id);
            $data['students'] = $this->Student_model->get_all_students();
            $data['staff'] = $this->Staff_model->get_all_staff();
            
            $this->load->view('admin/header');
            $this->load->view('allocation/edit', $data);
            $this->load->view('admin/footer');
        }
    }
    
    

}
