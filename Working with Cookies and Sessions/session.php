<?php
      //sessions use cookies which use headers.
	  //must start before any HTML output.
	  //unless output buffer is turned on.
	  
	  
		session_start();
		   
		  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>

	<head>
	
		<title>sessions</title>
	</head>

	<body>
	<?php
	$_SESSION["first_name"]="Manish";
	$name=$_SESSION["first_name"];
	echo $name;
	?>
		
	</body>
</html>
