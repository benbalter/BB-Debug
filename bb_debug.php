<?php
/*
Plugin Name: BB Debug
Description: Quick and dirty debugging for WordPress
Version: 1.0
Author: Benjamin J. Balter
Author URI: http://ben.balter.com
License: GPL2
*/

/**
 * Debugs a variable
 * Only visible to admins if WP_DEBUG is on
 * @param mixed $var the var to debug
 * @param bool $die whether to die after outputting
 * @param string $function the function to call, usually either print_r or var_dump, but can be anything
 */
function bb_debug( $var, $die = true, $function = 'print_r' ) {

    if ( !current_user_can( 'manage_options' ) || !WP_DEBUG )
    	return;
    	
    echo "<!-- BEGIN DEBUG OUTPUT --><PRE>\n";
    call_user_func( $function, $var );
    echo "\n</PRE><!-- END DEBUG OUTPUT -->\n";
    
    if ( $die )
    	die();
	
	//allow this to be used as a filter
	return $var;
	
}