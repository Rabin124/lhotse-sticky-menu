<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link      https://lhotseplugins.com/plugins
 * @since      1.0.0
 *
 * @package    Lhotse_Sticky_Menu
 * @subpackage Lhotse_Sticky_MenuS/admin/partials
 */
?>

<div id="lhotse-sticky-menu">
	<div class="content-wrapper">
		<div class="header">
			<h2><?php esc_html_e( 'Settings', 'lhotse-sticky-menu' ); ?></h2>
		</div> <!-- .Header -->
		<div class="content">
			<?php if( isset($_GET['settings-updated']) ) { ?>
			<div id="message" class="notice updated fade">
		  		<p><strong><?php esc_html_e( 'Plugin Options Saved.', 'lhotse-sticky-menu' ) ?></strong></p>
		  	</div>
			<?php } ?>
			<?php // Use nonce for verification.
				wp_nonce_field( basename( __FILE__ ), 'lhotse_sticky_menu_nounce' );
			?>
			<div id="sticky_main">
				<form method="post" action="options.php">
					<?php settings_fields( 'lhotse-sticky-menu-group' ); ?>
					<?php
					$defaults =lhotse_sticky_menu_default_options();
					$settings = lhotse_sticky_menu_get_options();
					?>
					<div class="option-container">
			  			<table class="form-table" bgcolor="white">
							<tbody>
								<tr>
									<th>
										<label><?php esc_html_e( ' Desktop Menu Selector', 'lhotse-sticky-menu' ); ?></label>
									</th>
									<td>
										<input type="text" name="lhotse_sticky_menu_options[sticky_desktop_menu_selector]" id="sticky-desktop-menu-selector" class="sticky-desktop-menu-selector"  value="<?php echo esc_attr($settings['sticky_desktop_menu_selector']); ?>"/>
										<span class="dashicons dashicons-info tooltip" title="<?php esc_html_e( 'Sticky Menu will be displayed just before this selector.', 'lhotse-sticky-menu' ); ?>"></span>
									</td>
								</tr>								
							</tbody>
						</table>
						<?php submit_button( esc_html__( 'Save Changes', 'lhotse-sticky-menu' ) ); ?>
					</div><!-- .option-container -->
				</form>
			</div><!-- sticky_main -->
		</div><!-- .content -->
	</div><!-- .content-wrapper -->
</div><!---lhotse-sticky-menu-->
