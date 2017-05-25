<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
	
		<title></title>
	</head>

	<body>
		<?php
		function is_equal($value1,$value2)
		{
		$output="{$value1} == {$value2}: ";
		if($value1==$value2)
		{
			$output .="true<br />";
		}
		else
		{
			$output .="false<br />";
		} 
		  return $output;
		}
		echo is_equal(0,false);
		echo is_equal(4,true);
		echo is_equal(0,null);
		
		   
		  ?>
		  <?php
		function is_exact($value1,$value2)
		{
		$output="{$value1} === {$value2}: ";
		if($value1===$value2)
		{
			$output .="true<br />";
		}
		else
		{
			$output .="false<br />";
		} 
		  return $output;
		}
		echo is_exact(0,false);
		echo is_exact(4,true);
		echo is_exact(4,null);
		
		
		
		   
		  ?>
	</body>
</html>
