<?php

class Lhotse_Sticky_Menu {
	protected $loader;
	protected $plugin_name;
	protected $version;
	public function __construct() {
		if ( defined( 'LHOTSE_STICKY_MENU_VERSION' ) ) {
			$this->version = LHOTSE_STICKY_MENU_VERSION;
		} else {
			$this->version = '1.0';
		}
		$this->plugin_name = 'lhotse-sticky-menu';
		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}	
	private function load_dependencies() {
		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-lhotse-sticky-menu-loader.php';

		
		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-lhotse-sticky-menu-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-lhotse-sticky-menu-public.php';

		$this->loader = new Lhotse_Sticky_Menu_Loader();

	}
	private function define_admin_hooks() {
		$plugin_admin = new Lhotse_Sticky_Menu_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'add_plugin_settings_menu' );
		$this->loader->add_action( 'admin_init', $plugin_admin, 'register_settings' );
		$this->loader->add_action( 'admin_init', $plugin_admin, 'register_settings_sidebar' );
		$this->loader->add_action( 'admin_init', $plugin_admin, 'register_settings_notification_bar' );
		$this->loader->add_filter( 'plugin_action_links', $plugin_admin, 'action_links', 10, 2 );
		$this->loader->add_filter( 'plugin_row_meta', $plugin_admin, 'add_plugin_meta_links', 10, 2 );
	}
	private function define_public_hooks() {
		$plugin_public = new Lhotse_Sticky_Menu_Public( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'lhotse_stickymenu' );
		$this->loader->add_action( 'wp_localize_script', $plugin_public,'sticky_object' );
	}
	public function run() {
		$this->loader->run();
	}
	public function get_plugin_name() {
		return $this->plugin_name;
	}
	public function get_loader() {
		return $this->loader;
	}
	public function get_version() {
		return $this->version;
	}
}