<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       devsupportee
 * @since      1.0.0
 *
 * @package    Devsupportee_Plugin
 * @subpackage Devsupportee_Plugin/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Devsupportee_Plugin
 * @subpackage Devsupportee_Plugin/includes
 * @author     Devsupport.ee <help@devsupport.ee>
 */
class Devsupportee_Plugin_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'devsupportee-plugin',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
