<?php
// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

$option_name = 'lhotse_sticky_menu_options';

delete_option( $option_name );

// For site options in Multisite.
delete_site_option( $option_name );