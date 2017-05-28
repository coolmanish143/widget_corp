<?php

 define("DB_SERVER","Localhost");
 define("DB_USER","widget_cms");
 define("DB_PASS","manish143");
 define("DB_NAME","widget_corp");
 
  //1.creating a database connection
  
   $connection =mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
  //Testing if connection occurred or not.
     if(mysqli_connect_errno())
	 {
		 die("Database connection failed:".
		    mysqli_connect_error() .
			"(". mysqli_connect_errno() .")"
			);
	 }
	 
		   
		  ?>