<?php

/**
 * Fired during plugin activation
 *
 * @link       taskpress
 * @since      1.0.0
 *
 * @package    TaskPress_Plugin
 * @subpackage TaskPress_Plugin/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    TaskPress_Plugin
 * @subpackage TaskPress_Plugin/includes
 * @author     Devsupport.ee <help@devsupport.ee>
 */
class TaskPress_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		delete_option( TASKPRESS_PLUGIN_API_KEY_OPTION_KEY );
	}

}
