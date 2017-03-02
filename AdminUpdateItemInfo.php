<!--
Jessica Rieger and Victoria Confeiteiro
December 4, 2016
Admin Update Item Info page
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Admin Limbo Database Update</title>
		<link rel="stylesheet" type="text/css" href="AddAdmin.css">
	</head>
	<body>
		<img src = "IMG_6150.PNG" alt = "Limbo" height="100" width="130" >
		<hr>
		<br>
		<img src = "lost-and-found.png"alt = "Lost and found sign" height="175" width="275" class="centeringIMG">
		<br>
		<h1 class="custom">Admin Limbo Update</h1>
		<h3 class="custom">Here a list of items in our database. Please enter the ID, the column name, and the new value you wish to insert.</h3>
		<h4 class="custom">All fields below are required</h4>
		<br>
		<div class="div1">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/AdminHomepage.php">Back to Admin Homepage</a></h5>
		</div>
		<div class = "div2">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/AdminAddStuff.php">Add Stuff</a></h5>
		</div>
		<div class = "div3">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/AdminDeleteStuff.php">Delete Stuff</a></h5>
		</div>	
	</body>
</html>

<?php
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;



# Checks if the user has entered information before
if ($_SERVER['REQUEST_METHOD']=='GET'){
		$id = "";
		$category = "";
		$newValue = "";
		$newStatus = "";
		if(isset($_GET['id'])){
			show_record_info($dbc, $_GET['id']) ;
		
		}
	}
	
if ($_SERVER['REQUEST_METHOD']=='POST'){
	
	$id = $_POST['id'];
	$category = $_POST['categories'];
	$newValue = $_POST['newValue'];
	$newStatus = $_POST['Status'];
	
	$result = update_record($dbc, $id, $category, $newValue, $newStatus);
	echo'<h2><a href = "http://127.0.0.1:8888/AdminHomepage.php" style="color:blue;" > Back to Main Page </a><h2>';
	show_query($result);
	
}
#Show the records
show_link_recordsAdminUpdate($dbc);

show_form_update($dbc, $id, $category, $newValue);
function show_form_update($dbc, $id, $category, $newValue){
	echo '<form action ="AdminUpdateItemInfo.php" method="POST" class="custom">';
	echo '<p class="custom">Enter the ID:<input type="text" name="id" value='. $id . '> </p>';
	echo '<p class="custom">Select the category:<select name="categories">';
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
		echo '<p class="custom">If you are entering an Item Category, please choose from this list: Clothing, Jewelry, Bag, Keys, Office Supplies, Shoes, Electronic Devices, Misc. </p>';
		echo '<p class="custom">If you wish to change the location, please enter the id of the location you want based on the table below. </p>';
	echo '<p class="custom">New Value:<input type="text" name="newValue" value="'. $newValue . '"> </p>';
	echo '<p class="custom">If you do not wish to change the status please select none for the status.</p>';
	echo '<p class="custom">Select the status you want:<select name="Status">';
						echo'<option value="Lost">Lost</option>';
						echo'<option value="Found">Found</option>';
						echo'<option value="Claimed">Claimed</option>';
						echo'<option value="None">None</option>';
				echo'</select>';
	echo'<p class="custom"><input type="submit"></p>';
	echo'</form>';
	
	
}



# Close the connection
mysqli_close( $dbc ) ;
?>