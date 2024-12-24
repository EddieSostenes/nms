<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ded_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_ded_info($ded_id) {
        $this->db->where('id', $ded_id);
        return $this->db->get('staff_tbl')->row_array();
    }

    public function get_pending_reports() {
        $this->db->select('*');
        $this->db->from('reports_tbl');
        $this->db->where('status', 'Pending');
        return $this->db->get()->result_array();
    }
}
