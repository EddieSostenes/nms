<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ded extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('usertype') != 6) {
            redirect(base_url('auth/login'));
        }

        $this->load->model('Ded_model');
        $this->load->library('session');
    }

    public function dashboard() {
        $data['ded_info'] = $this->Ded_model->get_ded_info($this->session->userdata('userid'));
        $data['reports'] = $this->Ded_model->get_pending_reports();

        $this->load->view('ded/header');
        $this->load->view('ded/dashboard', $data);
        $this->load->view('ded/footer');
    }
}
