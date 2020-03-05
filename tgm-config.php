<?php
 
$config = array(
    'id'           => 'hello-elementor-child', // your unique TGMPA ID
    'default_path' => get_stylesheet_directory() . '/lib/plugins/', // default absolute path
    'menu'         => 'tgmpa-install-plugins', // menu slug
    'has_notices'  => true, // Show admin notices
    'dismissable'  => false, // the notices are NOT dismissable
    'dismiss_msg'  => 'I really, really need you to install these plugins, okay?', // this message will be output at top of nag
    'is_automatic' => true, // automatically activate plugins after installation
    'message'      => '<!--Hey there.-->', // message to output right before the plugins table
    'strings'      => array(); // The array of message strings that TGM Plugin Activation uses
);
 
?>