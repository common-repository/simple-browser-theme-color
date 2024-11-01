<?php

	defined( 'ABSPATH' ) || exit;

	/**
	 * Browser Theme Color Header Class
	 *
	 * This class handles header.
	 *
	 * @class    SBTC_Header
	 * @since    1.0.0
	 * @version  1.0.0
	 * @category Class
	 * @author   Christoph Weßels
	 */

	class SBTC_Header {

		function __construct() {
			$this->SBTC_addHeader();
		}



		/**
		 * Method to add theme-color tag to header.
		 *
		 * @since 1.0.0
		 */
		public function SBTC_addHeader() {
			add_action( 'wp_head', 'SBTC_renderHeader' );

			function SBTC_renderHeader() {
				echo '<!-- wessels-browser-theme -->';
				echo '<meta name="theme-color" content="'. SBTC_Settings::SBTC_get_color() .'">';
				echo '<meta name="msapplication-navbutton-color" content="'. SBTC_Settings::SBTC_get_color() .'">';
				echo '<meta name="apple-mobile-web-app-capable" content="yes">';
				echo '<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">';
			}
		}

	}

	new SBTC_Header();

?>