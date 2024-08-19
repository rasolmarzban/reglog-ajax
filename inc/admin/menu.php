<?php

function reglog_menu()
{

    add_menu_page(
        'RegLog',
        'RegLog',
        'manage_options',
        'menu_options',
        'reglog_menu_callback',
        'dashicons-editor-code'
    );
}

add_action('admin_menu', 'reglog_menu');

function reglog_menu_callback()
{
    $wp_reglog_options = get_option('wp_reglog_options', []);
    if (isset($_POST['saveData'])) {



        $wp_reglog_options['login-active'] = isset($_POST['login-active']);
        $wp_reglog_options['register-active'] = isset($_POST['register-active']);
        $wp_reglog_options['login-title'] = sanitize_text_field($_POST['login-title']);
        $wp_reglog_options['register-title'] = sanitize_text_field($_POST['register-title']);
        $wp_reglog_options['form-bg-color'] = sanitize_text_field($_POST['form-bg-color']);
        $wp_reglog_options['form-bg-opacity'] = sanitize_text_field($_POST['form-bg-opacity']);
        list($r, $g, $b) = sscanf($wp_reglog_options['form-bg-color'], "#%02x%02x%02x");
        var_dump($r, $g, $b);
        update_option('wp_reglog_options', $wp_reglog_options);
    }
    include REGLOG_TMP . 'admin/admin.php';
}
