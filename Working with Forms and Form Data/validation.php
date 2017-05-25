<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
	
		<title></title>
	</head>

	<body>
		<?php
		// * presence
		  $value=trim ("0");
		  if(!isset($value)|| (empty($value)&& !is_numeric($value)))
		  {
			  echo "validation failed.<br />";
		  }
		  
			// * string length
			// minimum length
			
			  $value= "abcd";
			  $min= 3;
			  if(strlen($value) < $min)
			  {
				   echo "validation failed.<br />";
			  }
			
			// max length
			$max=6;
			 if(strlen($value) > $max)
			  {
				   echo "validation failed.<br />";
			  }
			
			
				// * type
				  $value= "1";
				  if(!is_string($value))
			  {
				   echo "validation failed.<br />";
			  }




				// * inclusion in a set
				   $value= "5";
				   $set= array("1","2","3","4");
				   if(!in_array($value,$set))
			  {
				   echo "validation failed.<br />";
			  }
				
				   
						// * uniqueness
							// * format
							//use a regex  on a string
							//preg_match ($regex,$subject)
							if(preg_match("/PHP/","PHP is fun."))
							{
								echo " A match was found.";
							}
							else
							{
								echo "A match was not found.";
							}
							$value= "nobody@nowhere.com";
							 if(!preg_match("/@/",$value))
			  {
				   echo "validation failed.<br />";
			  }
			  if(strpos($value,"@")=== false)
			  {
				   echo "validation failed.<br />";
			  }
							
						
		
		
		   
		  
		?>
		
		
	</body>
</html>
