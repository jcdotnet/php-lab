<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function buddyfence_register_options() {
    register_setting('buddyfence_plugin_options', 'buddyfence_components_options', 'buddyfence_sanitize_components');
}
add_action( 'admin_init', 'buddyfence_register_options' ); 

function buddyfence_load_plugin_textdomain() {
    load_plugin_textdomain( 'buddyfence', false, 'buddyfence/languages/' );
}
add_action( 'plugins_loaded', 'buddyfence_load_plugin_textdomain' );