
		<?php
		// * presence
		// * presence
		//use trim() so empty spaces don't count
		//use === to avoid false positive
		//empty() would consider "0" to be empty
		  function has_presence($value)
		  {
		   return  isset($value)&& $value !=="";
		  }
			  
		 
		  
			// * string length
			
			
			// max length
			function has_max_length($value,$max)
			{
			
			 return(strlen($value) <= $max);
			}

				// * inclusion in a set
				  function has_inclusion_in($value,$set)
				  {
				   return in_array($value,$set);
				  }
				  function validate_max_lengths($fields_with_max_lengths)
				  {
					  global $error;
				  //using an associate array
			 
	foreach($fields_with_max_lengths as $field => $max)
			 {
				 $value=trim($_POST[$field]);
				 if(!has_max_length($value,$max))
				 {
					 $error[$field]=ucfirst($field). " is too long";
				 }
			 }
				  }
				  						function form_error($error=array())
						{
							$output="";
							if(!empty($error))
							{
								$output.= "<div class=\"error\">";
								$output.= "please fix the following errors:";
								$output.= "<ul>";
								foreach($error as $key=> $error)
								{
									$output.=  "<li>{$error}</li>";
								}
							  $output.=  "</ul>";
								$output.= "</div>";
							}
							return $output;
						}
				  ?>
			 
				
				   
							
			
		
		
