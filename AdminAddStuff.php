<!--
Jessica Rieger and Victoria Confeiteiro
November 10, 2016
Admin Add Stuff page
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Add Items</title>
		<link rel="stylesheet" type="text/css" href="AddAdmin.css">
	</head>
	<body>
		<img src = "IMG_6150.PNG" alt = "Limbo" height="100" width="130">
		<hr>
		<div class = "div1">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/AdminHomepage.php">Back to Admin Homepage</a></h5>
		</div>
		<div class = "div2">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/AdminUpdateItemInfo.php">Update Stuff </a></h5>
		</div>
		<div class = "div3">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/AdminDeleteStuff.php">Delete Stuff</a><h5>
		</div> 
		
		<br>
		<h1 class="custom">Add Items</h1>
		<h2 class="custom">Please enter the information about the item you have lost or found.</h2>
		<h3 class="custom">Once the form is submitted, your item will be added to the database.</h3>
		<h4 class="custom">All items marked with a * are required.</h4>
	
</html>
<?php
	
	#Connect to MySQL server and the database
	require( 'includes/connect_db.php' ) ;
		
	# Includes these helper functions
	require( 'includes/helpers.php' ) ;
		
# Checks if the user has entered information before
if ($_SERVER['REQUEST_METHOD']=='GET'){
		$Icat = "";
		$Iname = "";
		$descr = "";
		$location= "";
		$date = "";
		$room = "";
		$owner = "";
		$oPhoneNumber = "";
		$oEmail = "";
		$finder = "";
		$fPhoneNumber = "";
		$fEmail = "";
		if(isset($_GET['id'])){
			show_record_info($dbc, $_GET['id']) ;
		
		}
		
	}
	
if ($_SERVER['REQUEST_METHOD']=='POST'){
	
	$Icat = $_POST['categories'];
	$Iname = $_POST['Iname'];
	$descr = $_POST['descr'];
	$location = $_POST['buildings'];
	$date = $_POST['Date'];
	$room = $_POST['room'];
	$owner = $_POST['owner'];
	$oPhoneNumber = $_POST['oPhoneNumber'];
	$oEmail = $_POST['oEmail'];
	$finder = $_POST['finder'];
	$fPhoneNumber = $_POST['fPhoneNumber'];
	$fEmail = $_POST['fEmail'];
	if($finder == "")
	{
		$status = "Lost";
	}
	else
	{
		$status = "Found";
	}
	
	
	# Creates errors array
	$errors = array();
	
	#Validates input

	if(!valid_formEntry($Iname))
      $errors[] = 'Iname';
	else{
		$descr = trim($Iname); 
		}
	if(!valid_formEntry($descr))
      $errors[] = 'Description';
	else{
		$descr = trim($descr); 
		}
	
	if (!empty($errors))
	{
		echo '<p class="custom" style="color:red;"> Error! Please enter: ';
		foreach ($errors as $field){echo " -$field " ;}
	}
    else{
      $result = insert_recordAdmin($dbc, $Icat, $Iname, $descr, $location, $date, $room, $owner, $oPhoneNumber, $oEmail, $finder, $fPhoneNumber, $fEmail, $status) ;
      echo '<h2 class ="custom" style="color:red;"> Success! Thanks"</h2>';
	 
	  } 
	 
}

show_formAdmin($Icat, $Iname, $descr, $location, $date, $room, $owner, $oPhoneNumber, $oEmail, $finder, $fPhoneNumber, $fEmail);
function show_formAdmin($Icat, $Iname, $descr, $location, $date, $room, $owner, $oPhoneNumber, $oEmail, $finder, $fPhoneNumber, $fEmail){
echo '<form action ="AdminAddStuff.php" method="POST" class="custom">';
echo'<h4>Item Information:</h4>';
echo'<center>';
echo'<p> Item Category *: <select name="categories">';
					echo'<option value="Clothing">Clothing</option>';
					echo'<option value="Jewelry">Jewelry</option>';
					echo'<option value="Bag">Bag</option>';
					echo'<option value="Keys/ID">Keys/ID</option>';
					echo'<option value="Office supplies">Office supplies</option>';
					echo'<option value="Shoes">Shoes</option>';
					echo'<option value="Electronic Device">Electronic Device</option>';
					echo'<option value="Misc.">Misc.</option>';
					
				echo'</select>';
echo'<p>Item Name *: <input type="text" name="Iname" value = "' . $Iname . '"> </p>';
echo'<p>Item description (Include distinguishing details (unique scratches, marks, etc)):</p>';
echo'<textarea name = "descr" rows = "10" cols = "60" value = "' . $descr . '"> </textarea>';
echo'<p> Please select the building closest to where you lost your item below *: </p> <select name="buildings">';
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
					
				echo'</select>';
	echo'<p>Room Lost (if applicable): <input type="text" name="room" value = "' . $room . '"> </p>';
	echo'<p>Please enter the approximate date you lost the item below: (yyyy-dd-mm) </p> <input type="text" name="Date" value = "' . $date . '">';
	echo '<p>Owner Name:<input type="text" name="owner" value="'. $owner . '"> </p>';
	echo '<p>Owner Telephone Number:<input type="text" name="oPhoneNumber" value = "' . $oPhoneNumber . '"> </p>';
	
	echo'<p>Owner Email Address: <input type="text" name="oEmail" value = "' . $oEmail . '"> </p>';
	echo '<p>Finder Name:<input type="text" name="finder" value="'. $finder . '"> </p>';
	echo '<p>Finder Telephone Number:<input type="text" name="fPhoneNumber" value = "' . $fPhoneNumber . '"> </p>';
	
	echo'<p>Finder Email Address: <input type="text" name="fEmail" value = "' . $fEmail . '"> </p>';
	echo'<p> Please email a photograph if you have one to: Jessica.Rieger1@marist.edu</p>';
	echo'<p> Click the ID of the item in the table below to learn more about it.</p>';
	echo'<p><input type="submit"></p>';
	echo'</center>'; 
	echo'</form>';
}
		
	#Shows a quick links table
	show_link_recordsAdminAdd($dbc);
		
	#Close the connection
	mysqli_close( $dbc ) ;
	
?>