<!--
Jessica Rieger and Victoria Confeiteiro
December 4, 2016
Super Admin Forgot Password
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Super Admin Forgot Password</title>
		<link rel="stylesheet" type="text/css" href="SAstylesheet.css">
	</head>
	<body>
		<img src="IMG_6150.PNG" alt = "Limbo" height="100" width="130">
		<hr>
		<div class="div1">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/SuperAdminLogin.php">Back to Super Admin Login</a></h5>
		</div>
		<br>
			<h1 class="custom">Forgot Password?</h1>
			<h4 class="custom">No Problem! </h4>
</html>		
<?php
	# Connect to MySQL server and the database
	require( 'includes/connect_db.php' ) ;

	# Includes these helper functions
	require( 'includes/helpers.php' ) ;
	
	if ($_SERVER['REQUEST_METHOD']=='GET'){
		$username = "";
		$response = "";
		$newpassword = "";
	}
	if ($_SERVER['REQUEST_METHOD']=='POST'){
		$username = $_POST['username'];
		$response = $_POST['response'];
		$newpassword = $_POST['newpassword'];
		$newpassword = SHA1($newpassword);
		$result = validate_questionSA($dbc, $username, $response, $newpassword);
		if($result)
		{
			echo'<p class="custom">Thank you, your password has been changed.';
			echo'<p>';
			echo'<p><a href = "http://127.0.0.1:8888/SuperAdminLogin.php">Click Here to go back to the login page</a>';
		}
		else
		{
			echo'<p>Failed, please try again.';
		}
		
	}
	
show_securityquestionsSA($dbc);

	
	echo'<p>If you have forgotten your password, please fill out the form below and hit submit.';
		echo'<form align="center" action="SuperAdminForgotPassword.php" method="POST">';
		echo'<p>Please type your username, answer its corrosponding security question, and fill in the new password you would like to use.</p>';
		echo'<p>Username: <input type="text" name="username" value = "'. $username .'"></p>';
		echo'<p>Response: <input type="text" name="response" value = "'. $response .'"></p>';
		echo'<p>New Password: <input type="text" name="newpassword" value = "'. $newpassword .'"></p>';
		echo'<p><input type="submit"></p>';
		echo'</form>';

	
	
	






# Close the connection
mysqli_close( $dbc ) ;
?>
</html>