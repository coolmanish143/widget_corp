<?php require_once("../includes/session.php"); ?>
    <?php require_once("../includes/db_connection.php"); ?>
     <?php require_once("../includes/functions.php"); ?>
	 <?php require_once("../includes/validation_function.php"); ?>
	 
	 <?php find_selected_page(); ?>
	 <?php if(!current_subject)
	 {
		 redirect_to("manage_content.php");
	 }
<?php if(isset($_POST['submit']))
{
	//validations
	  $required_fields = array("menu_name", "position", "visible","content");
	  $errors = validate_presences($required_fields);
	  
	  $fields_with_max_lengths = array("menu_name" => 30);
	  $errors = validate_max_lengths($fields_with_max_lengths);
	  if(empty($errors)
	  {
		  //perform create
		  $subject_id=$current_subject["id"];
		  $menu_name=mysql_prep($_POST["menu_name"]);
	     $position = mysql_prep($_POST['position']);
	      $visible = mysql_prep($_POST['visible']);
		  
		  $content=mysql_prep($_POST['content']));
		  
		  
		  $query = " insert into pages (";
		$query .=" subject_id, menu_name,position,visible,content";
		$query .= ") values (";
		$query .= "  {$subject_id},'{$menu_name}',{$position},{$visible},'{$content}'";
		$query .=")";
		
		
		$result= mysqli_query($connection,$query);
		  if($result)
		  {  //success
	      $_SESSION["$message"]="page created.";
			redirect_to("manage_content.php?subject=".urlencode($current_subject["id"]));
		  }
		  else
		  {
			  //failure
			  $_SESSION["$message"]="page creation failed";
		      
		  }
	  }
	
}
else{
	//This is probably a GET request
}
	?>
	<?php $layout_context="admin"; ?>
	<?php require_once("../includes/layout/functions.php"); ?>
	
<table id="structure">
	<tr>
		<td id="navigation">
			<?php echo navigation($current_subject, $current_page); ?>
		</td>
		<td id="page">
		<?php echo message(); ?>
			  <?php $errors=errors(); ?>
			  <?php  echo form_errors($errors); ?>
			<h2>create page</h2>
			<form action="new_page.php?subject=<?php echo urlencode ($current_subject["id"]);?>" method="post">
				<p>Menu name: 
					<input type="text" name="menu_name" value="" id="menu_name" />
				</p>
				<p>Position: 
					<select name="position">
					<?php
					      $page_set = find_pages_for_subjects($current_subject["id"]);
							$page_count = mysqli_num_rows($page_set);
							// $page_count + 1 b/c we are adding a page
							
					for($count=1; $count <= ($page_count+1); $count++) {
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
				<p>content:<br />
				<textarea name="content" rows="20" cols="80"></textarea>
				</p>
				<input type="submit" name="submit" value="create page" />
			</form>
			<br />
			<a href="manage_content.php?subject=<?php echo urlencode($current_subject["id"]); ?>">cancel</a>
		</td>
	</tr>
</table>
 <?php include("../includes/layout/footer.php"); ?>
	
	

	
	
		  


<?php require("../includes/layout/footer.php"); ?>
