<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       www.lhotseplugins.com
 * @since      1.0.0
 *
 * @package    Lhotse_Sticky_Menu
 * @subpackage Lhotse_Sticky_Menu/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <h1 class="wp-heading-inline"><?php esc_html_e( 'Lhotse Sticky Menu', 'lhotse-sticky-menu' );?></h1>
    <div id="plugin-description">
        <p><?php esc_html_e( 'Lets you display Sticky Menu anywhere on your website elegantly.', 'lhotse-sticky-menu' ); ?></p>
    </div>
    <div class="lhotsep-content-wrapper">
        <div class="lhotsep_widget_settings">
            <form id="sticky-main" method="post" action="options.php">
                <h2 class="nav-tab-wrapper">
                    <a class="nav-tab nav-tab-active" id="dashboard-tab" href="#dashboard"><?php esc_html_e( 'Dashboard', 'lhotse-sticky-menu' ); ?></a>

                </h2>
                <div id="dashboard" class="wplhotsetab nosave active">
                    <?php require_once plugin_dir_path( dirname( __FILE__ ) ) . 'partials/dashboard-display.php';?>
                </div>
            </form><!-- sticky-main -->
        </div><!-- .lhotsep_widget_settings -->
</div><!-- .wrap -->
