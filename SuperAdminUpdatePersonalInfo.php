<!--
Jessica Rieger and Victoria Confeiteiro
December 4, 2016
Admin update personal info
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Account Info Update</title>
		<link rel="stylesheet" type"text/css" href="SAstylesheet.css">
	</head>
	<body>
		<img src = "IMG_6150.PNG" alt = "Limbo" height="100" width="130">
		<hr>
		<img src = "lost-and-found.png"alt = "Lost and found sign" height="150" width="200" class="centeringIMG">
		<h1>Your Personal Account Info</h1>
		<h2> Here is your account info, please select the column that you wish to midify and then enter the value you wish to insert.</h2>
		<h4 class="custom">All fields below are required</h4>
		<div class="div1">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/SuperAdminHomepage.php">Back to Super Admin Homepage</a></h5>
		</div>
	</body>
</html>

<?php
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;

session_start( );
$id = $_SESSION['id'];
#Show the records
show_records_sadminPersonalInfo($dbc, $id);

# Checks if the user has entered information before
if ($_SERVER['REQUEST_METHOD']=='GET'){
		$category = "";
		$newValue = "";
		
	}
	
if ($_SERVER['REQUEST_METHOD']=='POST'){
	
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
				if(!valid_formEntry($newValue))
					$errors[] = 'New Value';
				else{
					$newValue = trim($newValue); 
				}
				
				if (!empty($errors))
				{
					echo '<p style="color:red;"> Error! Please enter your: ';
					foreach ($errors as $field){echo " -$field " ;}
				}
				else{
					
					
					$result = update_sadminPersonalInfo($dbc, $id, $category, $newValue);
					show_query($result);
					
				}
}
show_form_updateSAdmin($dbc, $category, $newValue);
function show_form_updateSAdmin($dbc, $category, $newValue){
	echo '<form action ="SuperAdminUpdatePersonalInfo.php" method="POST">';
	echo '<p>Select the column you wish to modify:<select name="categories">';
						echo'<option value="sa_username">Username</option>';
						echo'<option value="sa_fname">First Name</option>';
						echo'<option value="sa_lname">Last Name</option>';
						echo'<option value="sa_email">Email</option>';
						echo'<option value="sa_pass">Password</option>';
						echo'<option value="sa_reg_date">reg. date</option>';
						echo'<option value="sa_securityquestion">Security Question</option>';
						echo'<option value="sa_response">Response</option>';
						echo'</select>';
	echo '<p>If you are entering a date, please enter it in the form yyyy/dd/mm.</p>';
	echo '<p>New Value:<input type="text" name="newValue" value="'. $newValue . '"> </p>';
	echo'<p><input type="submit"></p>';
	echo'</form>';	
}



# Close the connection
mysqli_close( $dbc ) ;
?>