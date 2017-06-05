		</div>
		<div id="footer">Copyright <?php echo date("y"); ?>, Widget Corp</div>
	</body>
</html>
<?php
//.5 close database connection
	if (isset($connection))
	{
	  mysqli_close($connection); 
	}
 ?>