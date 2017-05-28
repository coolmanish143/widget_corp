<?php 

 function confirm_query($result)
 {
	 if(!$result)
	 {
		 die("Database query failed.");
	 }
 }
  function find_all_subjects()
  {
	  global $connection;
	   $query = "select * ";
	  $query.=  "from subjects ";
	  $query .=  "where visible= 1 ";
	  $query .=  "order by position asc";
	   $subject_set= mysqli_query($connection,$query);
		  confirm_query($subject_set);
		  return $subject_set;
  }
  
   function find_pages_for_subjects($subject_id)
   {
	   global $connection;
	    $query = "select * ";
	  $query.=  "from pages ";
	  $query .=  "where visible= 1 ";
	   $query .="AND subject_id ={$subject_id} ";
	  $query .=  "order by position asc";
	   $page_set= mysqli_query($connection,$query);
		  confirm_query($page_set);
		  return $page_set;
	   
   }
?>