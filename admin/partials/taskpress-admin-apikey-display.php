<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       taskpress
 * @since      1.0.0
 *
 * @package    TaskPress_Plugin
 * @subpackage TaskPress_Plugin/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap plugin-container">
<h1>Website Support</h1>
<p class="gray-light" style="text-align: center;">v.0.1 Alpha</p>


<div class="card-container">
	<div class="create-task-container enter-api">
		<h3 class="enter-key-title">Enter your license key to start using this plugin</h3>
		<form action="" method="POST">
			<div style="display: flex;">
				<div class="enter-api key">
			  		<input type="text" name="title" placeholder="License key code">
			  	</div>
			</div>
			<div class="wrong-key">This license key is invalid</div>
		  <input type="submit" value="Activate plugin" name="submit" class="submit">
		</form>
	</div>









</div>


</div>