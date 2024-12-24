<?php
class UserModel extends CI_Model {

    public function get_user_by_username($username) {
        return $this->db->get_where('users', ['username' => $username])->row();
    }

    public function get_user_by_email($email) {
        return $this->db->get_where('users', ['email' => $email])->row();
    }

    public function insert_user($data) {
        $this->db->insert('users', $data);
        return $this->db->insert_id(); // Return the newly created user ID
    }

    public function set_password_reset_token($user_id, $token) {
        $this->db->update('users', ['reset_token' => $token, 'token_created_at' => date('Y-m-d H:i:s')], ['user_id' => $user_id]);
    }

    public function get_user_by_reset_token($token) {
        // Token validity (e.g., 1-hour expiration)
        $this->db->where('reset_token', $token);
        $this->db->where('TIMESTAMPDIFF(HOUR, token_created_at, NOW()) <=', 1);
        return $this->db->get('users')->row();
    }

    public function update_password($user_id, $new_password) {
        $this->db->update('users', ['password' => $new_password], ['user_id' => $user_id]);
    }

    public function clear_password_reset_token($user_id) {
        $this->db->update('users', ['reset_token' => NULL, 'token_created_at' => NULL], ['user_id' => $user_id]);
    }
}
