<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nurse_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_nurse_info($nurse_id) {
        $this->db->where('id', $nurse_id);
        return $this->db->get('staff_tbl')->row_array();
    }

    public function get_ward_assignments($nurse_id) {
        $this->db->select('ward, role, added_on');
        $this->db->from('staff_tbl');
        $this->db->where('id', $nurse_id);
        return $this->db->get()->result_array();
    }
}
