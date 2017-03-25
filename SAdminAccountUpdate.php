<!--
Jessica Rieger and Victoria Confeiteiro
December 4, 2016
Super Admin Admin Account update
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Account Info Update</title>
		<link rel="stylesheet" type="text/css" href="SAstylesheet.css">
	</head>
	<body>
		<img src = "IMG_6150.PNG" alt = "Limbo" height="100" width="130">
		<hr>
		<img src = "lost-and-found.png"alt = "Lost and found sign" height="150" width="200" class="centeringIMG">
		<br>
		<div class = "div1">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/SuperAdminHomepage.php"> Back to Super Admin Homepage </a></h5>
		</div>
		<div class = "div2">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/AddAdmin.php" >Add Admin</a></h5>
		</div>
		<div id = "div3">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/SuperAdminDeleteAdmin.php"> Delete Admin </a></h5>
		</div>
		<h1 class="custom">Admin Accounts</h1>
		<h3 class="custom">Here is a list of all the admins, please select the column that you wish to modify and then enter the value you wish to insert.</h3>
	
	</body>
</html>

<?php

# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;

show_users($dbc);

# Checks if the user has entered information before
if ($_SERVER['REQUEST_METHOD']=='GET'){
		$id = "";
		$category = "";
		$newValue = "";	
	}
	
if ($_SERVER['REQUEST_METHOD']=='POST'){
	$id = $_POST['user_id'];
	$category = $_POST['categories'];
	$newValue = $_POST['newValue'];
	
	# Creates errors array
				$errors = array();
	
				#Validates input
				if(!valid_formEntry($category))
					$errors[] = 'category';
				else{
					$category = trim($category); 
				}
				#Validates input
				if(!valid_formEntry($id))
					$errors[] = 'ID';
				else{
					$id = trim($id); 
				}
				
				if(!valid_formEntry($newValue))
					$errors[] = 'New Value';
				else{
					$newValue = trim($newValue); 
				}
				
				if (!empty($errors))
				{
					echo '<p style="color:red;" class="custom"> Error! Please enter your: ';
					foreach ($errors as $field){echo " -$field " ;}
				}
				else{
					$result = SAupdate_adminPersonalInfo($dbc, $id, $category, $newValue);
					show_query($result);
				}
}
show_form_updateAdmin($dbc, $id, $category, $newValue);
function show_form_updateAdmin($dbc, $id, $category, $newValue){
	echo '<form align="center" action ="SAdminAccountUpdate.php" method="POST">';
	echo '<p>ID:<input type="text" name="user_id" value="'. $id . '"> </p>';
	echo '<p>Select the column you wish to modify:<select name="categories">';
						echo'<option value="username">Username</option>';
						echo'<option value="first_name">First Name</option>';
						echo'<option value="last_name">Last Name</option>';
						echo'<option value="email">Email</option>';
						echo'<option value="pass">Password</option>';
						echo'<option value="reg_date">reg. date</option>';
						echo'<option value="securityquestion">Security Question</option>';
						echo'<option value="response">Response</option>';
						echo'</select>';
	echo '<p>If you are entering a date, please enter it in the form yyyy/dd/mm.</p>';
	echo '<p>New Value:<input type="text" name="newValue" value="'. $newValue . '"> </p>';
	echo '<p><input type="submit"></p>';
	echo '</form>';	
}

# Close the connection
mysqli_close( $dbc ) ;
?>