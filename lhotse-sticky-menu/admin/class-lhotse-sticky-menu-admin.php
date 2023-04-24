<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.lhotseplugins.com
 * @since      1.0.0
 *
 * @package    Lhotse_Sticky_Menu
 * @subpackage Lhotse_Sticky_Menu/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Lhotse_Sticky_Menu
 * @subpackage Lhotse_Sticky_Menu/admin
 * @author     Lhotse Plugins <www.lhotseplugins.com>
 */
class Lhotse_Sticky_Menu_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Lhotse_Sticky_Menu_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Lhotse_Sticky_Menu_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		
		if( isset( $_GET['page'] ) && 'lhotse-sticky-menu' == $_GET['page'] ) {
			wp_enqueue_style( $this->plugin_name. '-display-dashboard', plugin_dir_url( __FILE__ ) . 'css/lhotse-sticky-menu-admin.css', array(), $this->version, 'all' );
		}
}
	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Lhotse_Sticky_Menu_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Lhotse_Sticky_Menu_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		if ( isset( $_GET['page'] ) && 'lhotse-sticky-menu' == $_GET['page'] ) {
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/lhotse-sticky-menu-admin.js', array( 'jquery', 'matchHeight', 'jquery-ui-tooltip' ), $this->version, false );
		}

	}

	/**
	 * Lhotse Sticky Menu: action_links
	 * Lhotse Sticky Menu Settings Link function callback
	 *
	 * @param arrray $links Link url.
	 *
	 * @param arrray $file File name.
	 */
	public function action_links( $links, $file ) {
		if ( $file === $this->plugin_name . '/' . $this->plugin_name . '.php' ) {
			$settings_link = '<a href="' . esc_url( admin_url( 'admin.php?page=lhotse-sticky-menu' ) ) . '">' . esc_html__( 'Settings', 'lhotse-sticky-menu' ) . '</a>';

			array_unshift( $links, $settings_link );
		}
		return $links;
	}

	public function add_plugin_settings_menu() {
		add_menu_page(
			esc_html__( 'Lhotse Sticky Menu', 'lhotse-sticky-menu' ), // $page_title.
			esc_html__( 'Lhotse Sticky Menu', 'lhotse-sticky-menu' ), // $menu_title.
			'manage_options', // $capability.
			'lhotse-sticky-menu', // $menu_slug.
			array( $this, 'settings_page' ), // $callback_function.
			'dashicons-pressthis', // $icon_url.
			'99.01564' // $position.
		);
		add_submenu_page(
			'lhotse-sticky-menu', // $parent_slug.
			esc_html__( 'Lhotse Sticky Menu', 'lhotse-sticky-menu' ), // $page_title.
			esc_html__( 'Settings', 'lhotse-sticky-menu' ), // $menu_title.
			'manage_options', // $capability.
			'lhotse-sticky-menu', // $menu_slug.
			array( $this,'settings_page' ) // $callback_function.
		);
	}


	public function settings_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'lhotse-sticky-menu' ) );
		}
		require plugin_dir_path( __FILE__ ) . 'partials/lhotse-sticky-menu-admin-display.php';
	}

	public function register_settings() {
		register_setting(
			'lhotse-sticky-menu-group',
			'lhotse_sticky_menu_options',
			array( $this, 'sanitize_callback' )
		);
	}

	public function sanitize_callback( $input ) {
		if ( isset( $input['reset'] ) && $input['reset'] ) {
			//If reset, restore defaults
			return lhotse_sticky_menu_default_options();
		}
		$message = null;
		$type    = null;

		// Verify the nonce before proceeding.
	    if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
	    	|| ( ! isset( $_POST['lhotse_sticky_menu_nounce'] )
	    	|| ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['lhotse_sticky_menu_nounce'] ) ), basename( __FILE__ ) ) )
	    	|| ( ! check_admin_referer( basename( __FILE__ ), 'lhotse_sticky_menu_nounce' ) ) ) {
	    	if ( null !== $input ) {

					$input['status']                       = ( isset( $input['status'] ) && '1' == $input['status'] ) ? '1' : '0';
					if ( isset( $input['sticky_desktop_menu_selector'] ) ) {
					$input['sticky_desktop_menu_selector'] = sanitize_text_field( $input['sticky_desktop_menu_selector'] );
					}
			    return $input;
		    } 
		    return 'Invalid Nonce';
		}
	}
	function add_plugin_meta_links( $meta_fields, $file ){
		return $meta_fields;
	}
}