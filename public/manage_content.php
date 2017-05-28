    <?php require_once("../includes/db_connection.php"); ?>
     <?php require_once("../includes/functions.php"); ?>
	  <?php include("../includes/layout/header.php"); ?>

	 <?php
	
		find_selected_page();	
		?>
		
		
  
	  <div id="main">
	  <div id="navigation">
	  <?php echo navigation($current_subject,$current_page); ?>
	   </div>
	   <div id="page">
	   <?php if($current_subject) { ?>
	   <h2>Manage subject</h2>
	  
	   
	   Menu name:<?php echo $current_subject["menu_name"];?>
	         <br />
			 
	   <?php } elseif($current_page) { ?>
	   <h2>Manage page</h2>
	   
	   
	   Menu name:<?php echo $current_page["menu_name"];?>
	         <br />
			 

	   <?php }else	 { ?>
	   please select a subject or a page.
    
        <?php }
		?>
		 
			
	 
		</div>
	  </div>
	
	  <?php include("../includes/layout/footer.php"); ?>
	  
  
