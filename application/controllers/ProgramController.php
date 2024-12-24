<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProgramController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Program_model');
        $this->load->model('Program_fee_model');
    }

    // Add Program
    public function add_program() {
        if ($this->input->post()) {
            $data = array(
                'program_name' => $this->input->post('program_name'),
                'duration' => $this->input->post('duration'),
                'description' => $this->input->post('description'),
                'status' => 'active'
            );
            $this->Program_model->add_program($data);
            $this->session->set_flashdata('success', 'Program added successfully.');
            redirect('manage-programs');
        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/program/add_program');
            $this->load->view('admin/footer');
        }
    }

    // Manage Programs
    public function manage_programs() {
        $data['programs'] = $this->Program_model->get_all_programs();
        $this->load->view('admin/header');
        $this->load->view('admin/program/manage_programs', $data);
        $this->load->view('admin/footer');
    }

    // Edit Program
    public function edit_program($id) {
        if ($this->input->post()) {
            $data = array(
                'program_name' => $this->input->post('program_name'),
                'duration' => $this->input->post('duration'),
                'description' => $this->input->post('description'),
                'status' => $this->input->post('status')
            );
            $this->Program_model->update_program($id, $data);
            $this->session->set_flashdata('success', 'Program updated successfully.');
            redirect('manage-programs');
        } else {
            $data['program'] = $this->Program_model->get_program_by_id($id);
            $this->load->view('admin/header');
            $this->load->view('admin/program/edit_program', $data);
            $this->load->view('admin/footer');
        }
    }

    // Delete Program
    public function delete_program($id) {
        $this->Program_model->delete_program($id);
        $this->session->set_flashdata('success', 'Program deleted successfully.');
        redirect('manage-programs');
    }

    // Add Program Fee
    public function add_program_fee() {
        if ($this->input->post()) {
            $data = array(
                'program_id' => $this->input->post('program_id'),
                'price' => $this->input->post('price'),
                'student_type' => $this->input->post('student_type'),
                'currency' => $this->input->post('currency'),
                'level' => $this->input->post('level'),
                'duration' => $this->input->post('duration'),
                'status' => 'active'
            );
            $this->Program_fee_model->add_program_fee($data);
            $this->session->set_flashdata('success', 'Program fee added successfully.');
            redirect('manage-program-fees');
        } else {
            $data['programs'] = $this->Program_model->get_all_programs(); // Fetch all programs to show in dropdown
            $this->load->view('admin/header');
            $this->load->view('admin/program/add_program_fee', $data);
            $this->load->view('admin/footer');
        }
    }
    

    // Manage Program Fees
    public function manage_program_fees() {
        $data['fees'] = $this->Program_fee_model->get_all_program_fees();
        $this->load->view('admin/header');
        $this->load->view('admin/program/manage_program_fees', $data);
        $this->load->view('admin/footer');
    }

    // Edit Program Fee
    public function edit_program_fee($id) {
        if ($this->input->post()) {
            $data = array(
                'program_id' => $this->input->post('program_id'),
                'price' => $this->input->post('price'),
                'student_type' => $this->input->post('student_type'),
                'currency' => $this->input->post('currency'),
                'level' => $this->input->post('level'),
                'duration' => $this->input->post('duration'),
                'status' => $this->input->post('status')
            );
            $this->Program_fee_model->update_program_fee($id, $data);
            $this->session->set_flashdata('success', 'Program fee updated successfully.');
            redirect('manage-program-fees');
        } else {
            $data['programs'] = $this->Program_model->get_all_programs();
            $data['fee'] = $this->Program_fee_model->get_program_fee_by_id($id);
            $this->load->view('admin/header');
            $this->load->view('admin/program/edit_program_fee', $data);
            $this->load->view('admin/footer');
        }
    }

    // Delete Program Fee
    public function delete_program_fee($id) {
        $this->Program_fee_model->delete_program_fee($id);
        $this->session->set_flashdata('success', 'Program fee deleted successfully.');
        redirect('manage-program-fees');
    }
}
?>
