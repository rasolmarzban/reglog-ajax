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

add_action('wp_ajax_nopriv_login_reglog', 'wp_login_reglog_handler');

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
