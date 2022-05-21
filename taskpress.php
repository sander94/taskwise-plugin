<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              taskpress
 * @since             1.0.0
 * @package           TaskPress_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       TaskPress
 * Plugin URI:        taskpress.io
 * Description:       TaskPress is the WordPress plugin for taskwise.io.
 * Version:           1.0.0
 * Author:            TaskPress
 * Author URI:        taskpress.io
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       taskpress.io
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'TASKPRESS_PLUGIN_VERSION', 'v.0.2 Alpha' );

/**
 * The option key to store the API key for the customer
 */
define( 'TASKPRESS_PLUGIN_API_KEY_OPTION_KEY', 'TaskPress_API_Key' );

/**
 * The option key to store the API key for the customer
 */
define( 'TASKWISE_SERVER_URL', 'https://portal.taskwise.io/api/tasks' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-taskpress-activator.php
 */
function activate_taskpress_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-taskpress-activator.php';
	TaskPress_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-taskpress-deactivator.php
 */
function deactivate_taskpress_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-taskpress-deactivator.php';
	TaskPress_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_taskpress_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_taskpress_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-taskpress.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_taskpress_plugin() {

	$plugin = new TaskPress();
	$plugin->run();

}
run_taskpress_plugin();
