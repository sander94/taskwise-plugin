<?php

/**
 * Fired during plugin deactivation
 *
 * @link       taskpress
 * @since      1.0.0
 *
 * @package    TaskPress_Plugin
 * @subpackage TaskPress_Plugin/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    TaskPress_Plugin
 * @subpackage TaskPress_Plugin/includes
 * @author     Devsupport.ee <help@devsupport.ee>
 */
class TaskPress_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		delete_option( TASKPRESS_PLUGIN_API_KEY_OPTION_KEY );
	}
}
