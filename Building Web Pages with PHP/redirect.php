<?php
//This is how we redirect to new page.
function redirect_to($new_location)
{
 header("Location:".$new_location);
 exit;
}
$logged_in=$_GET['logged_in'];
if($logged_in==1)
{
	redirect_to("firstpage.php");
}
else
{
	redirect_to("http://www.google.com");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
	
		<title>redirect</title>
	</head>

	<body>
		<?php
		   
		  ?>
	</body>
</html>
