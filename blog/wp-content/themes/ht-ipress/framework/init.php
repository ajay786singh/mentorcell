<?php
/**
 * Initialize the framework
 * 
 * Main includes for all framework.     
 * 
 */
// metaboxes prefix
$prefix = '_ht_';


define( 'HT_FRAMEWORK_VERSION', '1.0.0' );
define( 'HT_FRAMEWORK_PATH', dirname(__FILE__) . '/' );
define( 'HT_FRAMEWORK_URL', get_template_directory_uri() . '/framework/' );

/**
 *  The theme main directories path
 */
define( 'HT_THEME_STYLES_DIR', 	get_template_directory() . '/styles/' );
define( 'HT_THEME_JS_DIR', 		get_template_directory() . '/scripts/' );
define( 'HT_THEME_IMG_DIR', 	get_template_directory() . '/images/' );
define( 'HT_THEME_I18N_DIR', 	get_template_directory() . '/languages/' );
define( 'HT_THEME_INC_DIR', 	get_template_directory() . '/includes/' );

/**
 * The theme main folders uri
 */
define( 'HT_THEME_STYLES_URL', 	get_template_directory_uri() . '/styles/' );
define( 'HT_THEME_JS_URL', 		get_template_directory_uri() . '/scripts/' );
define( 'HT_THEME_IMG_URL', 	get_template_directory_uri() . '/images/' );
define( 'HT_THEME_I18N_URL', 	get_template_directory_uri() . '/languages/' );
define( 'HT_THEME_INC_URL', 	get_template_directory_uri() . '/includes/' );


// google fonts
require_once ( HT_FRAMEWORK_PATH 	. 'assets/php/googlefonts.php');

// core functions
require_once ( HT_FRAMEWORK_PATH 	. 'functions/functions.php' );

// theme config
require_once ( HT_THEME_INC_DIR	. 'config.php');

// widgets
require_once ( HT_FRAMEWORK_PATH     . 'widgets.php');

// set default options of optiontree framework
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );

// load option tree
load_template( HT_FRAMEWORK_PATH . 'option-framework/ot-loader.php' );

// load options
load_template( HT_THEME_INC_DIR . 'theme-options/index.php' );

// load metaboxes
load_template( HT_THEME_INC_DIR . 'meta-boxes/index.php' );

// install plugins
require_once ( HT_THEME_INC_DIR	. 'lib/install-plugins.php');

// shortcodes
require_once ( HT_THEME_INC_DIR	. 'shortcodes/shortcodes.php');
require_once ( HT_THEME_INC_DIR	. 'shortcodes/tinymce/main-tinymce.php');

/**
 * Add Admin Custom Style
 */
function ht_load_custom_wp_admin_style() {
    wp_register_style( 'custom_wp_admin_css', HT_FRAMEWORK_URL . 'assets/css/admin-style.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_admin_css' );

    // Remove ui style from admin area
	$screen = get_current_screen();
	if ( 'appearance_page_ot-theme-options' === $screen->id ) {
	    wp_dequeue_style( 'plugin_name-admin-ui-css' );
	    wp_dequeue_style( 'wp-review-admin-ui-css' );
	    wp_dequeue_style( 'jquery-ui-css' );
	    wp_dequeue_style( 'wp-review-admin-style');
	}        
}
add_action( 'ot_admin_styles_after', 'ht_load_custom_wp_admin_style' ,10);

