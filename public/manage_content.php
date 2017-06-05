   <?php require_once("../includes/session.php"); ?>
    <?php require_once("../includes/db_connection.php"); ?>
     <?php require_once("../includes/functions.php"); ?>
	 <?php $layout_context="admin"; ?>
	  <?php include("../includes/layout/header.php"); ?>

	 <?php
	
		find_selected_page();	
		?>
		
		
  
	  <div id="main">
	  <br />
	  <a href="admin.php">&laquo; Main menu </a><br />
	  <div id="navigation">
	  <?php echo navigation($current_subject,$current_page); ?>
	   <br />
	   <a href="new_subject.php">+ Add a subject </a>
	   
	   </div>
	   <div id="page">
	   <?php echo message();?>
	   <?php $errors=errors(); ?>
	  <?php  echo form_errors($errors); ?>
	   
	   <?php if($current_subject) { ?>
	   <h2>Manage subject</h2>
	  
	   
	   Menu name:<?php echo htmlentities($current_subject["menu_name"]);?><br />
	         
	   position: <?php echo $current_subject["position"]; ?> <br />
	   visible:  <?php echo $current_subject["visible"] ==1 ? 'yes' : 'no'; ?>
	         <br />

			 
			 
	   <?php } elseif($current_page) { ?>
	   <h2>Manage page</h2>
	   
	   
	   Menu name:<?php echo htmlentities($current_page["menu_name"]);?>
	   position: <?php echo $current_page["position"]; ?> <br />
	   visible:  <?php echo $current_page["visible"] ==1 ? 'yes' : 'no'; ?>
	       
	        <br />
 <a href="edit_subject.php?subject=<?php echo urlencode ($current_subject["id"]); ?>">Edit subject </a>
			 <div style="margin-top:2 em;border-top:1px solid #000000:">
			 <h3>pages in this subjects: </h3>
			 <ul>
			 <?php
			  $subject_pages=find_page_by_id($current_subject["id"]);
			  while($page=mysqli_fetch_assoc($subject_pages))
			  {
				  echo "<li>";
				  $safe_page_id=urlencode($pages["id"]);
				  echo "<a href=\"manage_content.php?page={$safe_page_id}\">";
			  echo htmlentities($page["menu_name"]);
			  echo "</a>";
			  echo "</li>";
			  }
			  ?>
			  </ul>
			  <br />
			  + <a href="new_page.php?subject=<?php echo urlencode($current_subject["id"]); ?>">Add a new page to this subject </a>
			  </div>
	   <?php } elseif ($current_page) { ?>
	   <h2>manage page </h2>
	   Menu name: <?php echo htmlentities($current_page["menu_name"]); ?> <br />
	   position: <?php echo $current_page["menu_name"]; ?> <br />
	    visible:  <?php echo $current_subject["visible"] ==1 ? 'yes' : 'no'; ?>
	         <br />
			  	  
			 
			 content:<br />
			 <div class="view-content">
			 <a href=
		   <?php echo htmlentities($current_page["content"]); ?>
		   </div>
		   <br />
		   <br />
		   <a href="edit_page.php?page=<?php echo urlencode ($current_page["id"]); ?>">Edit page </a>
	      
			 

	   <?php }else	 { ?>
	   please select a subject or a page.
    
        <?php }
		?>
		 
			
	 
		</div>
	  </div>
	
	  <?php include("../includes/layout/footer.php"); ?>
	  
  
