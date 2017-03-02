<!--
Jessica Rieger and Victoria Confeiteiro
November 28, 2016
Admin Change Personal Info
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Admin Change Personal Information</title>
		<link rel="stylesheet" type="text/css" href="AddAdmin.css">
	</head>
	<body>
		<img src = "IMG_6150.PNG" alt = "Limbo" height="100" width="130">
		<hr>
		<img src = "lost-and-found.png"alt = "Lost and found sign" height="175" width="275" class="centeringIMG">
		<div class="div1">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/AdminHomepage.php">Back to Admin Homepage</a></h5>
		</div>
		
		<br>
		<h1 class="custom">Admin Change Personal Information</h1>
		<h4 class="custom">Please enter your Admin username below</h4>
</html>
<?php
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;

# Checks if the user has entered information before
if ($_SERVER['REQUEST_METHOD']=='GET'){
		$id = "";
		$username = "";
		$category = "";
		$newValue = "";
		
	}
	
if ($_SERVER['REQUEST_METHOD']=='POST'){
	
	$id = $_POST['id'];
	$category = $_POST['category'];
	$newValue = $_POST['newValue'];
	
	$result = update_record($dbc, $id, $category, $newValue);
	show_query($result);
	
}
show_form_update($dbc, $id, $category, $newValue);
function show_form_update($dbc, $id, $category, $newValue){
	echo '<form action ="UpdateItemInfo.php" method="POST">';
	echo '<p class="custom">Enter the ID:<input type="text" name="id" value='. $id . '> </p>';
	echo '<p class="custom">Enter the column name exactly as shown:<input type="text" name="category" value="'. $category . '"> </p>';
	echo '<p class="custom">New Value:<input type="text" name="newValue" value="'. $newValue . '"> </p>';
	echo '<p class="custom"><input type="submit"></p>';
	echo '</form>';
	
	
}

# Close the connection
mysqli_close( $dbc ) ;
?>