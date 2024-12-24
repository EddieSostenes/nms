<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();



        // Load the necessary models here
        $this->load->model('Student_model');  // Load the Student model
        $this->load->model('Staff_model');    // Load the Staff model (if needed)
        $this->load->model('Dns_model');
        $this->load->model('Ded_model');
        $this->load->model('Nurse_model');
        $this->load->model('Supervisor_model');
        $this->load->model('Department_model'); // Any other models you might need
        
        // Load the session library
        $this->load->library('session');




    }

   // Dashboard or redirection based on user type
public function index() {
    if (!$this->session->userdata('logged_in')) { 
        // If the user is not logged in, redirect to login page
        redirect(base_url('auth/login'));
    } else {
        $usertype = $this->session->userdata('usertype'); // Get user type from session
        
        // Check user type and load respective dashboard
        if ($usertype == 1) {
            // Admin Dashboard
            $data['department'] = $this->Department_model->select_departments();
            $data['staff'] = $this->Staff_model->select_staff();
            $data['leave'] = $this->Leave_model->select_leave_forApprove();
            $data['salary'] = $this->Salary_model->sum_salary();
            
            $this->load->view('admin/header');
            $this->load->view('admin/dashboard', $data);
            $this->load->view('admin/footer');
        } elseif ($usertype == 2) {
            // Staff/Supervisor Dashboard
            $staff = $this->session->userdata('userid');
            $data['leave'] = $this->Leave_model->select_leave_byStaffID($staff);
            
            $this->load->view('staff/header');
            $this->load->view('staff/dashboard', $data);
            $this->load->view('staff/footer');
        } elseif ($usertype == 3) {
            // Student Dashboard
            $student_id = $this->session->userdata('userid');
            $data['student_info'] = $this->Student_model->get_student_info($student_id);
            $data['student_progress'] = $this->Student_model->get_student_progress($student_id);

            $this->load->view('student/header');
            $this->load->view('student/dashboard', $data);
            $this->load->view('student/footer');
        } elseif ($usertype == 4) {
            // Nurse Dashboard
            $this->load->model('Nurse_model'); // Load Nurse model if needed
            $nurse_id = $this->session->userdata('userid');
            $data['nurse_data'] = $this->Nurse_model->get_nurse_data($nurse_id);

            $this->load->view('nurse/header');
            $this->load->view('nurse/dashboard', $data);
            $this->load->view('nurse/footer');
        } elseif ($usertype == 5) {
            // DNS Dashboard
            $this->load->model('Dns_model'); // Load DNS model if needed
            $dns_id = $this->session->userdata('userid');
            $data['dns_data'] = $this->Dns_model->get_dns_data($dns_id);

            $this->load->view('dns/header');
            $this->load->view('dns/dashboard', $data);
            $this->load->view('dns/footer');
        } elseif ($usertype == 6) {
            // DED Dashboard
            $this->load->model('Ded_model'); // Load DED model if needed
            $ded_id = $this->session->userdata('userid');
            $data['ded_data'] = $this->Ded_model->get_ded_data($ded_id);

            $this->load->view('ded/header');
            $this->load->view('ded/dashboard', $data);
            $this->load->view('ded/footer');
        }elseif ($usertype == 7) {
            // Supervisor Dashboard
            $this->load->model('Supervisor_model'); // Load Supervisor model if needed
            $supervisor_id = $this->session->userdata('userid');
            $data['supervisor_data'] = $this->Supervisor_model->get_supervisor_data($supervisor_id);

            $this->load->view('supervisor/header');
            $this->load->view('supervisor/dashboard', $data);
            $this->load->view('supervisor/footer');
        } else {
            // Invalid user type
            $this->session->set_flashdata('login_error', 'Invalid user type. Please contact support.');
            redirect(base_url('auth/login'));
        }
    }
}


    // Login form page
    public function login_page() {
        $this->load->view('auth/login');
    }

    // Error page for handling custom errors
    public function error_page() {
        $this->load->view('admin/header');
        $this->load->view('admin/error_page');
        $this->load->view('admin/footer');
    }

    
    // Login functionality
    public function login()
    {
        $un = $this->input->post('txtusername'); // Username input
        $pw = $this->input->post('txtpassword'); // Password input
    
        // Load the necessary model
        $this->load->model('Home_model');
    
        // Check credentials in login_tbl
        $check_login = $this->Home_model->logindata($un, $pw);
    
        if (!empty($check_login)) { // Check if any record matches
            if ($check_login[0]['status'] == 1) {
                // Check user type
                switch ($check_login[0]['usertype']) {
                    case 1: // Admin
                        $data = array(
                            'logged_in' => TRUE,
                            'username' => $check_login[0]['username'],
                            'usertype' => $check_login[0]['usertype'],
                            'userid' => $check_login[0]['id']
                        );
                        $this->session->set_userdata($data);
                        redirect('/');
                        break;
    
                    case 2: // Staff
                        $this->load->model('Staff_model');
                        $staff_data = $this->Staff_model->get_staff_by_username($check_login[0]['username']);
                        if (!empty($staff_data)) {
                            $data = array(
                                'logged_in' => TRUE,
                                'username' => $check_login[0]['username'],
                                'usertype' => $check_login[0]['usertype'],
                                'userid' => $check_login[0]['id'],
                                'staff_name' => $staff_data['staff_name']
                                
                            );
                            $this->session->set_userdata($data);
                            redirect('/');
                        } else {
                            $this->session->set_flashdata('login_error', 'Staff not found in the system.');
                            redirect(base_url('auth/login'));
                        }
                        break;
    
                    case 3: // Student
                        $this->load->model('Student_model');
                        $student_data = $this->Student_model->get_student_by_username($check_login[0]['username']);
                        if (!empty($student_data)) {
                            $data = array(
                                'logged_in' => TRUE,
                                'username' => $check_login[0]['username'],
                                'usertype' => $check_login[0]['usertype'],
                                'userid' => $student_data['student_id'],
                                'full_name' => $student_data['full_name']
                            );
                            $this->session->set_userdata($data);
                            redirect('/student_dashboard');
                        } else {
                            $this->session->set_flashdata('login_error', 'Student not found in the system.');
                            redirect(base_url('auth/login'));
                        }
                        break;
    
                        case 4: // Nurse
                            $this->load->model('Staff_model');
                            $staff_data = $this->Staff_model->get_staff_by_username($check_login[0]['username']);
                            if (!empty($staff_data)) {
                                $data = array(
                                    'logged_in' => TRUE,
                                    'username' => $check_login[0]['username'],
                                    'usertype' => $check_login[0]['usertype'],
                                    'userid' => $check_login[0]['id'],
                                    'staff_name' => $staff_data['staff_name'],
                                    'role' => $staff_data['role'] // Include role
                                );
                                $this->session->set_userdata($data);
                                redirect('/nurse/dashboard');
                            } else {
                                $this->session->set_flashdata('login_error', 'Staff not found in the system.');
                                redirect(base_url('auth/login'));
                            }
                            break;
                        
                        case 5: // DNS
                            $this->load->model('Staff_model');
                            $staff_data = $this->Staff_model->get_staff_by_username($check_login[0]['username']);
                            if (!empty($staff_data)) {
                                $data = array(
                                    'logged_in' => TRUE,
                                    'username' => $check_login[0]['username'],
                                    'usertype' => $check_login[0]['usertype'],
                                    'userid' => $check_login[0]['id'],
                                    'staff_name' => $staff_data['staff_name'],
                                    'role' => $staff_data['role'] // Include role
                                );
                                $this->session->set_userdata($data);
                                redirect('/dns/dashboard');
                            } else {
                                $this->session->set_flashdata('login_error', 'Staff not found in the system.');
                                redirect(base_url('auth/login'));
                            }
                            break;
                        
                        case 6: // DED
                            $this->load->model('Staff_model');
                            $staff_data = $this->Staff_model->get_staff_by_username($check_login[0]['username']);
                            if (!empty($staff_data)) {
                                $data = array(
                                    'logged_in' => TRUE,
                                    'username' => $check_login[0]['username'],
                                    'usertype' => $check_login[0]['usertype'],
                                    'userid' => $check_login[0]['id'],
                                    'staff_name' => $staff_data['staff_name'],
                                    'role' => $staff_data['role'] // Include role
                                );
                                $this->session->set_userdata($data);
                                redirect('/ded/dashboard');
                            } else {
                                $this->session->set_flashdata('login_error', 'Staff not found in the system.');
                                redirect(base_url('auth/login'));
                            }
                            break;
                        
                        case 7: // Supervisor
                            $this->load->model('Staff_model');
                            $staff_data = $this->Staff_model->get_staff_by_username($check_login[0]['username']);
                            if (!empty($staff_data)) {
                                $data = array(
                                    'logged_in' => TRUE,
                                    'username' => $check_login[0]['username'],
                                    'usertype' => $check_login[0]['usertype'],
                                    'userid' => $check_login[0]['id'],
                                    'staff_name' => $staff_data['staff_name'],
                                    'role' => $staff_data['role'] // Include role
                                );
                                $this->session->set_userdata($data);
                                redirect('/supervisor/dashboard');
                            } else {
                                $this->session->set_flashdata('login_error', 'Staff not found in the system.');
                                redirect(base_url('auth/login'));
                            }
                            break;
                        
    
                    default:
                        $this->session->set_flashdata('login_error', 'Invalid user type.');
                        redirect(base_url('auth/login'));
                }
            } else {
                $this->session->set_flashdata('login_error', 'Your account is blocked. Please contact the administrator.');
                redirect(base_url('auth/login'));
            }
        } else {
            // Invalid username or password
            $this->session->set_flashdata('login_error', 'Invalid username or password.');
            redirect(base_url('auth/login'));
        }
    }
    
    



   public function some_method() {
        $student_id = $this->session->userdata('student_id');
        
        // Fetch student info
        $data['student_info'] = $this->Student_model->get_student_info($student_id);
        
        // Use the student info in your view or logic
        $this->load->view('some_view', $data);
    }
    


    // Logout function
    public function logout() {
        // Destroy session and redirect to login page
        $this->session->sess_destroy();
        redirect(base_url() . 'auth/login');
    }
}