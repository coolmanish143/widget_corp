<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
	
		<title> form processing</title>
	</head>

	<body>
		
		<pre>
		<?php
		   print_r($_POST);
		?>
		<br/>
		<?php
		//detect form submission
		if(isset($_POST['submit']))
		{
			echo "form was submitted<br/>";
		//set default values
		if(isset($_POST["Username"]))
		{
		$Username = $_POST["Username"];
		}
		else
		{
			$Username= " ";
		}
		if(isset($_POST["password"]))
		{
		$password = $_POST["password"];
		}
		else
		{
			$password= " ";
		}
		
		//set default values using ternary operator
		//boolean_test?value_if_true:value_if_false
		$Username = isset($_POST['Username'])? $_POST['Username']: "";
		$password = isset($_POST['password'])? $_POST['password']: "";
		}
		else
		{
			$Username="";
			$password="";
		}
		?>
		
		
		<?php
		echo "{$Username}:{$password}";
		?>
		
		
		
		</pre>
	</body>
</html>
