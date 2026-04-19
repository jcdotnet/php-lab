<?php
/*

Plugin Name: Buddyfence
Description: This plugin allows you to restrict not logged-in users from accessing BuddyPress pages.
Version:     1.2.2
Author:      JC
Author URI:  https://josecarlosroman.com
Text Domain: buddyfence
Domain Path: /languages
License:     GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
 
*/

if ( ! defined( 'ABSPATH' ) ) exit;

require_once plugin_dir_path(__FILE__) . 'inc/plugin.php';

function buddyfence_init() {        

    require_once plugin_dir_path(__FILE__) . 'inc/functions.php';
    
    if ( is_admin() ) {     
        require_once plugin_dir_path(__FILE__) . 'inc/admin.php';        
    }        
}
add_action( 'bp_include', 'buddyfence_init' );