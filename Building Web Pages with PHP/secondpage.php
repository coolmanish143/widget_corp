<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
	
		<title>second page</title>
	</head>

	<body>
	<pre>
	<?php
	//print_r($_GET);
	?>
	</pre>
	<?php
	$id=$_GET['id'];
	echo $id;
	?>
	<br/>
	<?php
	$company=$_GET['company'];
	echo $company;
	?>
	
	</body>
</html>
