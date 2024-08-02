<?php

function wp_login_reglog_handler()
{
    $user_email = sanitize_text_field($_POST['user_email']);
    $user_password = sanitize_text_field($_POST['user_password']);
    $email_pass_validation = wp_reglog_validation_email_pass($user_email, $user_password);

    if (!$email_pass_validation['is_valid']) {
        wp_send_json([
            'success' => false,
            'message' => $email_pass_validation['message']
        ], 403);
    }

    $user = wp_authenticate_email_password(null, $user_email, $user_password);
    if (is_wp_error($user)) {
        wp_send_json([
            'success' => false,
            'message' => "There is no user with that email address!"
        ], 403);
    }
    $login_result = wp_signon(
        [
            'user_login' => $user->user_login,
            'user_password' => $user_password,
            'remember' => false,
        ]
    );
    if (is_wp_error($login_result)) {
        wp_send_json([
            'success' => false,
            'message' => "There is a problem! Please try again later."
        ], 403);
    }
    wp_send_json([
        'success' => true,
        'message' => "Your Logged in successfully"
    ], 200);
}
function wp_reglog_validation_email_pass($user_email, $user_password)
{
    $result = [
        'is_valid' => true,
        'message' => ""
    ];
    if (is_null($user_email) || empty($user_email)) {
        $result['is_valid'] = false;
        $result['message'] = "Please enter your email";
        return $result;
    }
    if (is_null($user_password) || empty($user_password)) {
        $result['is_valid'] = false;
        $result['message'] = "Please enter your password";
        return $result;
    }
    if (!is_email($user_email)) {
        $result['is_valid'] = false;
        $result['message'] = "Please enter your email";
        return $result;
    }
    return $result;
}

//register action handler

function wp_register_reglog_handler()
{
    $first_username = sanitize_text_field($_POST['firstname']);
    $last_username = sanitize_text_field($_POST['lastname']);
    $useremail = sanitize_text_field($_POST['useremail']);
    $userpassword = sanitize_text_field($_POST['userpassword']);

    //var_dump($first_username, $last_username, $useremail, $userpassword);

    $validation_register_result = reglog_register_validation($first_username, $last_username, $useremail, $userpassword);

    //check validation
    if (!$validation_register_result['is_valid']) {
        wp_send_json([
            'success' => false,
            'message' => $validation_register_result['message']
        ], 422);
    }
    // if (!$validation_register_result['is_valid']) {

    //     wp_send_json([
    //         'success' => false,
    //         'message' => $validation_register_result['message']
    //     ], 422);
    // }
    wp_send_json([
        'success' => true,
        'message' => "Your Registered in successfully"
    ], 200);

    //registeration 

    // $newUser = wp_insert_user([
    //     'user_login' => apply_filters('pre_user_login', ""),
    //     'user_pass' => apply_filters('pre_user_password', $userpassword),
    //     'user_email' => apply_filters('pre_user_email', $useremail)
    // ]);
}

function reglog_register_validation($firstname, $lastname, $email, $password)
{
    $result = [
        'is_valid' => true,
        'message' => ""
    ];
    if (empty($firstname) || empty($lastname) || empty($email) || empty($password)) {
        $result['is_valid'] = false;
        $result['message'] = "Please check all required fields";
        return $result;
    }
    if (!is_email($email)) {
        $result['is_valid'] = false;
        $result['message'] = "email address must be a valid email";
        return $result;
    }
    if (email_exists($email)) {
        $result['is_valid'] = false;
        $result['message'] = "The email address already exists";
        return $result;
    }
    // if (strlen($firstname) < 3 || strlen($firstname) > 30 || strlen($lastname) < 3 || strlen($lastname) > 30) {
    //     $result['is_valid'] = false;
    //     $result['message'] = "Both firstname and lastname must be at least 4 characters long and not exceed 30 characters.";
    //     return $result;
    // }
    // if (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[^A-Za-z0-9]/', $password) || strlen($password) < 8) {
    //     $result['is_valid'] = false;
    //     $result['message'] = "Please enter a valid password\npassword must be at least 8 charecters";
    //     return $result;
    // }

    return $result;
}

//two action for login and register handler functions
add_action('wp_ajax_nopriv_register_reglog', 'wp_register_reglog_handler');
add_action('wp_ajax_nopriv_login_reglog', 'wp_login_reglog_handler');
