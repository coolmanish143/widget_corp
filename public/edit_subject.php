   <?php require_once("../includes/session.php"); ?>
    <?php require_once("../includes/db_connection.php"); ?>
     <?php require_once("../includes/functions.php"); ?>
	 <?php include("../includes/validation_function.php"); ?>
	
<?php find_selected_page(); ?>
<?php
if(!$current_subject)
{
	redirect_to("manage_content.php");
}
?>

<?php
if(isset($_POST['submit']))
{	
	//validations
	  $required_fields = array("menu_name", "position", "visible");
	  validate_presences($required_fields);
	  
	  $fields_with_max_lengths = array("menu_name" => 30);
	  validate_max_lengths($fields_with_max_lengths);
	  
	  
	if (empty($errors)) {
	//perform update
	$id=$current_subject["id"];
	$menu_name = mysql_prep($_POST['menu_name']);
	$position = mysql_prep((int)$_POST['position']);
	$visible = mysql_prep((int)$_POST['visible']);
 	 
		$query = " update subjects SET";
		$query .=" menu_name= '{$menu_name}',";
		$query .=" position={$position}, ";
		$query .= " visible= {$visible} ";
		$query .="where id={$id}";
		$query .="limit 1";
		
	$result= mysqli_query($connection,$query);
	
		  if($result && mysqli_affected_rows($connection)==1)
		  {  //success
	      $_SESSION["$message"]="subject updated.";
			redirect_to("manage_content.php");
		  }
		  else
		  {
			  //failure
			  $message="subject creation failed";

		  }
	}
}
else{
	//This is probably a GET request
}
//this is ending of submit
?>

<?php $layout_context="admin"; ?>
<?php include("../includes/layout/header.php"); ?>

<table id="structure">
	<tr>
		<td id="navigation">
			<?php echo navigation($current_subject, $current_page); ?>
		</td>
		<td id="page">
			
			<?php if (!empty($message)) {
				echo "<p class=\"message\">" . $message . "</p>";
			} ?>
			<?php
			echo form_errors($errors);
			?>
				
				<h2>Edit Subject: <?php echo $current_subject['menu_name']; ?> </h2>
		
	
			<form action="edit_subject.php?subj=<?php echo urlencode($current_subject['id']); ?>" method="post">
				<p>Subject name: 
					<input type="text" name="menu_name" value="<?php echo $current_subject['menu_name']; ?>" id="menu_name" />
				</p>
				<p>Position: 
					<select name="position">
						<?php
					       $subject_set = find_all_subjects(false);
							$subject_count = mysqli_num_rows($subject_set);
							// $subject_count + 1 b/c we are adding a subject
							
					for($count=1; $count <= ($subject_count+1); $count++) {
				echo "<option value=\"{$count}\">{$count}</option>";
					}
						?>
					</select>
				</p>
				<p>Visible: 
					<input type="radio" name="visible" value="0"<?php 
					if ($current_subject['visible'] == 0) { echo " checked"; } 
					?> /> No
					&nbsp;
					<input type="radio" name="visible" value="1"<?php 
					if ($current_subject['visible'] == 1) { echo " checked"; } 
					?> /> Yes
				</p>
				<input type="submit" name="submit" value="Edit Subject" />
				
			</form>
			<br />
			<a href="manage_content.php">Cancel</a>
	         &nbsp;
			 &nbsp;
<a href="delete_subject.php?subject=<?php echo urlencode($current_subject['id']); ?>" onclick="return confirm('Are you sure?');">Delete Subject</a>
		
		</td>
		
	</tr>
</table>
<?php require("..includes/layout/footer.php"); ?>