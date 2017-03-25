<!--
Jessica Rieger and Victoria Confeiteiro
December 4, 2016
Super Admin Delete Stuff page
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
			<h5 class="custom"><a href = "http://127.0.0.1:8888/SuperAdminHomepage.php">Back to Super Admin Homepage</a></h5>
		</div>
		<div class = "div2">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/SAdminAddStuff.php">Add Stuff </a></h5>
		</div>
		<div class = "div3">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/SuperAdminUpdateItemInfo.php">Update Stuff</a><h5>
		</div> 
		<br>
		<h1 class="custom">Delete Items</h1>
		<h3 class="custom">Please view the table below, then enter the ID of the item you would like to delete below and press submit.</h3>
		<h4 class="custom">All fields below are required</h4>
	</body>
</html>
<?php
	#Connect to MySQL server and the database
	require( 'includes/connect_db.php' ) ;
		
	# Includes these helper functions
	require( 'includes/helpers.php' ) ;
		
	if ($_SERVER['REQUEST_METHOD']=='GET'){
		$id = "";
		}
		
	if ($_SERVER['REQUEST_METHOD']=='POST'){
		$id = $_POST['id'];
		
		delete_item($dbc, $id);
	}
	echo'<form action="SuperAdminDeleteStuff.php" method="POST">';	
	echo'<p>Item ID: <input type="text" name="id" value = "'. $id .'"></p>';
	echo'<p><input type="submit"></p>';
		
	#Show the records
	show_records($dbc);
		
	#Close the connection
	mysqli_close( $dbc ) ;
	
?>