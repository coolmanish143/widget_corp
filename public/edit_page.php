<<?php require_once("../includes/session.php"); ?>
    <?php require_once("../includes/db_connection.php"); ?>
     <?php require_once("../includes/functions.php"); ?>
	  
	  <?php include("../includes/validation_function.php"); ?>
	  
<?php find_selected_page(); ?>
<?php 
if(!$current_page)
{
	redirect_to("manage_content.php");
}
?>
<?php 
if(isset($_POST['submit']))

	//process the form
		  $id=$current_page["id"];
		  $menu_name=mysql_prep($_POST["menu_name"]);
	     $position = mysql_prep($_POST['position']);
	      $visible = mysql_prep($_POST['visible']);
		  
		  $content=mysql_prep($_POST['content']));
		
   //validation_function
 $required_fields = array("menu_name", "position", "visible","content");
	  $errors = validate_presences($required_fields);
	  
	  $fields_with_max_lengths = array("menu_name" => 30);
	  $errors = validate_max_lengths($fields_with_max_lengths);
	  if(empty($errors)
	  {
		  //perform update 
		 $query = " update subjects SET";
		$query .=" menu_name= '{$menu_name}',";
		$query .=" position={$position}, ";
		$query .= " visible= {$visible}, ";
		$query .= " content= '{$content}' ";
		$query .="where id={$id}";
		$query .="limit 1";
		
		$result= mysqli_query($connection,$query);
	
		  if($result && mysqli_affected_rows($connection)==1)
		  {  //success
	      $_SESSION["$message"]="page updated.";
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
		<?php echo message(); ?>
			  <?php $errors=errors(); ?>
			  <?php  echo form_errors($errors); ?>
			<h2>edit page:<?php echo htmlentities($current_page["menu_name"]);?>"</h2>
			<form action="edit_page.php?page=<?php echo htmlentities($current_page["id"]);?>" method="post">
				<p>Menu name: 
					<input type="text" name="menu_name" value="<?php echo htmlentities($current_page["menu_name"]);?>" />
				</p>
				<p>Position: 
					<select name="position">
					<?php
					      $page_set = find_pages_for_subjects($current_subject["id"]);
							$page_count = mysqli_num_rows($page_set);
							// $page_count + 1 b/c we are adding a page
							
					for($count=1; $count <= ($page_count+1); $count++) {
				echo "<option value=\"{$count}\"";
				if($current_page["position"] == $count)
				{
					echo "selected";
				}
				echo ">{$count}</option>";
					}
					?>
					</select>
				</p>
				<p>Visible: 
					<input type="radio" name="visible" value="0" <?php if($current_page["visible" ==0){echo "checked";}?> /> No
					&nbsp;
					<input type="radio" name="visible" value="1"<?php if($current_page["visible" ==1){echo "checked";}?> /> Yes
				</p>
				<p>content:<br />
				<textarea name="content" rows="20" cols="80"><?php echo htmlentities($current_page["content"]); ?></textarea>
				</p>
				<input type="submit" name="submit" value="edit page" />
			</form>
			<br />
			<a href="manage_content.php?subject=<?php echo urlencode($current_subject["id"]); ?>">cancel</a>
		</td>
	</tr>
</table>
<?php require("../includes/layout/footer.php"); ?>
