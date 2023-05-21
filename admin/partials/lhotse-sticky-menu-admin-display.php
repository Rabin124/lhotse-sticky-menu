<?php
?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <h1 class="wp-heading-inline"><?php esc_html_e( 'Lhotse Sticky Menu', 'lhotse-sticky-menu' );?></h1>
    <div id="plugin-description">
        <p><?php esc_html_e( 'Lets you display Sticky Menu anywhere on your website elegantly.', 'lhotse-sticky-menu' ); ?>
        </p>
    </div>
    <div class="lhotsep-content-wrapper">
        <div class="lhotsep_widget_settings">
            <form id="sticky-main" method="post" action="options.php">
                <h2 class="nav-tab-wrapper">
                    <a class="nav-tab nav-tab-active" id="dashboard-tab"
                        href="#dashboard"><?php esc_html_e( 'Menu', 'lhotse-sticky-menu' ); ?></a>
                    <a class="nav-tab" id="sidebar-tab"
                        href="#sidebar"><?php esc_html_e( 'Sidebar', 'lhotse-sticky-menu' ); ?></a>
                    <a class="nav-tab" id="notification-bar-tab"
                        href="#notification-bar"><?php esc_html_e( 'Notification Bar', 'lhotse-sticky-menu' ); ?></a>
                </h2>
                <div id="dashboard" class="wplhotsetab nosave active">
                    <?php require_once plugin_dir_path( dirname( __FILE__ ) ) . 'partials/dashboard-display.php';?>

                    <!--Add sidebar sticky start form   -->
                    <div id="sidebar" class="wpcatchtab save">
                        <div class="content-wrapper col-3">
                            <div class="header">
                                <h3><?php esc_html_e( 'Sidebar', 'lhotse-sticky-sidebar' );?></h3>
                                <div class="content">
                                    <?php if( isset($_GET['settings-updated']) ) { ?>

                                    <?php } ?>
                                    <?php // Use nonce for verification.
				wp_nonce_field( basename( __FILE__ ), 'lhotse_sticky_sidebar_nounce' );
			?>
                                    <div id="sticky_main">

                                        <form method="post" action="options.php">
                                            <?php settings_fields( 'lhotse-sticky-menu-group' ); ?>
                                            <?php
					$defaults =lhotse_sticky_sidebar_default_options();
					$settings = lhotse_sticky_sidebar_get_options();
					?>
                                            <div class="option-container">
                                                <table class="form-table">
                                                    <tbody>
                                                        <tr>
                                                            <th>
                                                                <label><?php esc_html_e( ' Side Selector', 'lhotse-sticky-sidebar' ); ?></label>
                                                            </th>
                                                            <td>
                                                                <input type="text"
                                                                    name="lhotse_sticky_sidebar_options[sticky_desktop_sidebar_selector]"
                                                                    id="sticky-desktop-sidebar-selector"
                                                                    class="sticky-desktop-sidebar-selector"
                                                                    value="<?php echo esc_attr($settings['sticky_desktop_sidebar_selector']); ?>" />
                                                                <span class="dashicons dashicons-info tooltip"
                                                                    title="<?php esc_html_e( 'Sticky Sidebar will be displayed just before this selector.', 'lhotse-sticky-sidebar' ); ?>"></span>
                                                            </td>
                                                        </tr>
                                                        <th>
                                                            <label><?php esc_html_e( 'Sticky Sidebar Background Color', 'lhotse-sticky-sidebar' ); ?></label>
                                                        </th>
                                                        <td>
                                                            <input type="text"
                                                                name="lhotse_sticky_sidebar_options[sticky_sidebar_background_color]"
                                                                id="sticky-sidebar-background-color"
                                                                class="color-picker" data-alpha="true"
                                                                value="<?php echo esc_attr( $settings['sticky_sidebar_background_color'] ); ?>" />
                                                        </td>
                                                        </tr>
                                                        </tr>
                                                        <th>
                                                            <label><?php esc_html_e( 'Sticky Side Text Color', 'lhotse-sticky-sidebar' ); ?></label>
                                                        </th>
                                                        <td>
                                                            <input type="text"
                                                                name="lhotse_sticky_sidebar_options[sticky_sidebar_text_color]"
                                                                id="sticky-sidebar-text-color" class="color-picker"
                                                                data-alpha="true"
                                                                value="<?php echo esc_attr( $settings['sticky_sidebar_text_color'] ); ?>" />
                                                        </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label><?php esc_html_e( 'Sticky Z index', 'lhotse-sticky-sidebar' ); ?></label>
                                                            </th>
                                                            <td>
                                                                <input type="number" min="-100" max="2147483647"
                                                                    step="1"
                                                                    name="lhotse_sticky_sidebar_options[sticky_sidebar_z_index]"
                                                                    id="sticky-sidebar-z-index" class="color-z-index"
                                                                    data-alpha="true"
                                                                    value="<?php echo esc_attr( $settings['sticky_sidebar_z_index'] ); ?>" /><span
                                                                    class="dashicons dashicons-info tooltip"
                                                                    title="<?php esc_html_e( 'Sticky z-index helps to set the stack order of the element. An element with greater stack order is always in front.', 'lhotse-sticky-sidebar' ); ?>"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label><?php esc_html_e( 'Sticky Opacity', 'lhotse-sticky-sidebar' ); ?></label>
                                                            </th>
                                                            <td>
                                                                <input type="number" min="0" max="1" step="0.1"
                                                                    name="lhotse_sticky_sidebar_options[sticky_sidebar_opacity]"
                                                                    id="sticky-opacity" class="color-opacity"
                                                                    data-alpha="true"
                                                                    value="<?php echo esc_attr( $settings['sticky_sidebar_opacity'] ); ?>" /><span
                                                                    class="dashicons dashicons-info tooltip"
                                                                    title="<?php esc_html_e( 'Sticky Opacity helps to set the  transparency-level, 1 is not transparent at all where as 0 is completely transparent.', 'lhotse-sticky-sidebar' ); ?>"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <label><?php esc_html_e( 'Font Size', 'lhotse-sticky-sidebar' ); ?></label>
                                                            </th>
                                                            <td>
                                                                <input type="number"
                                                                    name="lhotse_sticky_sidebar_options[sticky_sidebar_desktop_font_size]"
                                                                    id="sticky-sidebar-text-font-size"
                                                                    placeholder="12px"
                                                                    class="sticky-desktop-font-size numbers-only"
                                                                    value="<?php echo esc_attr( $settings['sticky_sidebar_desktop_font_size'] ); ?>" />
                                                                <span
                                                                    class="add-on"><?php esc_html_e( 'px', 'lhotse-sticky-sidebar' ); ?></span>
                                                                <span class="dashicons dashicons-info tooltip"
                                                                    title="<?php esc_html_e( 'Sets your desired font size to desktop menu text. Default is set to null, and takes theme\'s font size.', 'lhotse-sticky-sidebar' ); ?>"></span>
                                                            </td>
                                                        </tr>
                                                        </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <?php submit_button( esc_html__( 'Save Changes', 'lhotse-sticky-sidebar' ) ); ?>
                                            </div><!-- .option-container -->
                                        </form>
                                    </div>
                                    <!-- End sticky sidebar -->

                                </div><!-- .content -->
                            </div><!-- .header -->
                        </div><!-- content-wrapper -->
                    </div> <!-- Featured -->

                </div><!-- #ctp-switch -->
        </div>
        <!---dashboard---->
        <div id="dashboard" class="wplhotsetab nosave active">
            <?php require_once plugin_dir_path( dirname( __FILE__ ) ) . 'partials/dashboard-display.php';?>
        </div>
        </form><!-- sticky-main -->

        <!--Add notification bar sticky start form   -->
        <div id="notification-bar" class="wpcatchtab save">
            <div class="content-wrapper col-3">
                <div class="header">
                    <h3><?php esc_html_e( 'Notification Bar', 'lhotse-sticky-notification-bar' );?></h3>
                    <div class="content">
                        <?php if( isset($_GET['settings-updated']) ) { ?>

                        <?php } ?>
                        <?php // Use nonce for verification.
				wp_nonce_field( basename( __FILE__ ), 'lhotse_sticky_notification_bar_nounce' );
			?>
                        <div id="sticky_main">

                            <form method="post" action="options.php">
                                <?php settings_fields( 'lhotse-sticky-menu-group' ); ?>
                                <?php
					            $defaults =lhotse_sticky_notification_bar_default_options();
					            $settings = lhotse_sticky_notification_bar_get_options();
					?>
                                <div class="option-container">
                                    <table class="form-table">
                                        <tbody>
                                            <thead>
                                                <tr>
                                                    <th>Bar Settings</th>
                                                </tr>
                                            </thead>
                                            <tr>
                                                <th>
                                                    <label><?php esc_html_e( ' Position', 'lhotse-sticky-notification-bar' ); ?></label>
                                                </th>
                                                <td>
                                                    <label>

                                                        <input type="radio"
                                                            name="lhotse_sticky_notification_bar_options[sticky_desktop_notification_bar_position]"
                                                            id="sticky-desktop-notification-bar-position"
                                                            class="sticky-desktop-notificationbar-position" value="Top"
                                                             checked />
                                                        <?php _e("Top", 'lhotse-sticky-menu'); ?>
                                                    </label>
                                                    <label>

                                                        <input type="radio"
                                                            name="lhotse_sticky_notification_bar_options[sticky_desktop_notification_bar_position]"
                                                            id="sticky-desktop-notification-bar-position"
                                                            class="sticky-desktop-notification-bar-position"
                                                            value="Bottom" />
                                                        <?php _e("Bottom", 'lhotse-sticky-menu'); ?>
                                                    </label>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label><?php esc_html_e( 'Height', 'lhotse-sticky-notification-bar' ); ?></label>
                                                </th>
                                                <td>
                                                    <input type="number"
                                                        name="lhotse_sticky_notification_bar_options[sticky_notification_bar_desktop_height]"
                                                        id="sticky-notification-bar-height" placeholder="12px"
                                                        class="sticky-desktop-height numbers-only"
                                                        value="<?php echo esc_attr( $settings['sticky_notification_bar_desktop_height'] ); ?>" />
                                                    <span
                                                        class="add-on"><?php esc_html_e( 'px', 'lhotse-sticky-notification-bar' ); ?></span>
                                                    <span class="dashicons dashicons-info tooltip"
                                                        title="<?php esc_html_e( 'Sets your desired height size to Notification bar. Default is set to null, and takes theme\'s font size.', 'lhotse-sticky-notification-sidebar' ); ?>"></span>
                                                </td>
                                            </tr>
                                            <th>
                                                <label><?php esc_html_e( 'Notification Bar Background Color', 'lhotse-sticky-notification-bar' ); ?></label>
                                            </th>
                                            <td>
                                                <input type="text"
                                                    name="lhotse_sticky_notification_bar_options[sticky_notification_bar_background_color]"
                                                    id="sticky-notification-bar-background-color" class="color-picker"
                                                    data-alpha="true"
                                                    value="<?php echo esc_attr( $settings['sticky_notification_bar_background_color'] ); ?>" />
                                            </td>
                                            </tr>
                                            </tr>
                                            <th>
                                                <label><?php esc_html_e( 'Notification Bar Text Color', 'lhotse-sticky-notification-bar' ); ?></label>
                                            </th>

                                            <td>
                                                <input type="text"
                                                    name="lhotse_sticky_notification_bar_options[sticky_notification_bar_text_color]"
                                                    id="sticky-notification-bar-text-color" class="color-picker"
                                                    data-alpha="true"
                                                    value="<?php echo esc_attr( $settings['sticky_notification_bar_text_color'] ); ?>" />
                                            </td>
                                            </tr>


                                            <tr>
                                                <th>
                                                    <label><?php esc_html_e( 'Notfication Message', 'lhotse-sticky-notification-bar' ); ?></label>
                                                </th>
                                                <td>
                                                <input type="text" style="height: 100px; width: 50%;"
                                                        name="lhotse_sticky_notification_bar_options[sticky_notification_bar_message]"
                                                        id="sticky-notification-bar-message" placeholder="Enter Text Here"
                                                class="sticky-desktop-message"
                                                        value="<?php echo esc_attr( $settings['sticky_notification_bar_message'] ); ?>" />
                                                    <span class="dashicons dashicons-info tooltip"
                                                        title="<?php esc_html_e( 'Notification-bar helps to set the stack order of the element. An element with greater stack order is always in front.', 'lhotse-sticky-notification-bar' ); ?>"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label><?php esc_html_e( 'Bar Opacity', 'lhotse-sticky-notification-bar' ); ?></label>
                                                </th>
                                                <td>
                                                    <input type="number" min="0" max="1" step="0.1"
                                                        name="lhotse_sticky_notification_bar_options[sticky_notification_bar_opacity]"
                                                        id="sticky-opacity" class="color-opacity" data-alpha="true"
                                                        value="<?php echo esc_attr( $settings['sticky_notification_bar_opacity'] ); ?>" /><span
                                                        class="dashicons dashicons-info tooltip"
                                                        title="<?php esc_html_e( 'Bar Opacity helps to set the  transparency-level, 1 is not transparent at all where as 0 is completely transparent.', 'lhotse-sticky-notification-bar' ); ?>"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <label><?php esc_html_e( 'Font Size', 'lhotse-sticky-notification-bar' ); ?></label>
                                                </th>
                                                <td>
                                                    <input type="number"
                                                        name="lhotse_sticky_notification_bar_options[sticky_notification_bar_desktop_font_size]"
                                                        id="sticky-notification-bar-text-font-size" placeholder="12px"
                                                        class="sticky-desktop-font-size numbers-only"
                                                        value="<?php echo esc_attr( $settings['sticky_notification_bar_desktop_font_size'] ); ?>" />
                                                    <span
                                                        class="add-on"><?php esc_html_e( 'px', 'lhotse-sticky-notification-bar' ); ?></span>
                                                    <span class="dashicons dashicons-info tooltip"
                                                        title="<?php esc_html_e( 'Sets your desired font size to desktop menu text. Default is set to null, and takes theme\'s font size.', 'lhotse-sticky-notification-bar' ); ?>"></span>
                                                </td>
                                            </tr>
                                            </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <?php submit_button( esc_html__( 'Save Changes', 'lhotse-sticky-notification-bar' ) ); ?>
                                </div><!-- .option-container -->

                            </form>
                        </div>
                        <!-- End sticky sidebar -->

                    </div><!-- .content -->
                </div><!-- .header -->
            </div><!-- content-wrapper -->
        </div>
        <!-- Featured -->

    </div><!-- #ctp-switch -->
</div>
<!---dashboard---->
<div id="dashboard" class="wplhotsetab nosave active">
    <?php require_once plugin_dir_path( dirname( __FILE__ ) ) . 'partials/dashboard-display.php';?>
</div>
</form><!-- sticky-main -->



</div><!-- .lhotsep_widget_settings -->
</div><!-- .wrap -->