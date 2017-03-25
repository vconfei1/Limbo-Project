<!--
Jessica Rieger and Victoria Confeiteiro
December 4, 2016
Super Admin Update Item Info page
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Super Admin Limbo Database Update</title>
		<link rel="stylesheet" type="text/css" href="SAstylesheet.css">
	</head>
	<body>
		<img src = "IMG_6150.PNG" alt = "Limbo" height="100" width="130">
		<hr>
		<img src = "lost-and-found.png"alt = "Lost and found sign" height="175" width="275" class="centeringIMG">
		<h1>Super Admin Limbo Update</h1>
		<h2> Here a list of items in our database. Please enter the ID, the column name, and the new value you wish to insert.</h2>
		<div class="div1">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/SuperAdminHomepage.php">Back to Super Admin Homepage</a></h5>
		</div>
		<TABLE style="margin: auto;">
			<TR>
				<TD><button type="button"><a href = "http://127.0.0.1:8888/SAdminAddStuff.php">Add Stuff</a></button></TD>
				<TD><button type="button"><a href = "http://127.0.0.1:8888/SuperAdminDeleteStuff.php">Delete Stuff</a></button></TD>
			</TR>
		</TABLE>
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
	show_query($result);
	
}
#Show the records
show_link_recordsAdminUpdate($dbc);

show_form_updateSA($dbc, $id, $category, $newValue);
function show_form_updateSA($dbc, $id, $category, $newValue){
	echo '<form action ="SuperAdminUpdateItemInfo.php" method="POST">';
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
			echo'<option value="Status">Status</option>';
		echo'</select>';
		echo '<p>If you are entering an Item Category, please choose from this list: Clothing, Jewelry, Bag, Keys, Office Supplies, Shoes, Electronic Devices, Misc. </p>';
		echo '<p>If you wish to change the location, please enter the id of the location you want based on the table below. </p>';
	echo '<p>New Value:<input type="text" name="newValue" value="'. $newValue . '"> </p>';
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