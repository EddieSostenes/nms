<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = 'home/error_page';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'home/login_page';
$route['logout'] = 'home/logout';

// department routes
$route['add-department'] = 'department';
$route['insert-department'] = 'department/insert';
$route['manage-department'] = 'department/manage_department';
$route['edit-department/(:num)'] = 'department/edit/$1';
$route['update-department'] = 'department/update';
$route['delete-department/(:num)'] = 'department/delete/$1';

//staff routes
$route['add-staff'] = 'staff';
$route['manage-staff'] = 'staff/manage';
$route['insert-staff'] = 'staff/insert';
$route['delete-staff/(:num)'] = 'staff/delete/$1';
$route['edit-staff/(:num)'] = 'staff/edit/$1';
$route['update-staff'] = 'staff/update';

//salary routes
$route['add-salary'] = 'salary';
$route['manage-salary'] = 'salary/manage';
$route['view-salary'] = 'salary/view';
$route['salary-invoice/(:num)'] = 'salary/invoice/$1';
$route['print-invoice/(:num)'] = 'salary/invoice_print/$1';
$route['delete-salary/(:num)'] = 'salary/delete/$1';

$route['apply-leave'] = 'leave';
$route['approve-leave'] = 'leave/approve';
$route['leave-history'] = 'leave/manage';
$route['leave-approved/(:num)'] = 'leave/insert_approve/$1';
$route['leave-rejected/(:num)'] = 'leave/insert_reject/$1';
$route['view-leave'] = 'leave/view';


$route['register'] = 'authcontroller/register';

$route['auth/register'] = 'auth/register';
$route['auth/register_student'] = 'auth/register_student';

// Application-related routes
$route['registration'] = 'applications/registration';

$route['applications/new'] = 'applications/new_applications';
$route['applications/accepted'] = 'applications/accepted_applications';
$route['applications/rejected'] = 'applications/rejected_applications';
$route['applications/approved'] = 'applications/approved_applications';

$route['applications/accept/(:num)'] = 'applications/accept_application/$1';
$route['applications/reject/(:num)'] = 'applications/reject_application/$1';
$route['applications/delete/(:num)'] = 'applications/delete_application/$1';

$route['applications/add_control_number/(:num)'] = 'applications/add_control_number/$1';
$route['applications/view_receipt/(:num)'] = 'applications/view_receipt/$1';
$route['applications/approve/(:num)'] = 'applications/approve_payment/$1';
$route['applications/reject/(:num)'] = 'applications/reject_payment/$1';

$route['applications/view/(:num)'] = 'applications/view_application/$1';

$route['applications/accept/(:num)'] = 'applications/accept_application/$1';
$route['applications/reject/(:num)'] = 'applications/reject_application/$1';
$route['applications/approve/(:num)'] = 'applications/approve_application/$1';
$route['applications/accept_payment/(:num)'] = 'applications/accept_payment/$1';
$route['applications/reject_payment/(:num)'] = 'applications/reject_payment/$1';
$route['applications/new_applications'] = 'applications/new_applications';
$route['applications/accepted_applications'] = 'applications/accepted_applications';
$route['applications/rejected_applications'] = 'applications/rejected_applications';
$route['applications/approved_applications'] = 'applications/approved_applications';


// Route to view accepted applications
$route['applications/accepted_applications'] = 'applications/accepted_applications';

// Route for adding control number (loads the modal)
$route['applications/add_control_number'] = 'applications/add_control_number';

// Route for adding receipt (loads the modal)
$route['applications/add_receipt'] = 'applications/add_receipt';

// Approve application route
$route['applications/approve/(:num)'] = 'applications/approve/$1';

// Reject application route
$route['applications/reject/(:num)'] = 'applications/reject/$1';

// Route to handle control number submission
$route['applications/submit_control_number'] = 'applications/submit_control_number';

// Route to handle receipt submission
$route['applications/submit_receipt'] = 'applications/submit_receipt';


$route['applications/add_receipt'] = 'applications/add_receipt';


$route['email_test'] = 'email_test';
$route['email_test/send'] = 'email_test/send';

$route['auth/forgot_password'] = 'auth/forgot_password';  // Forgot password form
$route['auth/reset_password/(:any)'] = 'auth/reset_password/$1';  // Password reset page with token
$route['auth/register'] = 'auth/register';  // Registration page
$route['auth/login'] = 'auth/login';  // Login page

// Route in config/routes.php
$route['student_dashboard'] = 'student/dashboard';



$route['admin/assign-supervisor'] = 'Admin_student_management/assign_supervisor';
$route['admin/save-allocation'] = 'Admin_student_management/save_allocation';
$route['admin/manage-assigned-students'] = 'Admin_student_management/manage_assigned_students';

$route['staff/view-allocated-students'] = 'Staff_student_management/view_allocated_students';


$route['allocation/assign'] = 'allocation/assign_student';
$route['allocation/view_assignments'] = 'allocation/view_assignments';
$route['staff/view_my_students'] = 'allocation/view_my_students';


$route['allocation/edit/(:num)'] = 'allocation/edit/$1';  // For editing an allocation
$route['allocation/delete/(:num)'] = 'allocation/delete/$1';  // For deleting an allocation

$route['allocated_supervisor'] = 'supervisor/allocated_supervisor';


$route['add-student-type'] = 'student_type/add_student_type';
$route['insert-student-type'] = 'student_type/insert_student_type';
$route['manage-student-type'] = 'student_type/manage_student_type';
$route['edit-student-type/(:num)'] = 'student_type/edit_student_type/$1';
$route['update-student-type/(:num)'] = 'student_type/update_student_type/$1';
$route['delete-student-type/(:num)'] = 'student_type/delete_student_type/$1';


$route['courses/add_course'] = 'CourseController/add_course';  // Add course route
$route['courses/manage_courses'] = 'CourseController/manage_courses';  // Manage courses route
$route['courses/edit_course/(:num)'] = 'CourseController/edit_course/$1';  // Edit course route
$route['courses/delete_course/(:num)'] = 'CourseController/delete_course/$1';  // Delete course route


$route['training/manage_training'] = 'TrainingController/manage_training';
$route['training/add_training'] = 'TrainingController/add_training';
$route['training/edit_training/(:num)'] = 'TrainingController/edit_training/$1';
$route['training/delete_training/(:num)'] = 'TrainingController/delete_training/$1';
$route['training/update_training/(:num)'] = 'TrainingController/update_training/$1';


// Program Routes
$route['add-program'] = 'ProgramController/add_program';
$route['manage-programs'] = 'ProgramController/manage_programs';
$route['edit-program/(:num)'] = 'ProgramController/edit_program/$1';
$route['delete-program/(:num)'] = 'ProgramController/delete_program/$1';

// Program Fee Routes
$route['add-program-fee'] = 'ProgramController/add_program_fee';
$route['manage-program-fees'] = 'ProgramController/manage_program_fees';
$route['edit-program-fee/(:num)'] = 'ProgramController/edit_program_fee/$1';
$route['delete-program-fee/(:num)'] = 'ProgramController/delete_program_fee/$1';


$route['add-currency'] = 'CurrencyController/add_currency';
$route['manage-currency'] = 'CurrencyController/manage_currency';
$route['edit-currency/(:num)'] = 'CurrencyController/edit_currency/$1';
$route['delete-currency/(:num)'] = 'CurrencyController/delete_currency/$1';
$route['currency/get_exchange_rate_ajax'] = 'CurrencyController/get_exchange_rate_ajax';


$route['add_category'] = 'FeeCategoryController/add_category';
$route['manage-fee-categories'] = 'FeeCategoryController/manage_categories';
$route['edit-category/(:num)'] = 'FeeCategoryController/edit_category/$1';
$route['delete-category/(:num)'] = 'FeeCategoryController/delete_category/$1';


$route['add-enrollment'] = 'EnrollmentController/add_enrollment';
$route['manage-enrollments'] = 'EnrollmentController/manage_enrollments';
$route['edit-enrollment/(:num)'] = 'EnrollmentController/edit_enrollment/$1';
$route['delete-enrollment/(:num)'] = 'EnrollmentController/delete_enrollment/$1';


$route['helpdesk/request'] = 'HelpDeskController/request_help';   // Student submits help request
$route['helpdesk/status'] = 'HelpDeskController/view_help_status'; // Student views request status

$route['admin/helpdesk'] = 'HelpDeskController/admin_approve';  // Admin approves or rejects
$route['admin/helpdesk/history'] = 'HelpDeskController/helpdesk_history';  // Admin views history
$route['admin/helpdesk/action/(:num)'] = 'HelpDeskController/admin_action/$1';  // Admin takes action on ticket


$route['activity/add'] = 'ActivityController/add_activity';
$route['activity/save'] = 'ActivityController/save_activity';
$route['activity/manage_activities'] = 'ActivityController/manage_activities';
$route['activity/edit/(:num)'] = 'ActivityController/edit_activity/$1';
$route['activity/update/(:num)'] = 'ActivityController/update_activity/$1';
$route['activity/delete/(:num)'] = 'ActivityController/delete_activity/$1';

$route['dns/dashboard'] = 'Dns/dashboard';
$route['ded/dashboard'] = 'Ded/dashboard';
$route['nurse/dashboard'] = 'Nurse/dashboard';

// Nurse Routes
$route['nurse/patient_progress/add'] = 'PatientProgressController/add';
$route['nurse/patient_progress/manage'] = 'PatientProgressController/manage';
$route['nurse/patient_progress/history'] = 'PatientProgressController/history';
$route['nurse/patient_progress/edit/(:num)'] = 'PatientProgressController/edit/$1';
$route['nurse/patient_progress/view/(:num)'] = 'PatientProgressController/view/$1';

// Supervisor Routes
$route['supervisor/patient_progress/manage'] = 'PatientProgressController/manage';
$route['supervisor/patient_progress/history'] = 'PatientProgressController/history';
$route['supervisor/patient_progress/approve/(:num)'] = 'PatientProgressController/approve/$1';
$route['supervisor/patient_progress/return/(:num)'] = 'PatientProgressController/return/$1';
$route['supervisor/patient_progress/view/(:num)'] = 'PatientProgressController/view/$1';
$route['supervisor/patient_progress/manage'] = 'PatientProgressController/manage_supervisor';


// DNS Routes
$route['dns/patient_progress/manage'] = 'PatientProgressController/manage';
$route['dns/patient_progress/history'] = 'PatientProgressController/history';
$route['dns/patient_progress/verify/(:num)'] = 'PatientProgressController/verify/$1';
$route['dns/patient_progress/return/(:num)'] = 'PatientProgressController/return/$1';
$route['dns/patient_progress/view/(:num)'] = 'PatientProgressController/view/$1';

// General Routes for Viewing and Editing
$route['PatientProgressController/view/(:num)'] = 'PatientProgressController/view/$1';
$route['PatientProgressController/edit/(:num)'] = 'PatientProgressController/edit/$1';
$route['PatientProgressController/send_to_supervisor/(:num)'] = 'PatientProgressController/send_to_supervisor/$1';


// Nurse-specific routes
$route['nurse/patient_progress/view/(:num)'] = 'PatientProgressController/view_nurse/$1';

// Supervisor-specific routes
$route['supervisor/patient_progress/view/(:num)'] = 'PatientProgressController/view_supervisor/$1';

// DNS-specific routes
$route['dns/patient_progress/view/(:num)'] = 'PatientProgressController/view_dns/$1';
