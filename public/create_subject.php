 <?php require_once("../includes/session.php"); ?>
    <?php require_once("../includes/db_connection.php"); ?>
     <?php require_once("../includes/functions.php"); ?>
	  <?php include("../includes/validation_function.php"); ?>
<?php
if(isset($_POST['submit']))
{
	//process the form

	
	
	$menu_name = mysql_prep($_POST['menu_name']);
	$position = mysql_prep($_POST['position']);
	$visible = mysql_prep($_POST['visible']);
	
	//$errors = array();
	
	//validations
	  $required_fields = array("menu_name", "position", "visible");
	  $errors = validate_presences($required_fields);
	  
	  $fields_with_max_lengths = array("menu_name" => 30);
	  $errors = validate_max_lengths($fields_with_max_lengths);
	  
	  
	if (!empty($errors) || count($errors!==0)) {
		$_SESSION["errors"]=$errors;
		var_dump($errors);
		die();
		redirect_to("new_subject.php");
	}
 	 
		$query = " insert into subjects(";
		$query .=" menu_name,position,visible";
		$query .= ") values (";
		$query .= "  '{$menu_name}',{$position},{$visible}";
		$query .=")";
		
		
		$result= mysqli_query($connection,$query);
	
		  if($result)
		  {  //success
	      $_SESSION["$message"]="subject created.";
			redirect_to("manage_content.php");
		  }
		  else
		  {
			  //failure
			  $_SESSION["$message"]="subject creation failed";
		      redirect_to("new_subject.php");
		  }
	
}
else{
	//This is probably a GET request
	redirect_to("new_subject.php");
}

	
?>

<?php
	if (isset($connection))
	{
	  mysqli_close($connection); 
	}
 ?>