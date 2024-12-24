<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity_model extends CI_Model {

    // Insert new activity into the database
    public function insert_activity($data) {
        return $this->db->insert('activities', $data);
    }

    // Get all activities for managing
    public function get_all_activities() {
        $query = $this->db->get('activities');
        return $query->result_array();
    }

    // Get specific activity by ID
    public function get_activity_by_id($activity_id) {
        $this->db->where('id', $activity_id);
        $query = $this->db->get('activities');
        return $query->row_array();
    }

    // Update activity details
    public function update_activity($activity_id, $data) {
        $this->db->where('id', $activity_id);
        return $this->db->update('activities', $data);
    }

    // Delete activity by ID
    public function delete_activity($activity_id) {
        $this->db->where('id', $activity_id);
        return $this->db->delete('activities');
    }
}
?>
