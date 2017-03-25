<!--
Jessica Rieger and Victoria Confeiteiro
December 4, 2016
Quick Links page
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Limbo Database</title>
		<link rel="stylesheet" type="text/css" href="QuickLinks.css">
	</head>
	<body>
		<img src = "IMG_6150.PNG" alt = "Limbo" height="100" width="130">
		<hr>
		<img src = "lost-and-found.png"alt = "Lost and found sign" height="175" width="275" class="centeringIMG">
		<h1 class="centering">Limbo Items</h1>
		<h2 class="centering"> Here is a list of items in our database. Please look at it and select items for more information, or search the database below.</h2>
		<h3 class="centering">To claim an item, go to the Update Item Info Page.</h3>
		<p class="centering"> If you have questions, please contact Jessica.Rieger1@marist.edu</p>
		<br>
		<TABLE class="centering">
			<TR>
				<TD><button type="button"><a href = "http://127.0.0.1:8888/LostItem.php">Lost an Item</a></button></TD>
				<TD><button type="button"><a href = "http://127.0.0.1:8888/FoundItem.php">Found an Item</a></button></TD>
				<TD><button type="button"><a href = "http://127.0.0.1:8888/UpdateItemInfo.php">Update Item Info</a></button></TD>
				<TD><button type="button"><a href = "http://127.0.0.1:8888/SplashPage.php">Back to Limbo HomePage</a></button></TD>
			</TR>
		</TABLE>
		<br>
		<hr>
	</body>
</html>

<?php
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;


echo'<br>';
if($_SERVER[ 'REQUEST_METHOD' ] == 'GET') {
	$column = "";
	$descr = "";
	if(isset($_GET['id'])){
		show_record($dbc, $_GET['id']) ;
		
	}
}
if ($_SERVER['REQUEST_METHOD']=='POST'){
			$column = $_POST['column'];
			$descr = $_POST['descr'];
	
			keyword_search($dbc, $column, $descr);		
}

#Show the records
show_link_records($dbc);
show_form_search($dbc, $column, $descr);

function show_form_search($dbc, $column, $descr){
	#echo'<p> Hello';
	echo '<form action ="QuickLinks.php" method="POST" class="centering">';
		echo '<p class="custom">Select the column you wish to search by:<select name="column">';
		echo'<option value="finder">Finder</option>';
			echo'<option value="owner">Owner\'s Name</option>';
			echo'<option value="Icat">Item Category</option>';
			echo'<option value="Iname">Item Name</option>';
			echo'<option value="descr">Item Description</option>';
			echo'<option value="Ilocation">Location</option>';
			echo'<option value="Status">Status</option>';
		echo'</select>';
				echo '<p>Enter the keywords you wish to search by:<input type="text" name="descr" value="'. $descr . '"> </p>';
						
	echo'<p><input type="submit"></p>';
	echo'</form>';	
}

# Close the connection
mysqli_close( $dbc ) ;
?>