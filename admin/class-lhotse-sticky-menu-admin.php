<?php
class Lhotse_Sticky_Menu_Admin {
	private $plugin_name;	
	private $version;

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}
	
	public function enqueue_styles() {
		/**
		 * The Lhotse_Sticky_Menu_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */		
		if( isset( $_GET['page'] ) && 'lhotse-sticky-menu' == $_GET['page'] ) {
			wp_enqueue_style( $this->plugin_name. '-display-dashboard', plugin_dir_url( __FILE__ ) . 'css/lhotse-sticky-menu-admin.css', array(), $this->version, 'all' );
		}
}
	
	public function enqueue_scripts() {
		/**
		 * The Lhotse_Sticky_Menu_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		if ( isset( $_GET['page'] ) && 'lhotse-sticky-menu' == $_GET['page'] ) {
			
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/lhotse-sticky-menu-admin.js', array( 'jquery', 'matchHeight', 'jquery-ui-tooltip' ), $this->version, false );
			 wp_enqueue_script( 'lhotse-sticky-menu-color-picker', plugin_dir_url( __FILE__ ) . 'js/wp-color-picker.js', array( 'wp-color-picker', 'jquery' ), $this->version, false );
		}
	}
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
			'dashicons-sticky', // $icon_url.
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
			wp_die( esc_html__('You do not have sufficient permissions to access this page.', 'lhotse-sticky-menu'));
		}
		require plugin_dir_path( __FILE__ ) . 'partials/lhotse-sticky-menu-admin-display.php';
	}
	// add sticky sidebar settings page
	public function register_settings_sidebar() {
		register_setting(
			'lhotse-sticky-menu-group',
			'lhotse_sticky_sidebar_options',
			array( $this, 'sanitize_callback' ));
	}
	public function register_settings_notification_bar() {
		register_setting(
			'lhotse-sticky-menu-group',
			'lhotse_sticky_notification_bar_options',
			array( $this, 'sanitize_callback' ));
	}
	public function register_settings() {
		register_setting(
			'lhotse-sticky-menu-group',
			'lhotse_sticky_menu_options',
			array( $this, 'sanitize_callback' ));
	}

	function add_plugin_meta_links( $meta_fields, $file ){
		return $meta_fields;
	}	
}