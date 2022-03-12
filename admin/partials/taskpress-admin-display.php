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
<p class="gray-light" style="text-align: center;">v.0.1 Alpha</p>

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

</script>
<div class="card-container">
	<div style="display: flex;">
		<div class="menu-card active" id="create-task-button" onClick="return showCreateTasks();" style="margin-right: 10px;">
			<h3>Create a task</h3>
			<p>Share a task with your web developer instantly</p>
		</div>
		<div class="menu-card" onClick="return showActiveTasks();" id="active-tasks-button" style="margin-left: 10px;">
			<h3>View all tasks</h3>
			<p>View the tasks you have shared with your developer</p>
		</div>
	</div>
	<div class="create-task-container" id="create-task">
		<form action="" method="POST">
			<div style="display: flex; margin-bottom: 30px;">
				<div class="title">
			  		<input type="text" name="title" placeholder="Title">
			  	</div>
			  	<div class="due-date">
			  		<input type="text" name="due_date" placeholder="Due date">
			  	</div>
			</div>

			<div class="problem">
				<textarea name="problem" placeholder="Write about what you need help with..."></textarea>
			</div>

		  <input type="submit" value="Send!" name="submit" class="submit">
		</form>
	</div>



	<div class="active-tasks-container" id="active-tasks">
		
		<div class="col-6">
			
			<h2>Tasks yet to be done</h2>
			
			<div class="task-element">
				<div class="task-heading" onclick="$('#task-1').slideToggle();">
					<i class="fa fa-check circle-icon bg-gray"></i> 
					Contact Oleg 😎
					<i class="fa fa-chevron-down task-arrow"></i>
				</div>
				<div class="task-info" id="task-1">
					Ask how the plugin development is going!
				</div>
			</div>
			<div class="task-element">
				<div class="task-heading" onclick="$('#task-2').slideToggle();">
					<i class="fa fa-check circle-icon bg-gray"></i> 
					Need to update plugins
					<i class="fa fa-chevron-down task-arrow"></i>
				</div>
				<div class="task-info" id="task-2">
					I really need to update all my plugins since last updates were two months ago.
				</div>
			</div>
			<div class="task-element">
				<div class="task-heading" onclick="$('#task-3').slideToggle();">
					<i class="fa fa-check circle-icon bg-gray"></i> 
					Add new language to site
					<i class="fa fa-chevron-down task-arrow"></i>
				</div>
				<div class="task-info" id="task-3">
					Add German language to website. All content will be the same. The texts are in drive:
					<a href="#" target="_blank">https://drive.google.com</a>
				</div>
			</div>
			<div class="task-element">
				<div class="task-heading" onclick="$('#task-4').slideToggle();">
					<i class="fa fa-check circle-icon bg-gray"></i> 
					Delete page Contact on landing page where all things are.
					<i class="fa fa-chevron-down task-arrow"></i>
				</div>
				<div class="task-info" id="task-4">
					
				</div>
			</div>



		</div>
		<div class="col-6">
		
		<h2>Done tasks</h2>

			<div class="task-element">
				<div class="task-heading" onclick="$('#done-1').slideToggle();">
					<i class="fa fa-check circle-icon bg-green"></i> 
					Need to update plugins
					<i class="fa fa-chevron-down task-arrow"></i>
				</div>
				<div class="task-info" id="done-1">
					I really need to update all my plugins since last updates were two months ago.
				</div>
			</div>
			<div class="task-element">
				<div class="task-heading" onclick="$('#done-2').slideToggle();">
					<i class="fa fa-check circle-icon bg-green"></i> 
					Add new language to site
					<i class="fa fa-chevron-down task-arrow"></i>
				</div>
				<div class="task-info" id="done-2">
					Add German language to website. All content will be the same. The texts are in drive:
					<a href="#" target="_blank">https://drive.google.com</a>
				</div>
			</div>
			<div class="task-element">
				<div class="task-heading" onclick="$('#done-3').slideToggle();">
					<i class="fa fa-check circle-icon bg-green"></i> 
					Delete page Contact on landing page where all things are.
					<i class="fa fa-chevron-down task-arrow"></i>
				</div>
				<div class="task-info" id="done-3">
					
				</div>
			</div>

		</div>


	</div>





</div>


</div>