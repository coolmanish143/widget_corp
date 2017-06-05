<?php require_once("../includes/session.php"); ?>
    <?php require_once("../includes/db_connection.php"); ?>
     <?php require_once("../includes/functions.php"); ?>
	 <?php require_once("../includes/validation_function.php"); ?>
	 
	 
	 <?php $layout_context="admin"; ?>
<?php include("../includes/layout/header.php"); ?>
<?php find_selected_page(); ?>
<table id="structure">
	<tr>
		<td id="navigation">
			<?php echo navigation($current_subject, $current_page); ?>
		</td>
		<td id="page">
		<?php echo message(); ?>
			  <?php $errors=errors(); ?>
			  <?php  echo form_errors($errors); ?>
			<h2>Add Subject</h2>
			<form action="create_subject.php" method="post">
				<p>Menu name: 
					<input type="text" name="menu_name" value="" id="menu_name" />
				</p>
				<p>Position: 
					<select name="position">
					<?php
					       $subject_set = find_all_subjects();
							$subject_count = mysqli_num_rows($subject_set);
							// $subject_count + 1 b/c we are adding a subject
							
					for($count=1; $count <= ($subject_count+1); $count++) {
				echo "<option value=\"{$count}\">{$count}</option>";
					}
					?>
					</select>
				</p>
				<p>Visible: 
					<input type="radio" name="visible" value="0" /> No
					&nbsp;
					<input type="radio" name="visible" value="1" /> Yes
				</p>
				<input type="submit" name="submit" value="create Subject" />
			</form>
			<br />
			<!--a href="manage_content.php">Cancel</a-->
		</td>
	</tr>
</table>

<?php require("../includes/layout/footer.php"); ?>
