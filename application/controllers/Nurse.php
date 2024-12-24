<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nurse extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('usertype') != 4) {
            redirect(base_url('auth/login'));
        }

        $this->load->model('Nurse_model');
        $this->load->model('PatientProgressModel');
        $this->load->library('session');
    }

    public function dashboard() {
        $data['nurse_info'] = $this->Nurse_model->get_nurse_info($this->session->userdata('userid'));
        $data['ward_assignments'] = $this->Nurse_model->get_ward_assignments($this->session->userdata('userid'));

        $this->load->view('nurse/header');
        $this->load->view('nurse/dashboard', $data);
        $this->load->view('nurse/footer');
    }
}
