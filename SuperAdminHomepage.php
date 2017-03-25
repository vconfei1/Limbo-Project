<!--
Jessica Rieger and Victoria Confeiteiro
December 4, 2016
Super Admin Homepage
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Super Admin Homepage</title>
		<link rel="stylesheet" type="text/css" href="SAstylesheet.css">
	</head>
	<body>
		<img src = "IMG_6150.PNG" alt = "Limbo" height="100" width="130">
		<hr>
		<img src = "lost-and-found.png"alt = "Lost and found sign" height="150" width="200" class="centeringIMG">
		<h1>Welcome to your Super Admin Homepage!</h1>
		<h2> Please select a button to get started.<h2>
		<img src = "CONTACTUS-lostandfound.jpeg" alt = "Lost and Found Tag" height="125" width="275">
		<TABLE align="center">
			<TR>
				<TD><button type="button"><a href = "http://127.0.0.1:8888/SuperAdminDeleteStuff.php">Delete Stuff</a></button></TD>
				<TD><button type="button"><a href = "http://127.0.0.1:8888/SuperAdminUpdateItemInfo.php">Update Stuff</a></button></TD>
				<TD><button type="button"><a href = "http://127.0.0.1:8888/SuperAdminDeleteAdmin.php">Delete Admin</a></button></TD>
				<TD><button type="button"><a href = "http://127.0.0.1:8888/SuperAdminUpdatePersonalInfo.php">Update Personal Info</a></button></TD>
				<TD><button type="button"><a href = "http://127.0.0.1:8888/SplashPage.php">Back to Limbo Homepage</a></button></TD>
			</TR>

				<TD><button type="button"><a href = "http://127.0.0.1:8888/SuperAdminQuickLinks.php">Check Limbo</a></button></TD>
				<TD><button type="button"><a href = "http://127.0.0.1:8888/SAdminAddStuff.php">Add Stuff</a></button></TD>
				<TD><button type="button"><a href = "http://127.0.0.1:8888/AddAdmin.php">Add Admin</a></button></TD>
				<TD><button type="button"><a href = "http://127.0.0.1:8888/SAdminAccountUpdate.php">Edit Admin Information</a></button></TD>
				
				
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