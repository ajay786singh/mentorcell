<?php
/**
 * Configuration of the current theme
 */

// theme name
define('THEME_NAME', 'iPress');


// custom meta boxes
require_once HT_THEME_INC_DIR . 'meta-boxes/index.php';


/**
 * Setting up the page builder
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {

	add_action( 'vc_before_init', 'ht_vcSetAsTheme' );
	function ht_vcSetAsTheme() {
		vc_set_as_theme(true);
	}
  	
  	$dir = get_stylesheet_directory() . '/includes/vc_mods/vc_templates/';

	vc_set_shortcodes_templates_dir($dir);
	vc_set_default_editor_post_types(array('post', 'page'));

	require_once locate_template('/includes/vc_mods/vc_shortcodes.php');
}

// paginattion
if (!function_exists('wp_pagenavi')) {
    require_once (HT_THEME_INC_DIR . 'lib/wp-pagenavi.php');
}

