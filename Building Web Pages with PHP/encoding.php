<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
	
		<title>html encoding</title>
	</head>

	<body>
	<?php
	$linktext="<click> & learn more";
	?>
		<a href="">
		<?php echo htmlspecialchars($linktext);?>
		</a>
		<br/>
		<?php
		$text="*%^.^#&(.";
		echo htmlentities( $text);
		?>
		
		<?php
		$url_page="<br/>php/created/page/url.php";
		$param1="This is string with < >";
		$param2="&#?*$[]+ are bad characters";
		$linktext="<click> & learn  more";
		
		$url="http://localhost/";
		$url .=rawurlencode($url_page);
		$url .="?" ."param1=".urlencode($param1);
		$url .="&" ."param2=".urlencode($param2);
		?>
		<a href="<?php echo htmlspecialchars($urls); ?>">
		<?php echo htmlspecialchars($linktext); ?>
		</a>
		
		
	</body>
</html>
