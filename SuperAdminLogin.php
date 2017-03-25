<!--
Jessica Rieger and Victoria Confeiteiro
December 4, 2016
Super Admin Login
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Super Admin Login</title>
		<link rel="stylesheet" type="text/css" href="SAstylesheet.css">
	</head>
	<body>
		<img src="IMG_6150.PNG" alt = "Limbo" height="100" width="130">
		<hr>
		<div class="div1">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/SplashPage.php">Back to Limbo Homepage</a></h5>
		</div> 
		<h1 class="custom">Super Admin Login</h1>
		<h4 class="custom">Enter your login information, then hit submit</h4>
	</body>
</html>
		
<?php
	# Connect to MySQL server and the database
	require( 'includes/connect_db.php' ) ;

	# Includes these helper functions
	require( 'includes/helpers.php' ) ;
	
	# Checks if the user has entered information before
if ($_SERVER['REQUEST_METHOD']=='GET'){
		$sa_username = "";
		$sa_pass = "";
	}
	
if ($_SERVER['REQUEST_METHOD']=='POST'){
	
	$sa_username = $_POST['sa_username'];
	$sa_pass = $_POST['sa_pass'];
	$sa_pass = SHA1($sa_pass);
	$sa_id = validateSA($sa_username, $sa_pass);
	
      if($sa_id == -1)
	  {
		echo'<p style=color:red class="custom">Login failed please try again</p>';
	  }
	  else{
		  loadSA('SuperAdminHomepage.php', $sa_id); 
	  }
	    	
}
		echo'<form align="center" action="SuperAdminLogin.php" method="POST">';
		echo'<p class="custom">Username: <input type="text" name="sa_username" value = "'. $sa_username .'"></p>';
		echo'<p class="custom">Password: <input type="password" name="sa_pass" value = "'. $sa_pass .'"></p>';
		echo'<p class="custom"><input type="submit"></p>';
		echo'</form>';
	
	echo'<p class="custom"><a href = "http://127.0.0.1:8888/SuperAdminForgotPassword.php"> Forgot Password?</a></p>';

# Close the connection
mysqli_close( $dbc ) ;
?>
</html>