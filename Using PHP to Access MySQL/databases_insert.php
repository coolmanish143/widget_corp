<?php

  //1.creating a database connection
   $dbhost="localhost";
   $dbuser="widget_cms";
   $dbpass="manish143";
   $dbname="widget_corp";
   $connection =mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
  //Testing if connection occurred or not.
     if(mysqli_connect_errno())
	 {
		 die("Database connection failed:".
		    mysqli_connect_error() .
			"(". mysqli_connect_errno() .")"
			);
	 }
	 
		   
		  ?>
		 
		 <?php
		 //often these are form values in $_POST
		 $menu_name="EDIT ME";
		 $position=4;
		 $visible=1;
		 
		 
		  //2. performing database query
 	 
		$query = " insert into subjects(";
		$query .=" menu_name,position,visible";
		$query .= ") values (";
		$query .= "  '{$menu_name}',{$position},{$visible}";
		$query .=")";
		
		
		$result= mysqli_query($connection,$query);
	
		  if($result)
		  {  //success
			//redirect_to("basic.html");
			echo "success!";
		  }
		  else
		  {
			  //failure
			  //$message="subject creation failed"
			die("Database query failed. " . mysqli_error($connection));
		  }
		   ?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
	
		<title>database</title>
	</head> 

	<body>

	 
		
	</body>
</html>
 <?php
 
    //.5 close database connection
	  mysqli_close($connection); 
 ?>
