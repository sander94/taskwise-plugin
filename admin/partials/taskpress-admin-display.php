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
	<script>
		function showCreateTasks() {
			document.getElementById('active-tasks').style.display = 'none';
			document.getElementById('create-task').style.display = 'block';
			document.getElementById('create-task-button').classList.add('active');
			document.getElementById('active-tasks-button').classList.remove('active');
		}

		function showActiveTasks() {
			document.getElementById('active-tasks').style.display = 'block';
			document.getElementById('create-task').style.display = 'none';
			document.getElementById('active-tasks-button').classList.add('active');
			document.getElementById('create-task-button').classList.remove('active');
		}

		function taskSlideToggle(id) {
			jQuery(id).slideToggle();
		}
	</script>
	<div class="card-container">
		<div style="display: flex;">
			<div class="menu-card active" id="create-task-button" onClick="return showCreateTasks();" style="margin-right: 10px;">
				<h3>Create a task</h3>
				<p>Share a task with your web developer instantly</p>
			</div>
			<div class="menu-card" onClick="return showActiveTasks();" id="active-tasks-button" style="margin-left: 10px;">
				<h3>View all tasks <?php if (count($tasks)) echo '(' . count($tasks) . ')'; ?></h3>
				<p>View the tasks you have shared with your developer</p>
			</div>
		</div>
		<div class="create-task-container" id="create-task">
			<form action="" method="POST">
				<input type="hidden" name="taskwise_action" value="create_task" />
				<div style="display: flex; margin-bottom: 30px;">
					<div class="title">
						<input type="text" name="title" placeholder="Title" required>
					</div>
					<div class="due-date">
						<input type="text" name="due_date" placeholder="Due date">
					</div>
				</div>

				<div class="problem">
					<textarea name="problem" placeholder="Write about what you need help with..." required></textarea>
				</div>

			<input type="submit" value="Send!" name="submit" class="submit">
			</form>
		</div>
		<div class="active-tasks-container" id="active-tasks">
			<div class="col-6">
				<h2>Tasks yet to be done</h2>
				<?php foreach ($tasks as $task) { 
					if ($task->task_status_id == 3) continue;
				?>
				<div class="task-element">
					<div class="task-heading" onclick="taskSlideToggle('#task-<?=$task->id?>')">
						<i class="fa fa-check circle-icon bg-gray"></i> 
						<?=$task->title?>
						<i class="fa fa-chevron-down task-arrow"></i>
					</div>
					<div class="task-info" id="task-<?=$task->id?>">
						<?=$task->title?>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="col-6">
				<h2>Done tasks</h2>
				<?php foreach ($tasks as $task) {
					if ($task->task_status_id != 3) continue;
				?>
				<div class="task-element">
					<div class="task-heading" onclick="taskSlideToggle('#done-<?=$task->id?>')">
						<i class="fa fa-check circle-icon bg-green"></i> 
						<?=$task->title?>
						<i class="fa fa-chevron-down task-arrow"></i>
					</div>
					<div class="task-info" id="done-<?=$task->id?>">
						<?=$task->title?>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>