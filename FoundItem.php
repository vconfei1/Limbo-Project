<!--
Jessica Rieger and Victoria Confeiteiro
December 4, 2016
Found Item Page
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Report a Found Item</title>
		<link rel="stylesheet" type="text/css" href="FoundItem.css">
	</head>
	<body>
		<img src = "IMG_6150.PNG" alt = "Limbo" height="100" width="130">
		<hr>
		<div class = "div1">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/SplashPage.php">Back to Main Page</a></h5>
		</div>
		<div class = "div2">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/UpdateItemInfo.php">Update Item Info</a></h5>
		</div>
		<div class = "div3">
			<h5 class="custom"><a href = "http://127.0.0.1:8888/LostItem.php">Lost Item</a></h5>
		</div>
		
		<br>
		
		<h1 class="custom">Found Item Form</h1>
		<h2 class="custom">Enter information about the item you Found. Fields with a * are required.</h2>
		<h3 class="custom">Once the form is submitted, it will be entered into the database.</h3>
		<h4 class="custom">Item Information</h4>
		<?php
			# Connect to MySQL server and the database
			require( 'includes/connect_db.php' ) ;

			# Includes these helper functions
			require( 'includes/helpers.php' ) ;
			
			echo'<p class="custom">If you have questions, please contact Jessica.Rieger1@marist.edu';
			echo'<br>';
			if ($_SERVER['REQUEST_METHOD']=='GET'){
				$name = "";
				$number = "";
				$email = "";
				$Icat = "";
				$Iname = "";
				$descr = "";
				$location = "";
				$date = "";	
				$room = "";
			}
			
			if ($_SERVER['REQUEST_METHOD']=='POST'){
				$name = $_POST['name'];
				$number = $_POST['number'];
				$email = $_POST['Email'];
				$Icat = $_POST['categories'];
				$Iname = $_POST['ItemName'];
				$descr = $_POST['descr'];
				$location = $_POST['buildings'];
				$date = $_POST['Date'];	
				$room = $_POST['room'];
				$status = "Found";
				
				# Creates errors array
				$errors = array();
	
				#Validates input
				if(!valid_formEntry($name))
					$errors[] = 'Name';
				else{
					$owner = trim($name); 
				}
				if(!valid_formEntry($number))
					$errors[] = 'Phone Number';
				else{
					$oEmail = trim($number); 
				}
				if(!valid_formEntry($descr))
					$errors[] = 'Description';
				else{
					$descr = trim($descr); 
				}
				if(!valid_formEntry($Icat))
					$errors[] = 'Item category';
				else{
					$Icat = $Icat; 
				}
				if(!valid_formEntry($Iname))
					$errors[] = 'Item Name';
				else{
					$Iname = trim($Iname); 
				}
				if (!empty($errors))
				{
					echo '<p style="color:red;" class="custom"> Error! Please enter your: ';
					foreach ($errors as $field){echo " -$field " ;}
				}
				else{
				
					$result = insert_recordfinder($dbc, $name, $number, $email, $Icat, $Iname, $descr, $location, $date, $room, $status);
					echo '<h4 style="color:red;"> Success! Thanks "'. $name . '"</h4>';
				}
	
		}
	
		show_form_FoundItem($name, $number, $email, $Icat, $Iname, $descr, $location, $date, $room);
		function show_form_FoundItem($name, $number, $email, $Icat, $Iname, $descr, $Ilocation, $date, $room){
			echo'<form action ="FoundItem.php" method="POST" class="custom">';
			echo'<p>Name *:<input type="text" name="name" value="' . $name . '"> </p>';
			echo'<p>Telephone Number *:<input type="text"  name="number" value="' . $number . '"> </p>';
			echo'<p>Email Address: <input type="text" name="Email" value="' . $email . '"> </p>';
			echo'<h4>Found Item Information</h4>';
			echo'<p>Item Category *: <select name="categories">';
						echo'<option value="Clothing">Clothing</option>';
						echo'<option value="Jewelry">Jewelry</option>';
						echo'<option value="Bag">Bag</option>';
						echo'<option value="Books">Textbook/Notebook</option>';
						echo'<option value="Keys/ID">Keys/ID</option>';
						echo'<option value="Office supplies">Office supplies</option>';
						echo'<option value="Shoes">Shoes</option>';
						echo'<option value="Electronic Device">Electronic Device</option>';
						echo'<option value="Misc.">Misc.</option>';
					echo'</select>';
		echo'<p>Item Name *: <input type="text" name="ItemName"  value="' . $Iname . '"> </p>';
		echo'<p>Item description (include distinguishing details such as unique marks, scratches, etc.):</p>';
				echo'<textarea name = "descr" rows = "10" cols = "50"  value="' . $descr . '"> </textarea>';
		echo'<p> Please select the building closest to where you found your item *: <select name="buildings"> </p>';
						echo'<option value="Beck Parking Lot">Beck Parking Lot</option>';
						echo'<option value="Benoit and Gregory Houses">Benoit and Gregory Houses</option>';
						echo'<option value="Byrne House">Byrne House</option>';
						echo'<option value="Champagnat Hall">Champagnat Hall</option>';
						echo'<option value="Donnelly Hall">Donnelly Hall</option>';
						echo'<option value="Dyson">Dyson</option>';
						echo'<option value="Fern Tor">Fern Tor</option>';
						echo'<option value="Sheahan">Sheahan</option>';
						echo'<option value="Upper West Cedar Townhouses">Upper West Cedar Townhouses</option>';
						echo'<option value="Lower West Cedar Townhouses">Lower West Cedar Townhouses</option>';
						echo'<option value="Student Center">Student Center</option>';
						echo'<option value="Steel Plant Studio">Steel Plant Studio</option>';
						echo'<option value="St. Peter\'s">St. Peter\'s</option>';
						echo'<option value="St. Ann\'s Hermitage">St. Ann\'s Hermitage</option>';
						echo'<option value="Our Lady Seat of Wisdom Chapel">Our Lady Seat of Wisdom Chapel</option>';
						echo'<option value="Upper New Townhouses">Upper New Townhouses</option>';
						echo'<option value="Lower New Townhouses">Lower New Townhouses</option>';
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
			echo'<p>Please enter the room number you found the item in: <input type="text" name="room" value="' . $room . '" ></p>';
			echo'<p>Please enter the date you found the item(yyyy-dd-mm): <input type="text" name="Date" value="' . $date . '" ></p>';
			echo'<p>Please email a photograph if you have one to: Jessica.Rieger1@marist.edu</p>';
			echo'<p><input type="submit"></p>';
			echo'</form>';
		}
		
		# Close the connection
		mysqli_close( $dbc ) ;
	?>
	
