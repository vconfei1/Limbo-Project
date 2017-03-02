<!--
Jessica Rieger and Victoria Confeiteiro
December 4, 2016
Add Admin Page
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Add an Admin</title>
		<link rel="stylesheet" type="text/css" href="AddAdmin.css">
	</head>
	<body>
		<img src = "IMG_6150.PNG" alt = "Limbo" height="100" width="130">
		<hr>
		<div class = "div1">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/SuperAdminHomepage.php">Back to Super Admin Homepage</a><h2>
		</div>
		<div class = "div2">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/SAAdminAccountUpdate.php">Update Account Info</a>
		</div>
		<div class = "div3">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/SuperAdminDeleteAdmin.php">Delete Admin</a>
		</div>

		<br>
		<h1 class="custom">Add an Admin</h1>
		<h2 class="custom"> Please enter the information of the admin you would like to add. Fields with a * are required.<h2>
		<h3 class="custom">Once the form is submitted, the admin will be added.</h3>

<?php
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;


echo'<h4 class="custom">Admin Information:</h4> ';
# Checks if the user has entered information before
if ($_SERVER['REQUEST_METHOD']=='GET'){
	$username = "";
	$fname = "";
	$lname = "";
	$email = "";
	$pass = "";
	$reg_date = "";
	$securityquestion = "";
	$response ="";
	}
	
if ($_SERVER['REQUEST_METHOD']=='POST'){
	
	$username = $_POST['username'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$pass = SHA1($pass);
	$reg_date = $_POST['reg_date'];
	$securityquestion = $_POST['securityquestion'];
	$response = $_POST['response'];
	
	# Creates errors array
	$errors = array();
	
	#Validates input

	if(!valid_formEntry($username))
      $errors[] = 'Username';
	else{
		$username = trim($username); 
		}
	if(!valid_formEntry($pass))
		$errors[] = 'pass';
	else{
		$pass = trim($pass); 
	}
	if(!valid_formEntry($lname))
		$errors[] = 'lname';
	else{
		$lname = trim($lname); 
	}
	if(!valid_formEntry($securityquestion))
		$errors[] = 'security question';
	else{
		$securityquestion = trim($securityquestion); 
	}
	if(!valid_formEntry($response))
		$errors[] = 'response';
	else{
		$response = trim($response); 
	}
	
	if (!empty($errors))
	{
		echo '<p class="custom" style="color:red;"> Error! Please enter your: ';
		foreach ($errors as $field){echo " -$field " ;}
	}
    else{
      $result = insert_admin($dbc,$username, $fname, $lname, $email, $pass, $reg_date, $securityquestion, $response);
      echo '<h2 class="custom" style="color:red;"> Success! Thanks"</h2>';
    } 
	 
}

show_form($username,  $fname, $lname, $email, $pass, $reg_date, $securityquestion, $response);
function show_form($username,  $fname, $lname, $email, $pass, $reg_date, $securityquestion, $response){
echo '<form action ="AddAdmin.php" method="POST" class="custom">';
	echo '<p class="custom">Username *:<input type="text" name="username" value="'. $username . '"> </p>';
	echo '<p class="custom">First Name:<input type="text" name="fname" value = "' . $fname . '"> </p>';
	echo '<p class="custom">Last Name *:<input type="text" name="lname" value = "' . $lname . '"> </p>';
	echo '<p class="custom">Email Address: <input type="text" name="email" value = "' . $email . '"> </p>';
	echo '<p class="custom">Password *: <input type="password" name="pass" value = "' . $pass . '"> </p>';
	echo '<p class="custom">Email Address: <input type="text" name="reg_date" value = "' . $reg_date . '"> </p>';
	echo '<p class="custom">Security Question *: <input type="text" name="securityquestion" value = "' . $securityquestion . '"> </p>';
	echo '<p class="custom">Response *: <input type="text" name="response" value = "' . $response . '"> </p>';
	echo'<p class="custom"><input type="submit"></p>';
	echo'</form>';
}
# Close the connection
mysqli_close( $dbc ) ;
?>