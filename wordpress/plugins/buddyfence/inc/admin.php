<?php

if ( ! defined( 'ABSPATH' ) ) exit;

require_once plugin_dir_path(__FILE__) . 'admin-page.php';

function buddyfence_add_menu() {
    add_options_page( 'Buddyfence', 'Buddyfence', 'manage_options', 'buddyfence', 'buddyfence_admin_page');
}
add_action( 'admin_menu', 'buddyfence_add_menu' );