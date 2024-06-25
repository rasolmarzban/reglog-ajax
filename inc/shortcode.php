<?php

function reglog_login_ajax_callback($atts, $content = null)
{

    return '<div>
        <button class="button" type="button">LOGIN</button>
    </div>';
    //include PLUGIN_TMP . 'user/login.php';
}

function reglog_register_ajax_callback($atts, $content = null)
{

    return '<h1>Register</h1>';
    //include PLUGIN_TMP . 'user/register.php';
}


add_shortcode('login_reglog_ajax', 'reglog_login_ajax_callback');
add_shortcode('register_reglog_ajax', 'reglog_register_ajax_callback');
