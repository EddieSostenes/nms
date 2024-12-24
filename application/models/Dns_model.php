<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dns_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_dns_info($dns_id) {
        $this->db->where('id', $dns_id);
        return $this->db->get('staff_tbl')->row_array();
    }

    public function get_all_staff() {
        $this->db->select('id, staff_name, email, mobile, ward, role');
        $this->db->where('role', 'Staff');
        return $this->db->get('staff_tbl')->result_array();
    }
}
