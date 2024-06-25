<?php

/**
 * @package RegLog
 */
/*
Plugin Name: REGLOG Plugin For CarVillage
Plugin URI: https://github.com/rasolmarzban
Description: this plugin for register & login Addon Plugin For CarVillage with ajax
Version: 0.0.1
Requires at least: 0.0.1
Requires PHP: 7.4.0
Author: Rasoul Marzban
Author URI: https://github.com/rasolmarzban
License: nothing
Text Domain: reglog-ajax
*/
// Make sure we don't expose any info if called directly

define('REGLOG_DIR', plugin_dir_path(__FILE__));
define('REGLOG_URL', plugin_dir_url(__FILE__));
define('REGLOG_INC', REGLOG_DIR . 'inc/');
define('REGLOG_TMP', REGLOG_DIR . 'tmp/');

include REGLOG_INC . 'functions.php';
include REGLOG_INC . 'shortcode.php';



// register_activation_hook(__FILE__, 'reglog_ajax_activation_hook');
// register_deactivation_hook(__FILE__, 'reglog_ajax_deactivation_hook');
