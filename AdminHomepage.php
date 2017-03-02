<!--
Jessica Rieger and Victoria Confeiteiro
November 10, 2016
Admin Homepage
New (11/20)
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Admin Homepage</title>
		<link rel="stylesheet" type="text/css" href="AddAdmin.css">
	</head>
	<body>
		<img src = "IMG_6150.PNG" alt = "Limbo" height="100" width="130">
		<hr>
		<img src = "lost-and-found.png" alt = "Lost and found sign" height="150" width="200" class="centeringIMG">
		<h1 class="custom">Welcome to your Admin Homepage!</h1>
		<h2 class="custom"> Please select a button to get started.<h2>
		<img src = "CONTACTUS-lostandfound.jpeg" alt = "Lost and Found Tag" height="125" width="275" class="centeringIMG">
		<br>
		<TABLE style="margin: auto;">
			<TR>
				<TD><button type="button"><a href = "http://127.0.0.1:8888/AdminDeleteStuff.php">Admin Delete Stuff</a></button></TD>
				<TD><button type="button"><a href = "http://127.0.0.1:8888/AdminUpdateItemInfo.php">Admin Update Stuff</a></button></TD>
				<TD><button type="button"><a href = "http://127.0.0.1:8888/AdminUpdatePersonalInfo.php">Update Personal Info</a></button></TD>
			</TR>

				<TD><button type="button"><a href = "http://127.0.0.1:8888/AdminQuickLinks.php">Check Limbo</a></button></TD>
				<TD><button type="button"><a href = "http://127.0.0.1:8888/AdminAddStuff.php">Add Stuff</a></button></TD>
				<TD><button type="button"><a href = "http://127.0.0.1:8888/SplashPage.php">Back to Limbo Homepage</a></button></TD>
				
		</TABLE>
		<br>
	</body>
</html>

<?php
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;
session_start( );
$id = $_SESSION['id'];
#echo'ID: ' . $id;
/*
echo'<form action="AdminHomepage.php" method="POST">';
echo'<p><input type="submit" value = "Update personal info"></p>';
echo'</form>';
if($_SERVER['REQUEST_METHOD']=='POST'){
	$_SESSION['id'] = $id;
	load('AdminUpdatePersonalInfo.php', $id);
}*/
		  



# Close the connection
mysqli_close( $dbc ) ;
?>