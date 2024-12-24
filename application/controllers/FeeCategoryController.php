<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FeeCategoryController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('FeeCategory_model');
    }

   // Add Fee Category
   public function add_category() {
    if ($this->input->post()) {
        $data = array(
            'category_name' => $this->input->post('category'),
            'description' => $this->input->post('description'),
            'status' => 'active' // Default to active when adding a fee category
        );

        $this->FeeCategory_model->add_category($data);
        $this->session->set_flashdata('success', 'Fee Category added successfully.');
        redirect('manage-fee-categories');
    } else {
        $this->load->view('admin/header');
        $this->load->view('admin/fee_category/add_category');
        $this->load->view('admin/footer');
    }
}

    // Manage Fee Categories
    public function manage_categories() {
        $data['categories'] = $this->FeeCategory_model->get_all_categories();
        $this->load->view('admin/header');
        $this->load->view('admin/fee_category/manage_category', $data);
        $this->load->view('admin/footer');
    }

    // Edit Fee Category
    public function edit_category($id) {
        if ($this->input->post()) {
            $data = array(
                'category_name' => $this->input->post('category_name'),
                'description' => $this->input->post('description'),
                'status' => $this->input->post('status')
            );
            $this->FeeCategory_model->update_category($id, $data);
            $this->session->set_flashdata('success', 'Category updated successfully.');
            redirect('manage-fee-categories');
        } else {
            $data['category'] = $this->FeeCategory_model->get_category_by_id($id);
            $this->load->view('admin/header');
            $this->load->view('admin/fee_category/edit_category', $data);
            $this->load->view('admin/footer');
        }
    }

    // Delete Fee Category
    public function delete_category($id) {
        $this->FeeCategory_model->delete_category($id);
        $this->session->set_flashdata('success', 'Category deleted successfully.');
        redirect('manage-fee-categories');
    }
}
