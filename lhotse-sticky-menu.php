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

// class of

// sticky notification bar default options
if ( ! function_exists( 'lhotse_sticky_notification_bar_default_options' ) ) :
	 function lhotse_sticky_notification_bar_default_options( $option = null ) {
		$default_options = array(
			'enable' => true,
			'sticky_desktop_notification_bar_postion' => 'top',
			'sticky_notification_bar_desktop_height' => '',
			'sticky_notification_bar_background_color'      => '',
			'sticky_notification_button_background_color'      => '',
			'sticky_notification_bar_text_color'            => '',
			'sticky_notification_button_text_color'            => '',
			'sticky_notification_bar_message'               => esc_html__('Display your notification bar message here.', 'lhotse-sticky-menu'),
			'sticky_notification_bar_button_message'               => esc_html__('Display your notification bar button message here.', 'lhotse-sticky-menu'),
			'sticky_notification_bar_button_link'               => '',
			'sticky_notification_bar_opacity'               => '1',
			'sticky_notification_bar_desktop_font_size'     => '',
		);

			if ( current_theme_supports( 'lhotse-sticky-notification-bar' ) ) {
			$lhotse_sticky_notification_bar_support = get_theme_support( 'lhotse-sticky-notification-bar' );
			$default_options['sticky_notification_bar_background_color']      = isset( $lhotse_sticky_notification_bar_support[0]['sticky_notification_bar_background_color'] ) ? $lhotse_sticky_notification_bar_support[0]['sticky_notification_bar_background_color'] : '';
			$default_options['enable'] = isset( $lhotse_sticky_notification_bar_support[0]['enable'] ) ? $lhotse_sticky_notification_bar_support[0]['enable'] : '';
			$default_options['sticky_notification_button_background_color']      = isset( $lhotse_sticky_notification_bar_support[0]['sticky_notification_button_background_color'] ) ? $lhotse_sticky_notification_bar_support[0]['sticky_notification_button_background_color'] : '';
			$default_options['sticky_notification_bar_message']      = isset( $lhotse_sticky_notification_bar_support[0]['sticky_notification_bar_message'] ) ? $lhotse_sticky_notification_bar_support[0]['sticky_notification_bar_message'] : '';
			$default_options['sticky_notification_bar_button_message']      = isset( $lhotse_sticky_notification_bar_support[0]['sticky_notification_bar_button_message'] ) ? $lhotse_sticky_notification_bar_support[0]['sticky_notification_bar_button_message'] : '';
			$default_options['sticky_notification_bar_button_link']      = isset( $lhotse_sticky_notification_bar_support[0]['sticky_notification_bar_button_link'] ) ? $lhotse_sticky_notification_bar_support[0]['sticky_notification_bar_button_link'] : '';
			$default_options['sticky_notification_bar_text_color']            = isset( $lhotse_sticky_notification_bar_support[0]['sticky_notification_bar_text_color'] ) ? $lhotse_sticky_notification_bar_support[0]['sticky_notification_bar_text_color'] : '';
			$default_options['sticky_notification_button_text_color']            = isset( $lhotse_sticky_notification_bar_support[0]['sticky_notification_button_text_color'] ) ? $lhotse_sticky_notification_bar_support[0]['sticky_notification_button_text_color'] : '';
		}
		if( null == $option ) {
			return apply_filters( 'lhotse_sticky_notification_bar_options', $default_options );
		} else {
			return $default_options[ $option ];
		}
	}
endif;


function add_notification_script(){
	echo '<script>
		// display the data from default option on message bar in Notification Bar
		var default_options = '.json_encode(lhotse_sticky_notification_bar_default_options()).';
		message_bar.innerHTML = message;
		
	</script>';
}
add_action('wp_footer', 'add_notification_script');
// Add inline styles or custom CSS classes
function add_notification_styles() {
	$default_options = lhotse_sticky_notification_bar_get_options();
    echo '<style>
        /* Custom styles for the notification bar */
        .sticky-notification-bar {
            background-color: '.$default_options['sticky_notification_bar_background_color'].';
            padding: 10px;
			color: '.$default_options['sticky_notification_bar_text_color'].';
			opacity: '.$default_options['sticky_notification_bar_opacity'].';
			font-size: '.$default_options['sticky_notification_bar_desktop_font_size'].'px;
			position: '.$default_options['sticky_desktop_notification_bar_postion'].';
			height: '.$default_options['sticky_notification_bar_desktop_height'].'px;
			text-align: center;
			margin: auto;
        }
		button[type=submit] {
			background-color: '.$default_options['sticky_notification_button_background_color'].';
			margin: 0px 0px 10px 10px;
		}
		button[type=submit] a{
			color: '.$default_options['sticky_notification_button_text_color'].';	
		}
    </style>';
}
add_action('wp_head', 'add_notification_styles');

// $default_options['sticky_notification_bar_message'] = 'testing';
function display_notification_bar(){
	$default_options = lhotse_sticky_notification_bar_get_options();
	if($default_options['enable']==1){
		echo '<div class="sticky-notification-bar"> <p>'.$default_options['sticky_notification_bar_message'].'<button type="submit" value="'.$default_options['sticky_notification_bar_button_message'].'"><a href="'.$default_options['sticky_notification_bar_button_link'].'" target="_blank">'.$default_options['sticky_notification_bar_button_message'].'</a></button></p></div>';
	}else{
		echo '';
	}
}
add_action('wp_head', 'is_enable_disable_enabled');
is_enable_disable_enabled();
// render_checkbox(1);
// add_action('wp_head', 'render_checkbox');
add_action('wp_body_open', 'display_notification_bar');

function run_lhotse_sticky_menu() {
	$plugin = new Lhotse_Sticky_Menu();
	$plugin->run();
}
run_lhotse_sticky_menu();

//  $ctp_options = ctp_get_options();
endif;

// Register the plugin's settings
// function my_enable_disable_plugin_settings_init() {
//     // Define a new settings field
//     add_settings_section('my_enable_disable_section', 'Enable/Disable Settings', 'my_enable_disable_section_callback', 'Lhotse Sticky Menu');
    
//     // Add the checkbox field to the settings section
//     add_settings_field('my_enable_disable_checkbox', 'Enable/Disable', 'my_enable_disable_checkbox_callback', 'Lhotse Sticky Menu', 'my_enable_disable_section');
    
//     // Register the field
//     register_setting('Lhotse Sticky Menu', 'my_enable_disable_checkbox', 'esc_attr');
// }
// add_action('admin_init', 'my_enable_disable_plugin_settings_init');

// // Callback function to display the section description
// function my_enable_disable_section_callback() {
//     echo '<p>Select whether to enable or disable the functionality.</p>';
// }

// // Callback function to display the checkbox field
// function my_enable_disable_checkbox_callback() {
//     $value = get_option('my_enable_disable_checkbox');
//     echo '<input type="checkbox" id="my_enable_disable_checkbox" name="my_enable_disable_checkbox" value="1" ' . checked(1, $value, false) . '/>';
// }

// // Display the checkbox field in the General Settings page
// function my_enable_disable_plugin_settings_page() {
//     ?>
<!-- //     <div class="wrap"> -->
<!-- //         <h1>My Enable Disable Plugin</h1> -->
<!-- //         <form method="post" action="options.php"> -->
             <?php
//             settings_fields('general');
//             do_settings_sections('general');
//             submit_button();
            // ?>
<!-- //         </form> -->
<!-- //     </div> -->
     <?php
// }


// Custom function to check if the functionality is enabled or disabled
function is_enable_disable_enabled() {
    $value = get_option('enable');
	if($value==1){
		echo "lhotse";
	}else {
		echo "not work";
	}
    return $value == '1';
	echo '';
	$default_options = lhotse_sticky_notification_bar_get_options();
	if($default_options['enable']==1){
		echo '<div class="sticky-notification-bar"> <p>'.$default_options['sticky_notification_bar_message'].'<button type="submit" value="'.$default_options['sticky_notification_bar_button_message'].'"><a href="'.$default_options['sticky_notification_bar_button_link'].'" target="_blank">'.$default_options['sticky_notification_bar_button_message'].'</a></button></p></div>';
	}else{
		echo '';
	}
}
?>
