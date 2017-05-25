<?php
        require_once("included_function.php");
		require_once("validation_function.php");
		$error=array();
		$message="";
		if(isset($_POST['submit']))
		{
			//form was submitted
			$username =trim( $_POST["username"]);
			$password =trim( $_POST["password"]);
			
			
			//validation
			 $fields_required =array("username","password");
			 foreach($fields_required as $field)
			 {
			 $value=trim($_POST[$field]);
			if(!has_presence($value))
			{
		
			$error[$field]= ucfirst($field) . " can't be blank";
			}
			 }
			
			 $fields_with_max_lengths=array("username" =>30,"password" =>8);
			 validate_max_lengths($fields_with_max_lengths);
		if(empty($error))
			
			{
			//try to login
			if ($username == "samir"&& $password == "manish123")
			{
				//successful login
				redirect_to("basic.html");
			}
			else
			{

		    $message= " username/password do not match.";
		   }
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
	<?php echo $message; ?> <br />
	<?php echo form_error($error); ?>
	<form action="form_with_validation.php" method="post">
	username:<input type="text" name="username" value= "<?php echo htmlspecialchars($username); ?> " /> <br />
	password:<input type="password" name="password" value="" /> <br/>
	<input type="submit" name="submit" value="submit" /> 
	</form>
		
		
	</body>
</html>
