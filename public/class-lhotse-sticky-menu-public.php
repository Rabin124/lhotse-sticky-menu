<?php

class Lhotse_Sticky_Menu_Public {

	private $plugin_name;
	private $version;

	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/lhotse-sticky-menu-public.css', array(), $this->version, 'all' );

	}

	
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/lhotse-sticky-menu-public.js', array( 'jquery' ), $this->version, false );
		wp_register_script( 'sidebar-script', plugin_dir_url( __FILE__ ) . 'js/lhotse-sticky-sidebar-public.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script('sidebar-script');
		// wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . '/js/lhotse-sticky-notification-bar-public.js', array( 'jquery' ), $this->version, true );
		// wp_enqueue_script( 'lhotse-sticky-notification-bar', plugin_dir_url( __FILE__ ) . '/js/lhotse-sticky-notification-bar-public.js', array( 'wp-notification-bar', 'jquery' ), $this->version, false );

		wp_register_script('notification-bar-script', plugin_dir_url( __FILE__ ) . 'js/lhotse-sticky-notification-bar-public.js', array( 'jquery' ), $this->version, false);
		// wp_add_inline_script('notification-bar-script', 'const notificationBarScriptParams = ' . wp_json_encode($script_params), 'before');
		wp_enqueue_script('notification-bar-script');

	}
	public function lhotse_stickymenu() {	
		$lhotse_sticky_menu_options = lhotse_sticky_menu_get_options();
		wp_localize_script( $this->plugin_name, 'sticky_object', $lhotse_sticky_menu_options );
	}

	// add sidebar sticky script
	public function lhotse_sticky_sidebar() {	
		$lhotse_sticky_sidebar_options = lhotse_sticky_sidebar_get_options();
		wp_localize_script( $this->plugin_name, 'sticky_object', $lhotse_sticky_sidebar_options );
	}
	// add notification-bar sticky script
	public function lhotse_sticky_notification_bar() {	
		$lhotse_sticky_notification_bar_options = lhotse_sticky_notification_bar_get_options();
		wp_localize_script( $this->plugin_name, 'sticky_object', $lhotse_sticky_notification_bar_options );
	}

}

