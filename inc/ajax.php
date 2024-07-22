<?php

function wp_login_reglog_handler()
{
    $user_email = sanitize_text_field($_POST['user_email']);
    $user_password = sanitize_text_field($_POST['user_password']);

    var_dump($user_email, $user_password);
}

add_action('wp_ajax_nopriv_login_reglog', 'wp_login_reglog_handler');
