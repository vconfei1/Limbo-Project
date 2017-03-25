<!--
Jessica Rieger and Victoria Confeiteiro
December 4, 2016
Super Admin Delete Admin page
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Super Admin Delete an Item</title>
		<link rel="stylesheet" type="text/css" href="SAstylesheet.css">
	</head>
	<body>
		<img src = "IMG_6150.PNG" alt = "Limbo" height="100" width="130">
		<hr>
		<div class = "div1">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/SuperAdminHomepage.php"> Back to Super Admin Homepage </a></h5>
		</div>
		<div class = "div2">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/SAAdminAccountUpdate.php" >Update Admin Account Info</a></h5>
		</div>
		<div class = "div3">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/AddAdmin.php"> Add Admin </a></h5>
		</div>
		<h1>Delete Admins</h1>
		<h3>Please view the table below, then enter the ID of the Admin you would like to delete below and press submit.</h3>
		<h4 class="custom">All fields below are required</h4>
	</body>
</html>
<?php
	#Connect to MySQL server and the database
	require( 'includes/connect_db.php' ) ;
		
	# Includes these helper functions
	require( 'includes/helpers.php' ) ;
		

	if ($_SERVER['REQUEST_METHOD']=='GET'){
		$user_id = "";
		}
		
	if ($_SERVER['REQUEST_METHOD']=='POST'){
		$user_id = $_POST['user_id'];
		
		delete_admin($dbc, $user_id);
	}
	echo'<form align="center" action="SuperAdminDeleteAdmin.php" method="POST">';	
	echo'<p>Item ID: <input type="text" name="user_id" value = "'. $user_id .'"></p>';
	echo'<p><input type="submit"></p>';
		
	#Show the users
	show_users($dbc);
		
	#Close the connection
	mysqli_close( $dbc ) ;
	
?>