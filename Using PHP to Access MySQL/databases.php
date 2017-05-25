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
		  //2. performing database query
 	  $query = "select * ";
	  $query.=  "from subjects ";
	  $query .=  "where visible= 1 ";
	  $query .=  "order by position asc";
	
		  $result= mysqli_query($connection,$query);
		  //Testing if there was query error or not.
		  if(!$result)
		  {
			die("Database query failed.");
		  }
		   ?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
	
		<title>database</title>
	</head> 

	<body>
	<ul>

	<?php
	 //3. use returned data(if any)
	 while($subject = mysqli_fetch_assoc($result))
	 {
		 //output data from each row 
		 ?>
		 <li> <?php echo $subject["menu_name"];?> </li>
	<?php
	 }
	 ?>
	 </ul>
	 <?php
	 // 4.Releasing returned data
	   mysqli_free_result($result);
	   ?>
		
	</body>
</html>
 <?php
 
    //.5 close database connection
	  mysqli_close($connection); 
 ?>
