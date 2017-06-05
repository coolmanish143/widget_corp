<?php require_once("../includes/db_connection.php"); ?>
<?php $layout_context="admin"; ?>
     <?php require_once("../includes/functions.php"); ?>
	  <div id="main">
	  <div id="navigation">
	    &nbsp;
	 <div id="page">
	   <h2>Admin Menu</h2>
	   <p>Welcome to the admin area.</p>
	   <ul>
	     <li><a href="manage_content.php">Manage Website
Content</a></li>
        <li><a href="manage_admin.php">Manage Admin
User</a></li>
        <li><a href="logout.php">Logout</a></li>
		</ul>
		</div>
	  </div>
	  
 <?php include("../includes/layout/footer.php"); ?>