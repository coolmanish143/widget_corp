<?php require_once("../includes/session.php"); ?>
    <?php require_once("../includes/sessions.php"); ?>
	<?php require_once("../includes/db_connection.php"); ?>
     <?php require_once("../includes/functions.php"); ?>
<?php
$current_page=find_page_by_id($_GET["page"],false);
    if(!$current_page)
	{
		redirect_to("manage_content.php");
	}
		$id=$current_page["id"];
		$query = "DELETE FROM pages WHERE id = {$id} LIMIT 1";
		$result = mysql_query($query, $connection);
		if ($result && mysql_affected_rows($connection) == 1) {
		    //success
	      $_SESSION["$message"]="page deleted.";
			redirect_to("manage_content.php");
		  }
		  else
		  {
			  //failure
			  $_SESSION["$message"]="page deletion failed";
		      redirect_to("manage_content.php?subject={$id}");
		  }
	
	?>

<?php
	if (isset($connection))
	{
	  mysqli_close($connection); 
	}
 ?>