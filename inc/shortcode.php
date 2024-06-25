<?php

function reglog_login_ajax_callback($atts, $content = null)
{

    include REGLOG_TMP . "user/login.php";
}

function reglog_register_ajax_callback($atts, $content = null)
{

    include REGLOG_TMP . "user/register.php";
}


add_shortcode('login_reglog', 'reglog_login_ajax_callback');
add_shortcode('register_reglog', 'reglog_register_ajax_callback');
