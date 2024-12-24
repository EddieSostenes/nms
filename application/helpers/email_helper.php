<?php
// application/helpers/email_helper.php

if (!function_exists('send_reset_email')) {
    function send_reset_email($email, $reset_link) {
        $CI =& get_instance();
        $CI->load->library('email');

        $CI->email->from('eddiesostenes7@gmail.com', 'Training Management System');
        $CI->email->to($email);
        $CI->email->subject('Password Reset');
        $CI->email->message('Click the following link to reset your password: <a href="' . $reset_link . '">Reset Password</a>');

        return $CI->email->send();
    }
}




/*In your controller, you can then call this helper function when sending the password reset email.

php

send_reset_email($email, $reset_link);*/
