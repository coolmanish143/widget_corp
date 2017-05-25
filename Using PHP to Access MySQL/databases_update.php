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
		 $id= 5;
		 $menu_name="DELETE ME";
		 $position=4;
		 $visible=1;
		 
		 
		  //2. performing database query
 	 
		$query = " update subjects SET ";
		$query .=" menu_name = '{$menu_name}' , ";
		$query .=" position ={$position}, ";
		$query .= " visible ={$visible} ";
		$query .= "where id= {$id}";
		
		
		$result= mysqli_query($connection,$query);
	
		  if($result && mysqli_affected_rows($connection)==1)
		  {  //success
			//redirect_to("basic.html");
			echo "success!";
		  }
		  else
		  {
			  //failure
			  //$message="subject update failed"
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
