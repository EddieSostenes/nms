<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TrainingController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Training_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    // Manage Trainings
    public function manage_training() {
        $data['trainings'] = $this->Training_model->get_all_trainings();

        $this->load->view('admin/header');
        $this->load->view('admin/training/manage_training', $data);
        $this->load->view('admin/footer');
    }

    // Add Training
    public function add_training() {
        if ($this->input->post()) {
            $training_data = array(
                'training_name' => $this->input->post('training_name'),
                'training_category' => $this->input->post('training_category'),
                'training_level' => $this->input->post('training_level'),
                'description' => $this->input->post('description'),
                'duration' => $this->input->post('duration'),
                'status' => 'active',
                'added_on' => date('Y-m-d H:i:s')
            );
            $this->Training_model->add_training($training_data);
            $this->session->set_flashdata('success', 'Training added successfully.');
            redirect('training/manage_training');
        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/training/add_training');
            $this->load->view('admin/footer');
        }
    }

    // Edit Training
    public function edit_training($id) {
        $data['training'] = $this->Training_model->get_training_by_id($id);

        if ($this->input->post()) {
            $update_data = array(
                'training_name' => $this->input->post('training_name'),
                'training_category' => $this->input->post('training_category'),
                'training_level' => $this->input->post('training_level'),
                'description' => $this->input->post('description'),
                'duration' => $this->input->post('duration'),
                'status' => $this->input->post('status')
            );
            $this->Training_model->update_training($id, $update_data);
            $this->session->set_flashdata('success', 'Training updated successfully.');
            redirect('training/manage_training');
        }

        $this->load->view('admin/header');
        $this->load->view('admin/training/edit_training', $data);
        $this->load->view('admin/footer');
    }

    // Delete Training
    public function delete_training($id) {
        $this->Training_model->delete_training($id);
        $this->session->set_flashdata('success', 'Training deleted successfully.');
        redirect('training/manage_training');
    }






}
