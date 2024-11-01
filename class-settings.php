<?php

	defined( 'ABSPATH' ) || exit;

	/**
	 * Browser Theme Color Settings Class
	 *
	 * This class handles settings.
	 *
	 * @class    SBTC_Settings
	 * @since    1.0.0
	 * @version  1.0.0
	 * @category Class
	 * @author   Christoph Weßels
	 */

	class SBTC_Settings {

		function __construct() {
			$this->SBTC_addSettingsPage();
		}



		/**
		 * Method to add settings page.
		 *
		 * @since 1.0.0
		 */
		public function SBTC_addSettingsPage() {
			add_action( 'admin_menu', 'SBTC_renderSettingsPage' );

			function SBTC_renderSettingsPage() {
				add_options_page(
					__('Browser Theme Color', 'wessels-browser-theme'),
					__('Browser Theme Color', 'wessels-browser-theme'),
					'manage_options',
					'wessels_browser_theme_settings',
					'SBTC_settings_page'
				);
			}


			/**
			* Method to change theme color and render settings page.
			*
			* @since 1.0.0
			*/
			function SBTC_settings_page() {
				if ( isset( $_POST['sbtc_nonce_theme_color_field'] ) || wp_verify_nonce( $_POST['sbtc_nonce_theme_color_field'], 'sbtc_nonce_theme_color_action' )) {
					if ( isset($_POST['theme-color'])) {
						update_option( 'browser_theme_color', sanitize_hex_color( $_POST['theme-color'] ));
					}
				}

				?>
				<div class="notice"><p>Thanks for using "Simple Browser Theme Color" by <a href="https://christophwessels.com" target="_BLANK">Christoph Weßels</a>!</p></div>

				<div class="settings-box" style="background: #ffffff; max-width: 300px; padding: 10px 20px 20px 20px; margin: 15px; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24); transition: all 0.3s cubic-bezier(.25,.8,.25,1);">
					<h3><span class="dashicons dashicons-admin-appearance"></span> Change Browser Theme Color</h3>
					<form method="POST">
						<?php wp_nonce_field( 'sbtc_nonce_theme_color_action', 'sbtc_nonce_theme_color_field' ); ?>
						<input type="text" class="theme-color-input" name="theme-color" value="<?php echo SBTC_Settings::SBTC_get_color(); ?>">
						<input type="submit" class="button button-primary" name="submit" value="Save Changes">
					</form>
				</div>
				<?php

			}
		}



		/**
		 * Method to get theme color.
		 *
		 * @since 1.0.0
		 */
		function SBTC_get_color() {
			return ( get_option('browser_theme_color') );
		}
	}

	new SBTC_Settings();

?>