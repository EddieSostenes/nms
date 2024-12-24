<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CurrencyController extends CI_Controller {

    private $api_url = 'https://v6.exchangerate-api.com/v6/3ad93db543820d0e461f1519/latest/TZS';  // Replace with your API URL and key

    public function __construct() {
        parent::__construct();
        $this->load->model('Currency_model');
        $this->load->helper('url');
    }

    // Add Currency
    public function add_currency() {
        if ($this->input->post()) {

            // Handle file upload for currency flag
            $config['upload_path'] = './uploads/flags/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // 2MB max size
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('flag')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('add-currency');
            } else {
                $flag_data = $this->upload->data();
                $flag_filename = $flag_data['file_name'];
            }

            // Get the currency symbol from the form
            $currency_symbol = $this->input->post('currency_symbol');

            // Fetch the exchange rate using the API
            $exchange_rate = $this->get_exchange_rate($currency_symbol);

            if (!$exchange_rate) {
                $this->session->set_flashdata('error', 'Could not fetch exchange rate. Please try again.');
                redirect('add-currency');
            }

            // Prepare data for database insertion
            $data = array(
                'currency_name' => $this->input->post('currency_name'),
                'currency_symbol' => $currency_symbol,
                'exchange_rate' => $exchange_rate,
                'flag' => $flag_filename,
                'status' => 'active'
            );

            $this->Currency_model->add_currency($data);
            $this->session->set_flashdata('success', 'Currency added successfully.');
            redirect('manage-currency');
        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/currency/add_currency');
            $this->load->view('admin/footer');
        }
    }

    // Get exchange rate from API
    private function get_exchange_rate($currency_symbol) {
        $response = file_get_contents($this->api_url);  // Replace with your API call logic
        $response = json_decode($response, true);

        if ($response && isset($response['conversion_rates'][$currency_symbol])) {
            return $response['conversion_rates'][$currency_symbol];
        } else {
            return false;
        }
    }

    // Manage Currencies
    public function manage_currency() {
        $data['currencies'] = $this->Currency_model->get_all_currencies();
        $this->load->view('admin/header');
        $this->load->view('admin/currency/manage_currency', $data);
        $this->load->view('admin/footer');
    }

    // Edit Currency
    public function edit_currency($id) {
        if ($this->input->post()) {
            $data = array(
                'currency_name' => $this->input->post('currency_name'),
                'currency_symbol' => $this->input->post('currency_symbol'),
                'exchange_rate' => $this->input->post('exchange_rate'),
                'status' => $this->input->post('status')
            );

            if (!empty($_FILES['flag']['name'])) {
                // Handle file upload for flag
                $config['upload_path'] = './uploads/flags/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2048; // 2MB max size
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('flag')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('edit-currency/' . $id);
                } else {
                    $flag_data = $this->upload->data();
                    $data['flag'] = $flag_data['file_name'];
                }
            }

            $this->Currency_model->update_currency($id, $data);
            $this->session->set_flashdata('success', 'Currency updated successfully.');
            redirect('manage-currency');
        } else {
            $data['currency'] = $this->Currency_model->get_currency_by_id($id);
            $this->load->view('admin/header');
            $this->load->view('admin/currency/edit_currency', $data);
            $this->load->view('admin/footer');
        }
    }




    public function get_exchange_rate_ajax() {
        $currency_symbol = $this->input->post('currency_symbol');
        $exchange_rate = $this->get_exchange_rate($currency_symbol);
    
        if ($exchange_rate) {
            echo json_encode(['exchange_rate' => $exchange_rate]);
        } else {
            echo json_encode(['exchange_rate' => '']);
        }
    }
    




}
