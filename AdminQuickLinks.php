<!--
Jessica Rieger and Victoria Confeiteiro
December 4, 2016
Admin Quick Links page
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Limbo Database</title>
		<link rel="stylesheet" type="text/css" href="AddAdmin.css">
	</head>
	<body>
		<img src = "IMG_6150.PNG" alt = "Limbo" height="100" width="130">
		<hr>
		<img src = "lost-and-found.png"alt = "Lost and found sign" height="175" width="275" class="centeringIMG">
		<h1 class="custom">Limbo Items</h1>
		<h3 class="custom"> Here is a list of items in our database. To see more information about an item, click it's ID.</h3>
		<TABLE style="margin: auto;">
			<TR>
				<TD><button type="button"><a href = "http://127.0.0.1:8888/AdminAddStuff.php">Add an Item</a></button></TD>
				<TD><button type="button"><a href = "http://127.0.0.1:8888/AdminDeleteStuff.php">Delete an Item</a></button></TD>
			</TR>
		</TABLE>
		<div class = "div1">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/AdminHomepage.php">Back to Admin Homepage</a></h5>
		</div>
		<hr>
	</body>
</html>

<?php
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;

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
show_link_recordsAdmin($dbc);
show_form_search($dbc, $column, $descr);

function show_form_search($dbc, $column, $descr){
	#echo'<p> Hello';
	echo '<form action ="AdminQuickLinks.php" method="POST" class="centering">';
		echo '<p class="custom">Select the column you wish to search by:<select name="column">';
		echo'<option value="finder">Finder</option>';
			echo'<option value="owner">Owner\'s Name</option>';
			echo'<option value="Icat">Item Category</option>';
			echo'<option value="Iname">Item Name</option>';
			echo'<option value="descr">Item Description</option>';
			echo'<option value="Ilocation">Location</option>';
			echo'<option value="Status">Status</option>';
		echo'</select>';
				echo '<p class="custom">Enter the keywords you wish to search by:<input type="text" name="descr" value="'. $descr . '"> </p>';
						
	echo'<p class="custom"><input type="submit"></p>';
	echo'</form>';	
}




?>