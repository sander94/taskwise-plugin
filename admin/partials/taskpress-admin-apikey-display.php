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
	<h1>TaskWise Website Support</h1>
	<p class="gray-light" style="text-align: center;"><?php echo TASKPRESS_PLUGIN_VERSION;?></p>
	<div class="card-container">
		<div class="create-task-container enter-api">
			<h3 class="enter-key-title">Enter your license key to start using this plugin</h3>
			<form action="" method="POST">
				<input type="hidden" name="taskwise_action" value="save_licence_key" />
				<div style="display: flex;">
					<div class="enter-api key">
						<input type="text" name="licence_key" placeholder="License key code" value="<?=$api_key?>">
					</div>
				</div>
				<?php if ($is_error) {?>
				<div class="wrong-key">This license key is invalid</div>
				<?php } ?>
			<input type="submit" value="Activate plugin" name="submit" class="submit">
			</form>
		</div>
	</div>
</div>
