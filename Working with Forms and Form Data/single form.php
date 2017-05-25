<?php
        require_once("included_function.php");
		if(isset($_POST['submit']))
		{
			//form was submitted
			$username = $_POST["username"];
			$password = $_POST["password"];
			
			if (($username == "samir")&& ($password == "manish123"))
			{
				//successful login
				redirect_to("hello.php");
			}
			else
			{

		    $message= "There were some errors.";
		   }
		}
		   else
		   {
			   $username= "";
			   $message="please log in.";
		   }
		
		
			?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
	
		<title> single form</title>
	</head>

	<body>
	<?php echo $message;
	
	?>
	<br/>
	<form action="single form.php" method="post">
	username:<input type="text" name="username" value= "<?php echo htmlspecialchars($username); ?> " /> <br/>
	password:<input type="password" name="password" value="" /> <br/>
	<input type="submit" name="submit" value="submit" /> 
	</form>
		
		
	</body>
</html>
