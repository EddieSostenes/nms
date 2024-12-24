<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) { 
            redirect(base_url() . 'login');
        }
        $this->load->model('Department_model');
        $this->load->model('Home_model');
        $this->load->model('Staff_model');
    }

    public function index()
    {
        $data['department'] = $this->Department_model->select_departments();
        $data['country'] = $this->Home_model->select_countries();
        $this->load->view('admin/header');
        $this->load->view('admin/add-staff', $data);
        $this->load->view('admin/footer');
    }

    public function manage()
    {
        $data['content'] = $this->Staff_model->select_staff();
        $this->load->view('admin/header');
        $this->load->view('admin/manage-staff', $data);
        $this->load->view('admin/footer');
    }

    public function insert()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txtname', 'Full Name', 'required');
        $this->form_validation->set_rules('slcgender', 'Gender', 'required');
        $this->form_validation->set_rules('slcdepartment', 'Department', 'required');
        $this->form_validation->set_rules('slcrole', 'Role', 'required');
        $this->form_validation->set_rules('txtemail', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('txtmobile', 'Mobile Number', 'required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('txtdob', 'Date of Birth', 'required');
        $this->form_validation->set_rules('txtdoj', 'Date of Joining', 'required');
        $this->form_validation->set_rules('txtcity', 'City', 'required');
        $this->form_validation->set_rules('txtstate', 'State', 'required');
        $this->form_validation->set_rules('slccountry', 'Country', 'required');

        $role = $this->input->post('slcrole');
        $usertype = $this->map_usertype($role);

        if ($this->form_validation->run()) {
            $staff_data = $this->collect_staff_data($usertype);

            $login_data = [
                'username' => $staff_data['email'],
                'password' => $staff_data['mobile'],
                'usertype' => $usertype,
                'status' => 1
            ];
            $login_id = $this->Home_model->insert_login($login_data);

            if ($login_id) {
                $staff_data['id'] = $login_id;
                $result = $this->Staff_model->insert_staff($staff_data);
                if ($result) {
                    $this->session->set_flashdata('success', "New $role Added Successfully");
                } else {
                    $this->session->set_flashdata('error', "Failed to add $role.");
                }
            } else {
                $this->session->set_flashdata('error', "Login insertion failed.");
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
        }
        redirect('add-staff');
    }

    private function map_usertype($role)
    {
        switch ($role) {
            case 'Staff': return 2;
            case 'Nurse': return 4;
            case 'DNS': return 5;
            case 'DED': return 6;
            case 'SUPERVISOR': return 7;
            default: return 0;
        }
    }

    private function collect_staff_data($usertype)
    {
        $this->load->library('upload');
        $image = $this->upload_image();

        return [
            'staff_name' => $this->input->post('txtname'),
            'gender' => $this->input->post('slcgender'),
            'email' => $this->input->post('txtemail'),
            'mobile' => $this->input->post('txtmobile'),
            'dob' => $this->input->post('txtdob'),
            'doj' => $this->input->post('txtdoj'),
            'address' => $this->input->post('txtaddress'),
            'city' => $this->input->post('txtcity'),
            'state' => $this->input->post('txtstate'),
            'country' => $this->input->post('slccountry'),
            'department_id' => $this->input->post('slcdepartment'),
            'ward' => $this->input->post('slcward'),
            'role' => $this->input->post('slcrole'),
            'pic' => $image,
            'added_by' => $this->session->userdata('userid')
        ];
    }

    private function upload_image()
    {
        $config['upload_path'] = 'uploads/profile-pic/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['file_name'] = time();
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('filephoto')) {
            return 'default-pic.jpg';
        } else {
            $data = $this->upload->data();
            return $data['file_name'];
        }
    }

    public function update()
    {
        $id = $this->input->post('txtid');
        $staff_data = $this->collect_staff_data($this->map_usertype($this->input->post('slcrole')));

        if ($this->Staff_model->update_staff($staff_data, $id)) {
            $this->session->set_flashdata('success', "Staff Updated Successfully");
        } else {
            $this->session->set_flashdata('error', "Failed to Update Staff");
        }
        redirect('manage-staff');
    }

    function edit($id)
    {
        $data['department'] = $this->Department_model->select_departments();
        $data['country'] = $this->Home_model->select_countries();
        $data['content'] = $this->Staff_model->select_staff_byID($id);
        $this->load->view('admin/header');
        $this->load->view('admin/edit-staff', $data);
        $this->load->view('admin/footer');
    }

    function delete($id)
    {
        $this->Home_model->delete_login_byID($id);
        $this->Staff_model->delete_staff($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Staff Deleted Successfully");
        } else {
            $this->session->set_flashdata('error', "Failed to Delete Staff");
        }
        redirect('manage-staff');
    }
}
