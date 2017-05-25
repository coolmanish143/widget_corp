<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
	
		<title>validation error</title>
	</head>

	<body>
		<?php
		require_once('validation_function.php');
		$error=array();
		//$username =trim ($_POST["username"]);
		$username=trim("");
		if(!has_presence($username))
		{
			$error['username']="username can't be blank";
			
		}

	 ?>
							<?php echo form_error($error);?>
							
		
	</body>
</html>
