<?php
/*
Plugin Name: Image Load
Plugin URI:  
Description: An example Divi extension for testing purposes
Version:     1.0.0
Author:      JC
Author URI:  
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: divi-extension-image-load
Domain Path: /languages

Image Load is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Image Load is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Image Load. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


if ( ! function_exists( 'deil_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function deil_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/DiviExtensionImageLoad.php';
}
add_action( 'divi_extensions_init', 'deil_initialize_extension' );
endif;
