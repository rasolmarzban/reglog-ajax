<?php

function wp_reglog_assets()
{

    wp_register_style('wp_reglog_style', REGLOG_URL . 'assets/css/reglog.css', false);
    wp_enqueue_style('wp_reglog_style');

    wp_register_script('wp_reglog_script', REGLOG_URL . 'assets/js/reglog.js', ['jquery'], true);
    wp_enqueue_script('wp_reglog_script');

    wp_localize_script('wp_reglog_script', 'my_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'wp_reglog_assets');
