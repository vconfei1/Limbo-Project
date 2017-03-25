<!--
Jessica Rieger and Victoria Confeiteiro
December 4, 2016
Landing Page With Its Links
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Limbo!</title>
		<link rel="stylesheet" type="text/css" href="QuickLinks.css">
	</head>
	<body>
		<img src = "IMG_6150.PNG" alt = "Limbo" height="100" width="130">
		<hr>
		<img src = "lost-and-found.png"alt = "Lost and found sign" height="150" width="200" class="centeringIMG">
		<h1 class="centering">Welcome to Limbo!</h1>
		<h2 class="centering"> If you've lost or found and item you're in the right place! <br/> Please select an item below to get started<h2>
		<img src = "CONTACTUS-lostandfound.jpeg" alt = "Lost and Found Tag" height="125" width="275" class="centeringIMG">
		<TABLE class = "centering">
			<TR>
				<TD><button type="button"><a href = "http://127.0.0.1:8888/AdminLogin.php">Admin Login</a></button></TD>
				<TD><button type="button"><a href = "http://127.0.0.1:8888/SuperAdminLogin.php">Super Admin Login</a></button></TD>
			</TR>
			<TR>
				<TD><button type="button"><a href = "http://127.0.0.1:8888/LostItem.php">Lost an Item</a></button></TD>
				<TD><button type="button"><a href = "http://127.0.0.1:8888/FoundItem.php">Found an Item</a></button></TD>
			</TR>
				<TD><button type="button"><a href = "http://127.0.0.1:8888/QuickLinks.php">Check Limbo</a></button></TD>
				<TD><button type="button"><a href = "http://127.0.0.1:8888/UpdateItemInfo.php">Update Item Info</a></button></TD>
		</TABLE>
	</body>
</html>

<?php
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;

# Close the connection
mysqli_close( $dbc ) ;
?>