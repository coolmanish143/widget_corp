
		<?php
		function hello($name)
		{
			return "hello {$name}!";
		}
			
			function redirect_to($new_location)
			{
				header("location:".$new_location);
				exit;
			}
		  ?>