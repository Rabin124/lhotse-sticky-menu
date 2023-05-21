<?php
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
			  			<table class="form-table">
							<tbody>
								<tr>
									<th>
										<label><?php esc_html_e( ' Menu Selector', 'lhotse-sticky-menu' ); ?></label>
									</th>
									<td>
										<input type="text" name="lhotse_sticky_menu_options[sticky_desktop_menu_selector]" id="sticky-desktop-menu-selector" class="sticky-desktop-menu-selector"  value="<?php echo esc_attr($settings['sticky_desktop_menu_selector']); ?>"/>
										<span class="dashicons dashicons-info tooltip" title="<?php esc_html_e( 'Sticky Menu will be displayed just before this selector.', 'lhotse-sticky-menu' ); ?>"></span>
									</td>
									</tr>
									<th>
					  					<label><?php esc_html_e( 'Sticky Background Color', 'lhotse-sticky-menu' ); ?></label>
									</th>
									<td>
								  		<input type="text" name="lhotse_sticky_menu_options[sticky_background_color]" id="sticky-background-color" class="color-picker" data-alpha="true" value="<?php echo esc_attr( $settings['sticky_background_color'] ); ?>"/>
									</td>
				  				</tr>
				  				</tr>
									<th>
					  					<label><?php esc_html_e( 'Sticky Menu Text Color', 'lhotse-sticky-menu' ); ?></label>
									</th>
									<td>
								  		<input type="text" name="lhotse_sticky_menu_options[sticky_text_color]" id="sticky-text-color" class="color-picker" data-alpha="true" value="<?php echo esc_attr( $settings['sticky_text_color'] ); ?>"/>
									</td>
				  				</tr>					
								<tr>
									<th>
					  					<label><?php esc_html_e( 'Sticky Z index', 'lhotse-sticky-menu' ); ?></label>
									</th>
									<td>
								  		<input type="number"min="-100" max="2147483647" step="1"  name="lhotse_sticky_menu_options[sticky_z_index]" id="sticky-z-index" class="color-z-index" data-alpha="true" value="<?php echo esc_attr( $settings['sticky_z_index'] ); ?>"/><span class="dashicons dashicons-info tooltip" title="<?php esc_html_e( 'Sticky z-index helps to set the stack order of the element. An element with greater stack order is always in front.', 'lhotse-sticky-menu' ); ?>"></span>
									</td>
				  				</tr>
				  				<tr>
									<th>
					  					<label><?php esc_html_e( 'Sticky Opacity', 'lhotse-sticky-menu' ); ?></label>
									</th>
									<td>
								  		<input type="number" min="0" max="1" step="0.1"   name="lhotse_sticky_menu_options[sticky_opacity]" id="sticky-opacity" class="color-opacity" data-alpha="true" value="<?php echo esc_attr( $settings['sticky_opacity'] ); ?>"/><span class="dashicons dashicons-info tooltip" title="<?php esc_html_e( 'Sticky Opacity helps to set the  transparency-level, 1 is not transparent at all where as 0 is completely transparent.', 'lhotse-sticky-menu' ); ?>"></span>
									</td>
				  				</tr>
				  				<tr>
									<th>
										<label><?php esc_html_e( 'Font Size', 'lhotse-sticky-menu' ); ?></label>
									</th>
									<td>
										<input type="number" name="lhotse_sticky_menu_options[sticky_desktop_font_size]" id="sticky-text-font-size" placeholder="12px" class="sticky-desktop-font-size numbers-only" value="<?php echo esc_attr( $settings['sticky_desktop_font_size'] ); ?>"/>
										<span class="add-on"><?php esc_html_e( 'px', 'lhotse-sticky-menu' ); ?></span>
										<span class="dashicons dashicons-info tooltip" title="<?php esc_html_e( 'Sets your desired font size to desktop menu text. Default is set to null, and takes theme\'s font size.', 'lhotse-sticky-menu' ); ?>"></span>
									</td>
								</tr>
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
