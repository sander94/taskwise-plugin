<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       taskpress
 * @since      1.0.0
 *
 * @package    TaskPress_Plugin
 * @subpackage TaskPress_Plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    TaskPress_Plugin
 * @subpackage TaskPress_Plugin/admin
 * @author     Sander Jürgens <sanderjyrgens@gmail.com>
 */
class TaskPress_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	private $api_key;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
		$this->api_key     = get_option(TASKPRESS_PLUGIN_API_KEY_OPTION_KEY);
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in TaskPress_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The TaskPress_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/taskpress-admin.css', array(), $this->version, 'all' );
		$wp_scripts = wp_scripts();

		wp_enqueue_style('plugin_name-admin-ui-css',
			'http://ajax.googleapis.com/ajax/libs/jqueryui/' . $wp_scripts->registered['jquery-ui-core']->ver . '/themes/smoothness/jquery-ui.css',
			false,
			TASKPRESS_PLUGIN_VERSION,
			false);
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in TaskPress_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The TaskPress_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/taskpress-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-datepicker');
	}

	public function add_menu()
    {
        add_menu_page( "TaskWise", "TaskWise", 'manage_options', $this->plugin_name, array( $this, 'task_wise_page' ));
    }

	public function task_wise_page() {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$post_result = $this->task_wise_admin_form_post_actions();
		}
		
		if (!$this->api_key) {
			$this->task_wise_api_key_page();
			return;
		}

		$tasks = $this->task_wise_get_tasks();

		if ($tasks === null) {
			$this->task_wise_api_key_page(true);
			return;
		}

		$counts = $this->task_wise_get_counts($tasks);

		include( plugin_dir_path( __FILE__ ) . '/partials/taskpress-admin-display.php' );
    }

	public function task_wise_api_key_page( $is_error = false ) {
		$api_key = $this->api_key;

        include( plugin_dir_path( __FILE__ ) . '/partials/taskpress-admin-apikey-display.php' );
    }

	public function task_wise_admin_form_post_actions()
	{
		if (!isset($_POST['taskwise_action'])) {
			return;
		}

		switch ($_POST['taskwise_action']) {
			case 'save_licence_key':
				return $this->task_wise_save_api_key();
			case 'create_task':
				return $this->task_wise_create_task();
		}
	}

	public function task_wise_create_task()
	{
		if (
			!empty($_POST['title']) &&
			!empty($_POST['problem'])
		) {
			$_POST    = array_map( 'stripslashes_deep', $_POST );
			$title    = $_POST['title'];
			$due_date = $_POST['due_date'];
			$problem  = $_POST['problem'];
			$url      = TASKWISE_SERVER_URL . '?api_token=' . $this->api_key;
			$client   = new WP_Http();
			
			try {
				$result  = $client->post(
					$url,
					array(
						'sslverify' => false,
						'headers' => array(
							'Content-Type'  => 'application/json',
							'Accept'        => 'application/json'
						),
						'body' => json_encode(
							array(
								'title'       => $title,
								'due_date'    => $due_date,
								'description' => $problem
							)
						)
					)
				);

				if ($result instanceof WP_Error) {
					return false;
				}

				if ($result['response']['code'] == 201) {
					return true;
				}

				return false;
			} catch (Exception $e) {
				return false;
			}
		}

		return false;
	}

	public function task_wise_get_tasks()
	{
		$url    = TASKWISE_SERVER_URL . '?api_token=' . $this->api_key;
		$client = new WP_Http();
		$error  = null;
		$tasks  = array();

		try {	
			$result  = $client->get(
				$url,
				array(
					'sslverify' => false,
					'headers' => array(
						'Content-Type'  => 'application/json',
						'Accept'        => 'application/json'
					)
				)
			);

			if ($result instanceof WP_Error) {
				return array();
			}

			if ($result['response']['code'] == 200) {
				$tasks = json_decode($result['body'])->data;
			} else {
				if ($result['response']['code'] == 401) {
					return null;
				}

				return array();
			}
		} catch (Exception $e) {
			return array();
		}

		return $tasks;
	}

	public function task_wise_get_counts($tasks)
	{
		$counts = array(
			'ongoing' => 0,
			'done'    => 0
		);

		foreach ($tasks as $task) {
			if ($task->task_status_id != 3) {
				$counts['ongoing']++;
			} else {
				$counts['done']++;
			}
		}

		return $counts;
	}

	public function task_wise_save_api_key()
	{
		// Needs refactor about the return values
		if ( !empty( $_POST['licence_key'] ) ) {
			if( get_option( TASKPRESS_PLUGIN_API_KEY_OPTION_KEY ) ){
				update_option( TASKPRESS_PLUGIN_API_KEY_OPTION_KEY, $_POST['licence_key'] );
		   	} else {
				add_option( TASKPRESS_PLUGIN_API_KEY_OPTION_KEY, $_POST['licence_key'] );
		   	}

			$this->api_key = get_option(TASKPRESS_PLUGIN_API_KEY_OPTION_KEY);
			
			return true;
		}

		return false;
	}
}
