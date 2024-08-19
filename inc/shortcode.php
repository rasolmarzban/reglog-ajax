<?php

function reglog_login_ajax_callback($atts, $content = null)
{
    $wp_reglog_options = get_option('wp_reglog_options', []);

    if (isset($wp_reglog_options['login-active']) && !$wp_reglog_options['login-active']) {
        return '<h2> You Cant logged-in at this moments! </h2>';
    }

    ob_start();
    include REGLOG_TMP . "user/login.php";
    return  ob_get_clean();
}

function reglog_register_ajax_callback($atts, $content = null)
{
    $wp_reglog_options = get_option('wp_reglog_options', []);

    if (isset($wp_reglog_options['register-active']) && !$wp_reglog_options['register-active']) {
        return '<h2> You Cant register at this moments! </h2>';
    }

    ob_start();
    include REGLOG_TMP . "user/register.php";
    return ob_get_clean();
}


add_shortcode('login_reglog', 'reglog_login_ajax_callback');
add_shortcode('register_reglog', 'reglog_register_ajax_callback');
