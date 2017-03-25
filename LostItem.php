<!--
Jessica Rieger and Victoria Confeiteiro
November 10, 2016
Lost Item Page

-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Report a Lost Item</title>
		<link rel="stylesheet" type="text/css" href="QLUFLItem.css">
	</head>
	<body>
		<img src = "IMG_6150.PNG" alt = "Limbo" height="100" width="130">
		<hr>
		<div class = "div1">
		<h4 class="custom"><a href = "http://127.0.0.1:8888/SplashPage.php"> Back to Main Page </a></h4>
		</div>
		<div class = "div2">
		<h4 class="custom"><a href = "http://127.0.0.1:8888/UpdateItemInfo.php"> Update Item Info</a></h4>
		</div>
		<div class = "div3">
		<h4 class="custom"><a href = "http://127.0.0.1:8888/FoundItem.php"> Enter a Found Item </a></h4>
		</div>
		<br>
		<h1>Lost Item Form</h1>
		<h2>Enter information about the item you lost. Fields with a * are required.<h2>
		<h3>Once the form is submitted we will show you any items we have currently that match the item you described.</h3>
		<h4>Owner's Information:</h4> 
		<?php
			# Connect to MySQL server and the database
			require( 'includes/connect_db.php' ) ;

			# Includes these helper functions
			require( 'includes/helpers.php' ) ;
			
			echo'<p> If you have questions, please contact Jessica.Rieger1@marist.edu';

			# Checks if the user has entered information before
			if ($_SERVER['REQUEST_METHOD']=='GET'){
				$owner = "";
				$oPhoneNumber = "";
				$oEmail = "";
				$Icat = "";
				$Iname = "";
				$descr = "";
				$location= "";
				$date = "";
				$room = "";
			}
	
			if ($_SERVER['REQUEST_METHOD']=='POST'){
				$owner = $_POST['owner'];
				$oPhoneNumber = $_POST['oPhoneNumber'];
				$oEmail = $_POST['oEmail'];
				$Icat = $_POST['categories'];
				$Iname = $_POST['Iname'];
				$descr = $_POST['descr'];
				$location = $_POST['buildings'];
				$date = $_POST['Date'];
				$room = $_POST['room'];
				$status = "Lost";
	
	# Creates errors array
	$errors = array();
	
	#Validates input

	if(!valid_formEntry($owner))
      $errors[] = 'Name';
	else{
		$owner = trim($owner); 
	}
	if(!valid_formEntry($oPhoneNumber))
      $errors[] = 'Phone Number';
	else{
		$oEmail = trim($oPhoneNumber); 
	}
	if(!valid_formEntry($descr))
      $errors[] = 'Description';
	else{
		$descr = trim($descr); 
		}
	if(!valid_formEntry($Iname))
		$errors[] = 'Item Name';
	else{
		$Iname = trim($Iname); 
	}
	
	if (!empty($errors))
	{
		echo '<p style="color:red;"> Error! Please enter your: ';
		foreach ($errors as $field){echo " -$field " ;}
	}
    else{
      $result = insert_record($dbc,$owner, $oPhoneNumber, $oEmail, $Icat, $Iname, $descr, $location, $date, $room, $status) ;
      echo '<h4 style="color:red;"> Success! Thanks "'. $owner . '"</h4>';
	  } 
	 
}

show_form($owner, $oPhoneNumber, $oEmail, $Icat, $Iname, $descr, $location, $date, $room);
function show_form($owner, $oPhoneNumber, $oEmail, $Icat, $Iname, $descr, $location, $date, $room){
echo '<form align="center" action ="LostItem.php" method="POST">';
	echo '<p>Name *:<input type="text" name="owner" value="'. $owner . '"> </p>';
	echo '<p>Telephone Number *:<input type="text" name="oPhoneNumber" value = "' . $oPhoneNumber . '"> </p>';
	
	echo'<p>Email Address: <input type="text" name="oEmail" value = "' . $oEmail . '"> </p>';

echo'<h4>Lost Item Information:</h4>';
echo'<p> Item Category: <select name="categories">';
					echo'<option value="Clothing">Clothing</option>';
					echo'<option value="Jewelry">Jewelry</option>';
					echo'<option value="Bag">Bag</option>';
					echo'<option value="Keys/ID">Keys/ID</option>';
					echo'<option value="Office Supplies">Office supplies</option>';
					echo'<option value="Shoes">Shoes</option>';
					echo'<option value="Electronic Device">Electronic Device</option>';
					echo'<option value="Misc.">Misc.</option>';
					
				echo'</select>';
echo'<p>Item Name *: <input type="text" name="Iname" value = "' . $Iname . '"> </p>';
echo'<p>Item description (Include distinguishing details (unique scratches, marks, etc)):</p>';
echo'<textarea name = "descr" rows = "10" cols = "30" value = "' . $descr . '"> </textarea>';
echo'<p> Please select the building closest to where you lost your item *: </p> <select name="buildings">';
					echo'<option value="Beck Parking Lot">Beck Parking Lot</option>';
					echo'<option value="Benoit and Gregory Houses">Benoit and Gregory Houses</option>';
					echo'<option value="Byrne House">Byrne House</option>';
					echo'<option value="Champagnat Hall">Champagnat Hall</option>';
					echo'<option value="Donnelly Hall">Donnelly Hall</option>';
					echo'<option value="Dyson">Dyson</option>';
					echo'<option value="Fern Tor">Fern Tor</option>';
					echo'<option value="Sheahan">Sheahan</option>';
					echo'<option value="West Cedar">West Cedar</option>';
					echo'<option value="Student Center">Student Center</option>';
					echo'<option value="Steel Plant Studio">Steel Plant Studio</option>';
					echo'<option value="St. Peter\'s">St. Peter\'s</option>';
					echo'<option value="St. Ann\'s Hermitage">St. Ann\'s Hermitage</option>';
					echo'<option value="Our Lady Seat of Wisdom Chapel">Our Lady Seat of Wisdom Chapel</option>';
					echo'<option value="Upper New">Upper New</option>';
					echo'<option value="Lower New">Lower New</option>';
					echo'<option value="The Martin Boathouse">The Martin Boathouse</option>';
					echo'<option value="Marian Hall">Marian Hall</option>';
					echo'<option value="Lowell Thomas Center">Lowell Thomas Center</option>';
					echo'<option value="Leonidoff Field">Leonidoff Field</option>';
					echo'<option value="Leo Hall">Leo Hall</option>';
					echo'<option value="The Kirk Hall">The Kirk Hall</option>';
					echo'<option value="Kieran Gatehouse">Kieran Gatehouse</option>';
					echo'<option value="McCann Recreation Center">McCann Recreation Center</option>';
					echo'<option value="James A. Cannavino Library">James A. Cannavino Library</option>';
					echo'<option value="Greystone">Greystone</option>';
					echo'<option value="New Gartland">New Gartland</option>';
					echo'<option value="Foy Townhouses">Foy Townhouses</option>';
					echo'<option value="Fontaine">Fontaine</option>';
					echo'<option value="Midrise Hall">Midrise Hall</option>';
					echo'<option value="Hancock">Hancock</option>';
					echo'<option value="Dining Hall">Dining Hall</option>';
					
				echo'</select>';
echo'<p>Room Lost (if applicable): <input type="text" name="room" value = "' . $room . '"> </p>';
echo'<p>Please choose the approximate date you lost the item: (yyyy-dd-mm) </p> <input type="text" name="Date" value = "' . $date . '">';

echo'<p> Please email a photograph if you have one to: Jessica.Rieger1@marist.edu</p>';

	echo'<p><input type="submit"></p>';
	echo'</form>';
}

# Close the connection
mysqli_close( $dbc ) ;
?>