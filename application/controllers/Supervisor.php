<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('usertype') != 7) {
            redirect(base_url('auth/login'));
        }

        $this->load->model('Supervisor_model');
        $this->load->library('session');
    }

    public function dashboard() {
        $data['supervisor_info'] = $this->Supervisor_model->get_supervisor_info($this->session->userdata('userid'));
        $data['staff_list'] = $this->Supervisor_model->get_all_staff();

        $this->load->view('supervisor/header');
        $this->load->view('supervisor/dashboard', $data);
        $this->load->view('supervisor/footer');
    }
}
