<?php

//REMEMBER:setting cookies must be before *any*  HTML output_add_rewrite_var
// unless output buffering is turned on.

		$name="test";
		$value="you r miee sweet heart";
		$expire=time() + (60*60*24*7);//add seconds
		setcookie($name,$value,$expire);
		  //setcookie($name);
		  //setcookie($name,null,$expire);
		  //manish's  recommendation for unsetting
		// setcookie($name,$value,time()-3600);
		
		 
		   
		  ?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
	
		<title>setting cookies</title>
	</head>

	<body>
	
	<?php
	$test=isset($_COOKIE["test"])? $_COOKIE["test"] :"";
	echo $test;
	?>
	

		
	</body>
</html>
