<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              Nepothemes.com
 * @since             1.0.0
 * @package           Lhotse_Sticky_Menu
 *
 * @wordpress-plugin
 * Plugin Name:       Lhotse Sticky Menu
 * Plugin URI:        https://nepothemes.com/plugins/lhotse-sticky-menu
 * Description:       Lhotse Sticky Menu is a lightweight, simple  free WordPress plugin for sticky menu that allows you to design the menu on your website.
 * Version:           1.0.0
 * Author:            NepoThemes
 * Author URI:        https://nepothemes.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       lhotse-sticky-menu
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) die;

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'LHOTSE_STICKY_MENU_VERSION', '1.0.0' );

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

if ( ! function_exists( 'lhotse_sticky_menu_get_options' ) ) :
	function lhotse_sticky_menu_get_options() {
		$defaults = lhotse_sticky_menu_default_options();
		$options  = get_option( 'lhotse_sticky_menu_options', $defaults );
		return wp_parse_args( $options, $defaults );
	}
endif;
if ( ! function_exists( 'lhotse_sticky_sidebar_get_options' ) ) :
	function lhotse_sticky_sidebar_get_options() {
		$defaults = lhotse_sticky_sidebar_default_options();
		$options  = get_option( 'lhotse_sticky_sidebar_options', $defaults );
		return wp_parse_args( $options, $defaults );
	}
endif;
if ( ! function_exists( 'lhotse_sticky_notification_bar_get_options' ) ) :
	function lhotse_sticky_notification_bar_get_options() {
		$defaults = lhotse_sticky_notification_bar_default_options();
		$options  = get_option( 'lhotse_sticky_notification_bar_options', $defaults );
		return wp_parse_args( $options, $defaults );
	}
endif;

if ( ! function_exists( 'lhotse_sticky_menu_default_options' ) ) :
	function lhotse_sticky_menu_default_options( $option = null ) {
		$default_options = array(
			'sticky_desktop_menu_selector' => '#primary-menu',
			'sticky_background_color'      => '',
			'sticky_text_color'            => '',
			'sticky_z_index'               => '199',
			'sticky_opacity'               => '1',
			'sticky_desktop_font_size'     => '',
			'enable_only_on_home'          => 0,
		);
		if ( current_theme_supports( 'lhotse-sticky-menu' ) ) {
			$lhotse_sticky_menu_support = get_theme_support( 'lhotse-sticky-menu' );
			$default_options['sticky_desktop_menu_selector'] = isset( $lhotse_sticky_menu_support[0]['sticky_desktop_menu_selector'] ) ? $lhotse_sticky_menu_support[0]['sticky_desktop_menu_selector'] : '';
			$default_options['sticky_background_color']      = isset( $lhotse_sticky_menu_support[0]['sticky_background_color'] ) ? $lhotse_sticky_menu_support[0]['sticky_background_color'] : '';
			$default_options['sticky_text_color']            = isset( $lhotse_sticky_menu_support[0]['sticky_text_color'] ) ? $lhotse_sticky_menu_support[0]['sticky_text_color'] : '';
		}
		if( null == $option ) {
			return apply_filters( 'lhotse_sticky_menu_options', $default_options );
		} else {
			return $default_options[ $option ];
		}
	}
// endif; // sticky_sidebar_default_options
if ( ! function_exists( 'lhotse_sticky_sidebar_default_options' ) ) :
	function lhotse_sticky_sidebar_default_options( $option = null ) {
		$default_options = array(
			'sticky_desktop_sidebar_selector' => '#right-sidebar',
			'sticky_sidebar_background_color'      => '',
			'sticky_sidebar_text_color'            => '',
			'sticky_sidebar_z_index'               => '199',
			'sticky_sidebar_opacity'               => '1',
			'sticky_sidebar_desktop_font_size'     => '',
			'enable_only_on_home'          => 1,
		);
		if ( current_theme_supports( 'lhotse-sticky-sidebar' ) ) {
			$lhotse_sticky_sidebar_support = get_theme_support( 'lhotse-sticky-sidebar' );
			$default_options['sticky_desktop_sidebar_selector'] = isset( $lhotse_sticky_sidebar_support[0]['sticky_desktop_sidebar_selector'] ) ? $lhotse_sticky_sidebar_support[0]['sticky_desktop_sidebar_selector'] : '';
			$default_options['sticky_sidebar_background_color']      = isset( $lhotse_sticky_sidebar_support[0]['sticky_sidebar_background_color'] ) ? $lhotse_sticky_sidebar_support[0]['sticky_sidebar_background_color'] : '';
			$default_options['sticky_sidebar_text_color']            = isset( $lhotse_sticky_sidebar_support[0]['sticky_sidebar_text_color'] ) ? $lhotse_sticky_sidebar_support[0]['sticky_sidebar_text_color'] : '';
		}
		if( null == $option ) {
			return apply_filters( 'lhotse_sticky_sidebar_options', $default_options );
		} else {
			return $default_options[ $option ];
		}
	}

endif;

// sticky notification bar default options
if ( ! function_exists( 'lhotse_sticky_notification_bar_default_options' ) ) :
	function lhotse_sticky_notification_bar_default_options( $option = null ) {
		$default_options = array(
			'sticky_desktop_notification_bar_postion' => 'top',
			'sticky_notification_bar_desktop_height' => '',
			'sticky_notification_bar_background_color'      => '',
			'sticky_notification_bar_text_color'            => '',
			'sticky_notification_bar_message'               => "Display your notification bar message here.",
			'sticky_notification_bar_opacity'               => '1',
			'sticky_notification_bar_desktop_font_size'     => '',
			'enable_only_on_home'          => 1,
		);
		if ( current_theme_supports( 'lhotse-sticky-notification-bar' ) ) {
			$lhotse_sticky_notification_bar_support = get_theme_support( 'lhotse-sticky-notification-bar' );
			$default_options['sticky_desktop_notification_bar_selector'] = isset( $lhotse_sticky_notification_bar_support[0]['sticky_desktop_notification_bar_selector'] ) ? $lhotse_sticky_sidebar_support[0]['sticky_desktop_notification_bar_selector'] : '';
			$default_options['sticky_notification_bar_background_color']      = isset( $lhotse_sticky_notification_bar_support[0]['sticky_notification_bar_background_color'] ) ? $lhotse_sticky_notification_bar_support[0]['sticky_notification_bar_background_color'] : '';
			$default_options['sticky_notification_bar_message']      = isset( $lhotse_sticky_notification_bar_support[0]['sticky_notification_bar_message'] ) ? $lhotse_sticky_notification_bar_support[0]['sticky_notification_bar_message'] : '';
			$default_options['sticky_notification_bar_text_color']            = isset( $lhotse_sticky_notification_bar_support[0]['sticky_notification_bar_text_color'] ) ? $lhotse_sticky_notification_bar_support[0]['sticky_notification_bar_text_color'] : '';
		}
		if( null == $option ) {
			return apply_filters( 'lhotse_sticky_notification_bar_options', $default_options );
		} else {
			return $default_options[ $option ];
		}
	}
endif;



function run_lhotse_sticky_menu() {
	$plugin = new Lhotse_Sticky_Menu();
	$plugin->run();
}
run_lhotse_sticky_menu();
/* CTP tabs removal options */
require plugin_dir_path( __FILE__ ) . '/includes/ctp-tabs-removal.php';

 $ctp_options = ctp_get_options();
endif;