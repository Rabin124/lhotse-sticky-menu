<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              lhotseplugins.com
 * @since             1.0.0
 * @package           Lhotse_Sticky_Menu
 *
 * @wordpress-plugin
 * Plugin Name:       Lhotse Sticky Menu
 * Plugin URI:        lhotseplugins.com/plugins/lhotse-sticky-menu
 * Description:       Lhotse Sticky Menu is a lightweight, simple yet feature-rich free WordPress plugin for sticky menu that allows you to lock the menu (or any other element) on your website. Prevent your menu from disappearing when users scroll down the page!
 * Version:           1.0
 * Author:            Rabin Adhikari
 * Author URI:        lhotseplugins.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       lhotse-sticky-menu
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'LHOTSE_STICKY_MENU_VERSION', '1.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-lhotse-sticky-menu-activator.php
 */
// The URL of the directory that contains the plugin
if ( ! defined( 'LHOTSE_STICKY_MENU_URL' ) ) {
	define( 'LHOTSE_STICKY_MENU_URL', plugin_dir_url( __FILE__ ) );
}


// The absolute path of the directory that contains the file
if ( ! defined( 'LHOTSE_STICKY_MENU_PATH' ) ) {
	define( 'LHOTSE_STICKY_MENU_PATH', plugin_dir_path( __FILE__ ) );
}


// Gets the path to a plugin file or directory, relative to the plugins directory, without the leading and trailing slashes.
if ( ! defined( 'LHOTSE_STICKY_MENU_BASENAME' ) ) {
	define( 'LHOTSE_STICKY_MENU_BASENAME', plugin_basename( __FILE__ ) );
}

function activate_lhotse_sticky_menu() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-lhotse-sticky-menu-activator.php';
	Lhotse_Sticky_Menu_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-lhotse-sticky-menu-deactivator.php
 */
function deactivate_lhotse_sticky_menu() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-lhotse-sticky-menu-deactivator.php';
	Lhotse_Sticky_Menu_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_lhotse_sticky_menu' );
register_deactivation_hook( __FILE__, 'deactivate_lhotse_sticky_menu' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-lhotse-sticky-menu.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */


if ( ! function_exists( 'lhotse_sticky_menu_get_options' ) ) :
	function lhotse_sticky_menu_get_options() {
		$defaults = lhotse_sticky_menu_default_options();
		$options  = get_option( 'lhotse_sticky_menu_options', $defaults );
		return wp_parse_args( $options, $defaults );
	}
endif;


if ( ! function_exists( 'lhotse_sticky_menu_default_options' ) ) :
	/**
	 * Return array of default options
	 *
	 * @since     1.0
	 * @return    array    default options.
	 */
	function lhotse_sticky_menu_default_options( $option = null ) {
		$default_options = array(
			'sticky_desktop_menu_selector' => '#primary-menu',
			'enable_only_on_home'          => 0,
		);

		if ( null == $option ) {
			return apply_filters( 'lhotse_sticky_menu_options', $default_options );
		} else {
			return $default_options[ $option ];
		}
	}
endif; // sticky_menu_default_options

function run_lhotse_sticky_menu() {

	$plugin = new Lhotse_Sticky_Menu();
	$plugin->run();

}
run_lhotse_sticky_menu();
