<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dns extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('usertype') != 5) {
            redirect(base_url('auth/login'));
        }

        $this->load->model('Dns_model');
        $this->load->library('session');
    }

    public function dashboard() {
        $data['dns_info'] = $this->Dns_model->get_dns_info($this->session->userdata('userid'));
        $data['staff_list'] = $this->Dns_model->get_all_staff();

        $this->load->view('dns/header');
        $this->load->view('dns/dashboard', $data);
        $this->load->view('dns/footer');
    }
}
