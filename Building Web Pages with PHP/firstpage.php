<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
	
		<title>first page </title>
	</head>

	<body>
	<?php $link_name="secondpage"; ?>
	<?php $id=5;?>
	<?php $company="Neplancer & Construction";
	?>
	<a href="secondpage.php?id=<?php echo $id ; ?>&company=<?php echo rawurlencode($company); ?>"><?php echo $link_name; ?></a>
	
	</body>
</html>
