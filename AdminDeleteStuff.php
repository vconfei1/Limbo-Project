<!--
Jessica Rieger and Victoria Confeiteiro
December 4, 2016
Admin Delete Stuff page
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Admin Delete an Item</title>
		<link rel="stylesheet" type="text/css" href="AddAdmin.css">
	</head>
	<body>
		<img src = "IMG_6150.PNG" alt = "Limbo" height="100" width="130">
		<hr>
		<div class = "div1">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/AdminHomepage.php">Back to Admin Homepage</a><h5>
		</div>
		<div class = "div2">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/AdminAddStuff.php">Add Stuff</a></h5>
		</div>
		<div class = "div3">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/AdminUpdateItemInfo.php">Update Item Info</a></h5>
		</div>
		
		<br>
		<h1 class="custom">Admin Delete an Item</h1>
		<h2 class="custom">Delete Item</h2>
		<h4 class="custom">Please view the table below, then enter the ID of the item you would like to delete below and press submit. All fields required.</h4>
</html>
<?php
	
	#Connect to MySQL server and the database
	require( 'includes/connect_db.php' ) ;
		
	# Includes these helper functions
	require( 'includes/helpers.php' ) ;
		
	if ($_SERVER['REQUEST_METHOD']=='GET'){
		$id = "";
		if(isset($_GET['id'])){
			show_record_info($dbc, $_GET['id']) ;
		
		}
	}
		
	if ($_SERVER['REQUEST_METHOD']=='POST'){
		$id = $_POST['id'];
		delete_item($dbc, $id);
	}
	echo'<form action="AdminDeleteStuff.php" method="POST" class="custom">';	
	echo'<p>Item ID: <input type="text" name="id" value = "'. $id .'"></p>';
	echo'<p><input type="submit"></p>';
		
	#Show the records
	show_link_recordsAdminDelete($dbc);
		
	#Close the connection
	mysqli_close( $dbc ) ;
	
?>