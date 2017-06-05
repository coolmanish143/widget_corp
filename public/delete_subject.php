<?php require_once("../includes/session.php"); ?>
    <?php require_once("../includes/db_connection.php"); ?>
     <?php require_once("../includes/functions.php"); ?>
<?php
$current_subject=find_subject_by_id($_GET["subject"],$public);
    if(!$current_subject)
	{
		redirect_to("manage_content.php");
	}
	$pages_set = find_selected_page($current_subject["id"]);
	if(mysqli_num_rows($pages_set)>0)
	{
		 $_SESSION["$message"]="can't delete a subject with pages.";
 redirect_to("manage_content.php?subject={$current_subject["id"]}");
	}
		$id=$current_subject["id"];
		$query = "DELETE FROM subjects WHERE id = {$id} LIMIT 1";
		$result = mysql_query($query, $connection);
		if ($result && mysql_affected_rows($connection) == 1) {
		    //success
	      $_SESSION["$message"]="subject deleted.";
			redirect_to("manage_content.php");
		  }
		  else
		  {
			  //failure
			  $_SESSION["$message"]="subject deletion failed";
		      redirect_to("manage_content.php?subject={$id}");
		  }
	
	?>

<?php
	if (isset($connection))
	{
	  mysqli_close($connection); 
	}
 ?>