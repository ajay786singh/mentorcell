<?php
/**
 * This file has all the main shortcode functions
 *
 * @package HT Shortcodes Plugin
 * @author http://highthemes.com
 *
 */


function ht_shortcodes_add_mce_button() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'ht_shortcodes_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'ht_shortcodes_register_mce_button' );
	}
}
add_action('admin_head', 'ht_shortcodes_add_mce_button');


function ht_shortcodes_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['ht_shortcodes_mce_button'] = HT_THEME_INC_URL . 'shortcodes/tinymce/js/tinymce.js';
	return $plugin_array;
}


function ht_shortcodes_register_mce_button( $buttons ) {
	array_push( $buttons, 'ht_shortcodes_mce_button' );
	return $buttons;
}


function ht_shortcodes_mce_css() {
	wp_enqueue_style('ht_shortcodes-tc', HT_THEME_INC_URL . 'shortcodes/tinymce/css/style.css');
}
add_action( 'admin_enqueue_scripts', 'ht_shortcodes_mce_css' );