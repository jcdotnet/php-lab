<?php
/**
 * Plugin Name:       Simple Share Buttons
 * Description:       Easily create beautiful and good-looking social share buttons from the WordPress block editor.
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Version:           1.0.0
 * Author:            JC
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       jc-share-buttons
 */

function jc_blocks_share_buttons_block_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'jc_blocks_share_buttons_block_init' );