<?php

require_once ( 'class-tgm-plugin-activation.php' );
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

add_action( ‘tgmpa_register’, ‘register_required_plugins’ );

function register_required_plugins() {
	/**
	* Register the required plugins for this theme.
	*
	* In this example, we register two plugins – one included with the TGMPA library
	* and one from the .org repo.
	*
	* The variable passed to tgmpa_register_plugins() should be an array of plugin
	* arrays.
	*
	* This function is hooked into tgmpa_init, which is fired within the
	* TGM_Plugin_Activation class constructor.
	*/
	/**
	* Array of plugin arrays. Required keys are name and slug.
	* If the source is NOT from the .org repo, then source is also required.
	*/
	$plugins = array(
	
	// This is an example of how to include a plugin pre-packaged with a theme.
	//array(
	//‘name’ => ‘TGM Example Plugin’, // The plugin name.
	//‘slug’ => ‘tgm-example-plugin’, // The plugin slug (typically the folder name).
	//‘source’ => get_stylesheet_directory() . ‘/lib/plugins/tgm-example-plugin.zip’, // The plugin source.
	//‘required’ => true, // If false, the plugin is only ‘recommended’ instead of required.
	//‘version’ => ”, // E.g. 1.0.0. If set, the active plugin must be this version or higher.
	//‘force_activation’ => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
	//‘force_deactivation’ => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
	//‘external_url’ => ”, // If set, overrides default API URL and points to an external URL.
	//),
	
	// This is an example of how to include a plugin from a private repo in your theme.
	//array(
	//‘name’ => ‘TGM New Media Plugin’, // The plugin name.
	//‘slug’ => ‘tgm-new-media-plugin’, // The plugin slug (typically the folder name).
	//‘source’ => ‘https://s3.amazonaws.com/tgm/tgm-new-media-plugin.zip’, // The plugin source.
	//‘required’ => true, // If false, the plugin is only ‘recommended’ instead of required.
	//‘external_url’ => ‘https://github.com/thomasgriffin/New-Media-Image-Uploader’, // If set, overrides default API URL and points to an external URL.
	//),
	
	// This is an example of how to include a plugin from the WordPress Plugin Repository.
	array(
	‘name’ => ‘BuddyPress’,
	‘slug’ => ‘buddypress’,
	‘required’ => false,
	),
	
	);
	
	/**
	* Array of configuration settings. Amend each line as needed.
	* If you want the default strings to be available under your own theme domain,
	* leave the strings uncommented.
	* Some of the strings are added into a sprintf, so see the comments at the
	* end of each line for what each argument will be.
	*/
	$config = array(
	‘default_path’ => ”, // Default absolute path to pre-packaged plugins.
	‘menu’ => ‘tgmpa-install-plugins’, // Menu slug.
	‘has_notices’ => true, // Show admin notices or not.
	‘dismissable’ => true, // If false, a user cannot dismiss the nag message.
	‘dismiss_msg’ => ”, // If ‘dismissable’ is false, this message will be output at top of nag.
	‘is_automatic’ => false, // Automatically activate plugins after installation or not.
	‘message’ => ”, // Message to output right before the plugins table.
	‘strings’ => array(
	‘page_title’ => __( ‘Install Required Plugins’, ‘tgmpa’ ),
	‘menu_title’ => __( ‘Install Plugins’, ‘tgmpa’ ),
	‘installing’ => __( ‘Installing Plugin: %s’, ‘tgmpa’ ), // %s = plugin name.
	‘oops’ => __( ‘Something went wrong with the plugin API.’, ‘tgmpa’ ),
	‘notice_can_install_required’ => _n_noop( ‘This theme requires the following plugin: %1$s.’, ‘This theme requires the following plugins: %1$s.’ ), // %1$s = plugin name(s).
	‘notice_can_install_recommended’ => _n_noop( ‘This theme recommends the following plugin: %1$s.’, ‘This theme recommends the following plugins: %1$s.’ ), // %1$s = plugin name(s).
	‘notice_cannot_install’ => _n_noop( ‘Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.’, ‘Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.’ ), // %1$s = plugin name(s).
	‘notice_can_activate_required’ => _n_noop( ‘The following required plugin is currently inactive: %1$s.’, ‘The following required plugins are currently inactive: %1$s.’ ), // %1$s = plugin name(s).
	‘notice_can_activate_recommended’ => _n_noop( ‘The following recommended plugin is currently inactive: %1$s.’, ‘The following recommended plugins are currently inactive: %1$s.’ ), // %1$s = plugin name(s).
	‘notice_cannot_activate’ => _n_noop( ‘Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.’, ‘Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.’ ), // %1$s = plugin name(s).
	‘notice_ask_to_update’ => _n_noop( ‘The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.’, ‘The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.’ ), // %1$s = plugin name(s).
	‘notice_cannot_update’ => _n_noop( ‘Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.’, ‘Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.’ ), // %1$s = plugin name(s).
	‘install_link’ => _n_noop( ‘Begin installing plugin’, ‘Begin installing plugins’ ),
	‘activate_link’ => _n_noop( ‘Begin activating plugin’, ‘Begin activating plugins’ ),
	‘return’ => __( ‘Return to Required Plugins Installer’, ‘tgmpa’ ),
	‘plugin_activated’ => __( ‘Plugin activated successfully.’, ‘tgmpa’ ),
	‘complete’ => __( ‘All plugins installed and activated successfully. %s’, ‘tgmpa’ ), // %s = dashboard link.
	‘nag_type’ => ‘updated’ // Determines admin notice type – can only be ‘updated’, ‘update-nag’ or ‘error’.
	)
	);
	
	tgmpa( $plugins, $config );
	
	}