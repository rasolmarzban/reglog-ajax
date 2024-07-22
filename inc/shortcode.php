<?php

function reglog_login_ajax_callback($atts, $content = null)
{
    ob_start();
    include REGLOG_TMP . "user/login.php";
    return  ob_get_clean();
}

function reglog_register_ajax_callback($atts, $content = null)
{
    ob_start();
    include REGLOG_TMP . "user/register.php";
    return ob_get_clean();
}


add_shortcode('login_reglog', 'reglog_login_ajax_callback');
add_shortcode('register_reglog', 'reglog_register_ajax_callback');
