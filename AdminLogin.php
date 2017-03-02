<!--
Jessica Rieger and Victoria Confeiteiro
November 30, 2016
Admin Login
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Admin Login</title>
		<link rel="stylesheet" type="text/css" href="AddAdmin.css">
	</head>
	<body>
		<img src="IMG_6150.PNG" alt = "Limbo" height="100" width="130">
		<hr>
		<h1 class="custom">Admin Login</h1>
		<h4 class="custom">Enter your login information, then hit submit</h4>
		<div class ="div1">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/SplashPage.php"> Back to Limbo HomePage </a></h5>
		</div>
</html>
		
<?php
	# Connect to MySQL server and the database
	require( 'includes/connect_db.php' ) ;

	# Includes these helper functions
	require( 'includes/helpers.php' ) ;
	
	# Checks if the user has entered information before
if ($_SERVER['REQUEST_METHOD']=='GET'){
		$username = "";
		$password = "";
	}
	
if ($_SERVER['REQUEST_METHOD']=='POST'){
	
	$username = $_POST['username'];
	$password = $_POST['pass'];
	$password = SHA1($password);
	$user_id = validate($username, $password);
	
	
	$user_id = validate($username, $password) ;
	
      if($user_id == -1)
	  {
		  echo'<p style=color:red class="custom">Login failed please try again</p>';
	  }
	  else
	  {
		  $query = 'SELECT user_id FROM users WHERE username = "' . $username . '"';
		  $result = mysqli_query($dbc, $query);
		  $row = mysqli_fetch_array( $result , MYSQLI_ASSOC );
		  $id = $row['user_id'];
		  session_start( );
		  $_SESSION['id'] = $id;
		  load('AdminHomepage.php', $id);
	  }
	    	
}
		echo'<form action="AdminLogin.php" method="POST" class="custom">';
		echo'<p>Username: <input type="text" name="username" value = "'. $username .'"></p>';
		echo'<p>Password: <input type="password" name="pass" value = "'. $password .'"></p>';
		echo'<p><input type="submit"></p>';
		echo'</form>';
		echo'<h4 class="custom"><a href = "http://127.0.0.1:8888/AdminForgotPassword.php"> Forgot Password?</a></h4>';
		echo'<p>';




# Close the connection
mysqli_close( $dbc ) ;
?>
</html>