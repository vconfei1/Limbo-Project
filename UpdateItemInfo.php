<!--
Jessica Rieger and Victoria Confeiteiro
November 10, 2016
Update Item Info page
New
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Limbo Database Update</title>
		<link rel="stylesheet" type="text/css" href="UpdateItem.css">
	</head>
	<body>
		<img src = "IMG_6150.PNG" alt = "Limbo" height="100" width="130">
		<hr>
		<div class = "div1">
		<h4 class="custom"><a href = "http://127.0.0.1:8888/SplashPage.php"> Back to Main Page </a></h4>
		</div>
		<div class = "div2">
		<h4 class="custom"><a href = "http://127.0.0.1:8888/FoundItem.php"> Enter a Found Item</a></h4>
		</div>
		<div class = "div3">
		<h4 class="custom"><a href = "http://127.0.0.1:8888/LostItem.php"> Enter a Lost Item </a></h4>
		</div>
		<br>
		<img src = "lost-and-found.png"alt = "Lost and found sign" height="150" width="200" class="centeringIMG">
		<h1 class="custom">Limbo Update</h1>
		<h2 class="custom">Here a list of items in our database. Please select the ID of an item to see more information.</h2>
		<h3 class="custom">All fields below are required</h3>
		<h4 class="custom">If you're changing the location, please use the table below and input the location ID.</h4>
	</body>
</html>

<?php
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;


if($_SERVER[ 'REQUEST_METHOD' ] == 'GET') {
	if(isset($_GET['id']))
	show_record_info($dbc, $_GET['id']) ;
	$id = "";
	$categories = "";
	$newValue = "";
	$newStatus = "";
}
	
show_link_records_info($dbc); 
if ($_SERVER['REQUEST_METHOD']=='POST'){
	
	$id = $_POST['id'];
	$categories = $_POST['categories'];
	$newValue = $_POST['newValue'];
	$newStatus = $_POST['Status'];
	$result = update_record($dbc, $id, $categories, $newValue, $newStatus);
	  show_query($result);
	  } 


show_form_update($dbc, $id, $categories, $newValue, $newStatus);
function show_form_update($dbc, $id, $categories, $newValue, $newStatus){
	echo '<form align="center" action ="UpdateItemInfo.php" method="POST" class="custom">';
	echo '<p>Enter the ID:<input type="text" name="id" value='. $id . '> </p>';
	echo '<p>Select the category:<select name="categories">';
			echo'<option value="finder">Finder</option>';
				echo'<option value="fPhoneNumber">Finder\'s Phone Number</option>';
				echo'<option value="fEmail">Finder\'s Email</option>';
				echo'<option value="owner">Owner\'s Name</option>';
				echo'<option value="oPhoneNumber">Owner\'s Phone Number</option>';
				echo'<option value="oEmail">Owner\'s Email</option>';
				echo'<option value="Icat">Item Category</option>';
				echo'<option value="Iname">Item Name</option>';
				echo'<option value="descr">Item Description</option>';
				echo'<option value="Ilocation">Location</option>';
				echo'<option value="room">Room</option>';
				echo'<option value="status">Status</option>';
			echo'</select>';
	echo '<p>Enter the new value:<input type="text" name="newValue" value='. $newValue . '> </p>';
	echo '<p>If you are entering an Item Category, please choose from this list: Clothing, Jewelry, Bag, Keys, Office Supplies, Shoes, Electronic Devices, Misc. </p>';
	echo '<p>If you do not wish to change the status please select none for the status.</p>';
	echo '<p>Select the status you want:<select name="Status">';
						echo'<option value="Lost">Lost</option>';
						echo'<option value="Found">Found</option>';
						echo'<option value="Claimed">Claimed</option>';
						echo'<option value="None">None</option>';
				echo'</select>';
						
	echo'<p><input type="submit"></p>';
	echo'</form>';	
}



# Close the connection
mysqli_close( $dbc ) ;
?>