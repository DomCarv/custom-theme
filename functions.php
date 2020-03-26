<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */


/*--ELEMENTOR CHILD THEME--*/
function hello_elementor_child_enqueue_scripts() {
	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		'1.0.0'
	);
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts' );
/*----*/

/*--AUTOMATICALLY INSTALL PLUGINS WITH THEME INSTALL--*/
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
 
add_action( 'tgmpa_register', 'mytheme_require_plugins' );
 
function mytheme_require_plugins() {
 
     $plugins = array(
    /*--REQUIRED PLUGINS--*/
	    array(
        'name'      => 'Elementor',
        'slug'      => 'elementor',
        'required'  => true,
    ),
		    array(
        'name'      => 'WP Mail SMTP by WPForms',
        'slug'      => 'wp-mail-smtp',
        'required'  => true,
    ),
			    array(
        'name'      => 'Disable Comments',
        'slug'      => 'disable-comments',
        'required'  => true,
    ),
    array(
        'name'      => 'Classic Editor',
        'slug'      => 'classic-editor',
        'required'  => true, 
    ),
    array(
        'name'      => 'Really Simple SSL',
        'slug'      => 'really-simple-ssl',
        'required'  => true,
    ),
    /*--NOT REQUIRED PLUGINS--*/
    array(
        'name'      => 'Elementor Custom Skin',
        'slug'      => 'ele-custom-skin',
        'required'  => false,
    ),
    array(
        'name'      => 'Wordfence Security – Firewall & Malware Scan',
        'slug'      => 'wordfence',
        'required'  => false,
    ),
    array(
        'name'      => 'GDPR Cookie Compliance',
        'slug'      => 'gdpr-cookie-compliance',
        'required'  => false,
    ),
    array(
        'name'      => 'Yoast SEO',
        'slug'      => 'wordpress-seo',
        'required'  => false,
    ),
    array(
        'name'      => 'SVG Support',
        'slug'      => 'svg-support',
        'required'  => false,
    ),
    array(
        'name'      => 'Duplicate Post',
        'slug'      => 'duplicate-post',
        'required'  => false,
    ),
    array(
        'name'      => 'Custom Post Type UI',
        'slug'      => 'custom-post-type-ui',
        'required'  => false,
    ),
    array(
        'name'      => 'Advanced Custom Fields',
        'slug'      => 'advanced-custom-fields',
        'required'  => false, 
    )
    
);
    $config = array();
 
    tgmpa( $plugins, $config );
 
}
/*----*/


/*--AUTOMATICLALLY REMOVE HELLO DOLLY AND AKISMET PLUGINS ON THEME INSTALL--*/
function goodbye_dolly() {
    if (file_exists(WP_PLUGIN_DIR.'/hello.php')) {
        require_once(ABSPATH.'wp-admin/includes/plugin.php');
        require_once(ABSPATH.'wp-admin/includes/file.php');
        delete_plugins(array('hello.php'));
    }
}

add_action('admin_init','goodbye_dolly');

function goodbye_akismet() {
    if (file_exists(WP_PLUGIN_DIR.'/akismet/akismet.php')) {
        require_once(ABSPATH.'wp-admin/includes/plugin.php');
        require_once(ABSPATH.'wp-admin/includes/file.php');
        delete_plugins(array('/akismet/akismet.php'));
    }
}

add_action('admin_init','goodbye_akismet');
/*----*/


/*--AUTOMATICALLY ACTIVATE PLUGINS ON INSTALL--*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    activate_plugin( 'classic-editor/classic-editor.php' );
    activate_plugin( 'disable-comments/disable-comments.php' );
    activate_plugin( 'elementor/elementor.php' );
/*----*/


/*--ASSETS & POLYFILL ENQUEUE--*/
 wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/assets/js/script.js', array ( 'jquery' ), time(), true);
 wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/assets/css/style.css',false,time(),'all');

 wp_enqueue_script( 'polyfill', 'https://polyfill.io/v3/polyfill.min.js?features=es2015%2Ces2016%2Ces2017%2Ces2018%2Ces5%2Ces6%2Ces7%2CWebAnimations%2Cdefault', array ( 'jquery' ), '1.1', true);
 /*----*/

/*--AUTOMATICALLY REMOVE COMMENTS ON INSTALL--*/
// Removes from admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );
/*----*/
