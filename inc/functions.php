<?php

function wp_reglog_assets()
{

    wp_register_style('wp_reglog_style', REGLOG_URL . 'assets/css/reglog.css', '', '1.0', true);
    wp_enqueue_style('wp_reglog_style');

    wp_register_script('wp_reglog_script', REGLOG_URL . 'assets/js/reglog.js', ['jquery'], '1.0', true);
    wp_enqueue_script('wp_reglog_script');
}

add_action('wp_enqueue_scripts', 'wp_reglog_assets');
