<?php
$debug = true;
/*
Jessica Rieger and Victoria Confeiteiro
December 4, 2016
Limbo Project
helpers.php
*/

#Used in Quick Links Page, shows an abbreviated version of the limbo table
#Displays the item id as an anchor link, when clicked will display all item info
#Displays Date Reported, Item Name, Location, and Status
function show_link_records($dbc) {
	# Create a query to get the id, create_date, item name, item location, and status sorted by create_date
	$query = 'SELECT id, create_date, Iname, Ilocation, status FROM stuff ORDER BY create_date DESC' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<TABLE border = "1" align="center">';
  		echo '<TR>';
		echo '<TH>id</TH>';
  		echo '<TH>Date Reported</TH>';
		echo '<TH>Item Name</TH>';
  		echo '<TH>Location</TH>';
		echo '<TH>Status</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
			#adds the anchor link and appropriate table data
			$alink = '<A HREF=QuickLinks.php?id=' . $row['id'] . '>' . $row['id'] . '</A>' ;
			echo '<TD ALIGN=right>' . $alink . '</TD>' ;
    		echo '<TD>' . $row['create_date'] . '</TD>' ;
			echo '<TD>' . $row['Iname'] . '</TD>' ;
    		echo '<TD>' . $row['Ilocation'] . '</TD>' ;
			echo '<TD>' . $row['status'] . '</TD>' ;
			echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

#Used in Quick Links Page, shows an abbreviated version of the limbo table
#Displays the item id as an anchor link, when clicked will display all item info
#Displays Date Reported, Item Name, Location, and Status
#for the keyword search
function show_link_recordsKEY($dbc, $column, $keyword) {
	# Create a query to get the id, create_date, item name, item location, and status sorted by create_date
	$query = 'SELECT id, create_date, Iname, Ilocation, status FROM stuff WHERE ' . $column . ' LIKE "' . $keyword . '" ORDER BY create_date DESC' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<TABLE border = "1" align="center">';
  		echo '<TR>';
		echo '<TH>id</TH>';
  		echo '<TH>Date Reported</TH>';
		echo '<TH>Item Name</TH>';
  		echo '<TH>Location</TH>';
		echo '<TH>Status</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
			#adds the anchor link and appropriate table data
			$alink = '<A HREF=QuickLinks.php?id=' . $row['id'] . '>' . $row['id'] . '</A>' ;
			echo '<TD ALIGN=right>' . $alink . '</TD>' ;
    		echo '<TD>' . $row['create_date'] . '</TD>' ;
			echo '<TD>' . $row['Iname'] . '</TD>' ;
    		echo '<TD>' . $row['Ilocation'] . '</TD>' ;
			echo '<TD>' . $row['status'] . '</TD>' ;
			echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

#Used in Admin Quick Links Page, shows an abbreviated version of the limbo table
#Displays the item id as an anchor link, when clicked will display all item info
#Displays Date Reported, Item Name, Location, and Status
function show_link_recordsSA($dbc) {
	# Create a query to get the id, create_date, item name, item location, and status sorted by create_date
	$query = 'SELECT id, create_date, Iname, Ilocation, status FROM stuff ORDER BY create_date DESC' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<TABLE border = "1" align="center">';
  		echo '<TR>';
		echo '<TH>id</TH>';
  		echo '<TH>Date Reported</TH>';
		echo '<TH>Item Name</TH>';
  		echo '<TH>Location</TH>';
		echo '<TH>Status</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
			#adds the anchor link and appropriate table data
			$alink = '<A HREF=SuperAdminQuickLinks.php?id=' . $row['id'] . '>' . $row['id'] . '</A>' ;
			echo '<TD ALIGN=right>' . $alink . '</TD>' ;
    		echo '<TD>' . $row['create_date'] . '</TD>' ;
			echo '<TD>' . $row['Iname'] . '</TD>' ;
    		echo '<TD>' . $row['Ilocation'] . '</TD>' ;
			echo '<TD>' . $row['status'] . '</TD>' ;
			echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

#Used in Quick Links Page, shows an abbreviated version of the limbo table
#Displays the item id as an anchor link, when clicked will display all item info
#Displays Date Reported, Item Name, Location, and Status
#for the keyword search
function show_link_recordsSAKEY($dbc, $column, $keyword) {
	# Create a query to get the id, create_date, item name, item location, and status sorted by create_date
	$query = 'SELECT id, create_date, Iname, Ilocation, status FROM stuff WHERE ' . $column . ' LIKE "' . $keyword . '" ORDER BY create_date DESC' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<TABLE border = "1" align="center">';
  		echo '<TR>';
		echo '<TH>id</TH>';
  		echo '<TH>Date Reported</TH>';
		echo '<TH>Item Name</TH>';
  		echo '<TH>Location</TH>';
		echo '<TH>Status</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
			#adds the anchor link and appropriate table data
			$alink = '<A HREF=SuperAdminQuickLinks.php?id=' . $row['id'] . '>' . $row['id'] . '</A>' ;
			echo '<TD ALIGN=right>' . $alink . '</TD>' ;
    		echo '<TD>' . $row['create_date'] . '</TD>' ;
			echo '<TD>' . $row['Iname'] . '</TD>' ;
    		echo '<TD>' . $row['Ilocation'] . '</TD>' ;
			echo '<TD>' . $row['status'] . '</TD>' ;
			echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

#Used in Quick Links Page, shows an abbreviated version of the limbo table
#Displays the item id as an anchor link, when clicked will display all item info
#Displays Date Reported, Item Name, Location, and Status
#for the keyword search
function show_link_recordsAdminKEY($dbc, $column, $keyword) {
	# Create a query to get the id, create_date, item name, item location, and status sorted by create_date
	$query = 'SELECT id, create_date, Iname, Ilocation, status FROM stuff WHERE ' . $column . ' LIKE "' . $keyword . '" ORDER BY create_date DESC' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<TABLE border = "1" align="center">';
  		echo '<TR>';
		echo '<TH>id</TH>';
  		echo '<TH>Date Reported</TH>';
		echo '<TH>Item Name</TH>';
  		echo '<TH>Location</TH>';
		echo '<TH>Status</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
			#adds the anchor link and appropriate table data
			$alink = '<A HREF=AdminQuickLinks.php?id=' . $row['id'] . '>' . $row['id'] . '</A>' ;
			echo '<TD ALIGN=right>' . $alink . '</TD>' ;
    		echo '<TD>' . $row['create_date'] . '</TD>' ;
			echo '<TD>' . $row['Iname'] . '</TD>' ;
    		echo '<TD>' . $row['Ilocation'] . '</TD>' ;
			echo '<TD>' . $row['status'] . '</TD>' ;
			echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

#Used in Quick Links Page, shows an abbreviated version of the limbo table
#Displays the item id as an anchor link, when clicked will display all item info
#Displays Date Reported, Item Name, Location, and Status
function show_link_recordsSAdd($dbc) {
	# Create a query to get the id, create_date, item name, item location, and status sorted by create_date
	$query = 'SELECT id, create_date, Iname, Ilocation, status FROM stuff ORDER BY create_date DESC' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<TABLE border = "1" align="center">';
  		echo '<TR>';
		echo '<TH>id</TH>';
  		echo '<TH>Date Reported</TH>';
		echo '<TH>Item Name</TH>';
  		echo '<TH>Location</TH>';
		echo '<TH>Status</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
			#adds the anchor link and appropriate table data
			$alink = '<A HREF=SAdminAddStuff.php?id=' . $row['id'] . '>' . $row['id'] . '</A>' ;
			echo '<TD ALIGN=right>' . $alink . '</TD>' ;
    		echo '<TD>' . $row['create_date'] . '</TD>' ;
			echo '<TD>' . $row['Iname'] . '</TD>' ;
    		echo '<TD>' . $row['Ilocation'] . '</TD>' ;
			echo '<TD>' . $row['status'] . '</TD>' ;
			echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

# Shows abbreviated Limbo table for the Admin Quick Links page, includes item id, date reported
# location and item status
function show_link_recordsAdmin($dbc) {
	# Create a query to get the id, create_date, item location, and status sorted by create_date
	$query = 'SELECT id, create_date, Ilocation, status FROM stuff ORDER BY create_date DESC' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<TABLE border = "1" align="center">';
  		echo '<TR>';
		echo '<TH>id</TH>';
  		echo '<TH>Date Reported</TH>';
  		echo '<TH>Location</TH>';
		echo '<TH>Status</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
			#adds the anchor link and appropriate table data
			$alink = '<A HREF=AdminQuickLinks.php?id=' . $row['id'] . '>' . $row['id'] . '</A>' ;
			echo '<TD ALIGN=right>' . $alink . '</TD>' ;
    		echo '<TD>' . $row['create_date'] . '</TD>' ;
    		echo '<TD>' . $row['Ilocation'] . '</TD>' ;
			echo '<TD>' . $row['status'] . '</TD>' ;
			echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

# Displays an abbreviated limbo table for the Admin Update page, displays the item id, date reported
# Location and status of the item
function show_link_recordsAdminUpdate($dbc) {
	# Create a query to get the id, create_date, item location, and status sorted by create_date
	$query = 'SELECT id, create_date, Ilocation, status FROM stuff ORDER BY create_date DESC' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<TABLE border = "1" align="center">';
  		echo '<TR>';
		echo '<TH>id</TH>';
  		echo '<TH>Date Reported</TH>';
  		echo '<TH>Location</TH>';
		echo '<TH>Status</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
			#adds the anchor link and appropriate table data
			$alink = '<A HREF=AdminUpdateItemInfo.php?id=' . $row['id'] . '>' . $row['id'] . '</A>' ;
			echo '<TD ALIGN=right>' . $alink . '</TD>' ;
    		echo '<TD>' . $row['create_date'] . '</TD>' ;
    		echo '<TD>' . $row['Ilocation'] . '</TD>' ;
			echo '<TD>' . $row['status'] . '</TD>' ;
			echo '</TR>' ;
  		}

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
	# Create a query to show the locatons table
	$query2 = 'SELECT id, name FROM locations ORDER BY id ASC' ;

	# Execute the query
	$results2 = mysqli_query( $dbc , $query2 ) ;
	check_results($results2) ;
	if($results2)
	{
		# End the table
  		echo '</TABLE>';
		
		echo '<TABLE border = "1" align="center">';
  		echo '<TR>';
		echo '<TH>ID</TH>';
		echo '<TH>Name</TH>';
  		echo '</TR>';
		
		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results2 , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
    		echo '<TD>' . $row['id'] . '</TD>' ;
    		echo '<TD>' . $row['name'] . '</TD>' ; 
			echo '</TR>' ;
  		}
	}
}

#Displays abbreviate Limbo table for Admin Add stuff page
#Displays item id, date created, item location, and staus
function show_link_recordsAdminAdd($dbc) {
	# Create a query to get the id, create_date, item location, status sorted by create_date
	$query = 'SELECT id, create_date, Ilocation, status FROM stuff ORDER BY create_date DESC' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<TABLE border = "1" align="center">';
  		echo '<TR>';
		echo '<TH>id</TH>';
  		echo '<TH>Date Reported</TH>';
  		echo '<TH>Location</TH>';
		echo '<TH>Status</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
			#adds the anchor link and appropriate table data
			$alink = '<A HREF=AdminAddStuff.php?id=' . $row['id'] . '>' . $row['id'] . '</A>' ;
			echo '<TD ALIGN=right>' . $alink . '</TD>' ;
    		echo '<TD>' . $row['create_date'] . '</TD>' ;
    		echo '<TD>' . $row['Ilocation'] . '</TD>' ;
			echo '<TD>' . $row['status'] . '</TD>' ;
			echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

#Displays abbreviated Limbo table for Admin Delete stuff page
#Displays item id, date created, item location and item status
function show_link_recordsAdminDelete($dbc) {
	# Create a query to get the id, create_date, item location, and status sorted by create_date
	$query = 'SELECT id, create_date, Ilocation, status FROM stuff ORDER BY create_date DESC' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<TABLE border = "1" align="center">';
  		echo '<TR>';
		echo '<TH>id</TH>';
  		echo '<TH>Date Reported</TH>';
  		echo '<TH>Location</TH>';
		echo '<TH>Status</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
			#adds the anchor link and appropriate table data
			$alink = '<A HREF=AdminDeleteStuff.php?id=' . $row['id'] . '>' . $row['id'] . '</A>' ;
			echo '<TD ALIGN=right>' . $alink . '</TD>' ;
    		echo '<TD>' . $row['create_date'] . '</TD>' ;
    		echo '<TD>' . $row['Ilocation'] . '</TD>' ;
			echo '<TD>' . $row['status'] . '</TD>' ;
			echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

#Displays more informaton about an item when the anchor link is clicked
function show_record($dbc, $id) {
	# Create a query to get the id, create date, update date, category, decription, item location, finder, room, owner, and status where id = the parameter value
	$query = 'SELECT id, create_date, update_date, Icat, descr, Ilocation, finder, room, owner, status FROM stuff WHERE id = ' . $id ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<TABLE border = "1" align="center">';
  		echo '<TR>';
		echo '<TH>id</TH>';
  		echo '<TH>Date Reported</TH>';
		echo '<TH>Date Updated</TH>';
		echo '<TH>Item Category</TH>';
		echo '<TH>Item Description</TH>';
		echo '<TH>Location</TH>';
		echo '<TH>room</TH>';
		echo '<TH>finder</TH>';
		echo '<TH>owner</TH>';
		echo '<TH>Status</TH>';
  		echo '</TR>';
		
  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
			echo '<TD>' . $row['id'] . '</TD>' ;

    		echo '<TD>' . $row['create_date'] . '</TD>' ;
    		echo '<TD>' . $row['update_date'] . '</TD>' ;
			echo '<TD>' . $row['Icat'] . '</TD>' ;
			echo '<TD>' . $row['descr'] . '</TD>' ;
			echo '<TD>' . $row['Ilocation'] . '</TD>' ;
			echo '<TD>' . $row['room'] . '</TD>' ;
			echo '<TD>' . $row['finder'] . '</TD>' ;
			echo '<TD>' . $row['owner'] . '</TD>' ;
			echo '<TD>' . $row['status'] . '</TD>' ;
    		echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';
		echo '<hr>';
  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

#Displays entire stuff table
function show_records($dbc) {
	# Create a query to get the id, location_id, create_date, update_date, finder, room, owner where id = the parameter value
	$query = 'SELECT id, create_date, update_date, finder, fPhoneNumber, fEmail, room, owner, oPhoneNumber, oEmail, Icat, Iname, descr, Ilocation, LostDate, FoundDate, status FROM stuff' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		
  		echo '<TABLE border = "1" align="center">';
  		echo '<TR>';
		echo '<TH>id</TH>';

		echo '<TH>Date Reported</TH>';
		echo '<TH>Date Updated</TH>';
		echo '<TH>finder</TH>';
		echo '<TH>fPhoneNumber</TH>';
		echo '<TH>fEmail</TH>';
		echo '<TH>room</TH>';
		echo '<TH>owner</TH>';
		echo '<TH>oPhoneNumber</TH>';
		echo '<TH>oEmail</TH>';
		echo '<TH>Icat</TH>';
		echo '<TH>Iname</TH>';
		echo '<TH>descr</TH>';
		echo '<TH>Ilocation</TH>';
  		echo '<TH>Lost Date</TH>';
		echo '<TH>FoundDate</TH>';
		echo '<TH>Status</TH>';
  		
  		echo '</TR>';
		
  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
			echo '<TD>' . $row['id'] . '</TD>' ;
    		echo '<TD>' . $row['create_date'] . '</TD>' ;
    		echo '<TD>' . $row['update_date'] . '</TD>' ;
			echo '<TD>' . $row['finder'] . '</TD>' ;
			echo '<TD>' . $row['fPhoneNumber'] . '</TD>' ;
			echo '<TD>' . $row['fEmail'] . '</TD>' ;
			echo '<TD>' . $row['room'] . '</TD>' ;
			echo '<TD>' . $row['owner'] . '</TD>' ;
			echo '<TD>' . $row['oPhoneNumber'] . '</TD>' ;
			echo '<TD>' . $row['oEmail'] . '</TD>' ;
			echo '<TD>' . $row['Icat'] . '</TD>' ;
			echo '<TD>' . $row['Iname'] . '</TD>' ;
			echo '<TD>' . $row['descr'] . '</TD>' ;
			echo '<TD>' . $row['Ilocation'] . '</TD>' ;
			echo '<TD>' . $row['LostDate'] . '</TD>' ;
			echo '<TD>' . $row['FoundDate'] . '</TD>' ;
			echo '<TD>' . $row['status'] . '</TD>' ;
    		echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';
		echo '<hr>';
  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

#Shows users table for admin personal info update page
#Admin is then able to edit information on this table 
function show_records_adminPersonalInfo($dbc, $id) {
	# Create a query to get the user id, username, first name, last name, email, reg date where id = the parameter value
	$query = 'SELECT user_id, username, first_name, last_name, email, reg_date, securityquestion, response FROM users WHERE user_id = ' . $id ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		
  		echo '<TABLE border = "1" align="center">';
  		echo '<TR>';
		echo '<TH>ID</TH>';
		echo '<TH>Username</TH>';
		echo '<TH>First Name</TH>';
		echo '<TH>Last Name</TH>';
		echo '<TH>Email</TH>';
		echo '<TH>reg_date</TH>';
		echo '<TH>Security Question</TH>';
		echo '<TH>Response</TH>';
  		echo '</TR>';
		
  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
			echo '<TD>' . $row['user_id'] . '</TD>' ;
    		echo '<TD>' . $row['username'] . '</TD>' ;
    		echo '<TD>' . $row['first_name'] . '</TD>' ;
			echo '<TD>' . $row['last_name'] . '</TD>' ;
			echo '<TD>' . $row['email'] . '</TD>' ;
			echo '<TD>' . $row['reg_date'] . '</TD>' ;
			echo '<TD>' . $row['securityquestion'] . '</TD>' ;
			echo '<TD>' . $row['response'] . '</TD>' ;
    		echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';
		echo '<hr>';
  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

#Shows sa_users table for super admin personal info update page 
#Super Admins are then able to edit the information on this table
function show_records_sadminPersonalInfo($dbc, $id) {
	# Create a query to get the user id, username, first name, last name, email, reg date where id = the parameter value
	$query = 'SELECT sa_id, sa_username, sa_fname, sa_lname, sa_email, sa_reg_date, sa_securityquestion, sa_response FROM super WHERE sa_id = ' . $id ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		
  		echo '<TABLE border = "1" align="center">';
  		echo '<TR>';
		echo '<TH>ID</TH>';
		echo '<TH>Username</TH>';
		echo '<TH>First Name</TH>';
		echo '<TH>Last Name</TH>';
		echo '<TH>Email</TH>';
		echo '<TH>reg_date</TH>';
		echo '<TH>Security Question</TH>';
		echo '<TH>Response</TH>';
  		echo '</TR>';
		
  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
			echo '<TD>' . $row['sa_id'] . '</TD>' ;
    		echo '<TD>' . $row['sa_username'] . '</TD>' ;
    		echo '<TD>' . $row['sa_fname'] . '</TD>' ;
			echo '<TD>' . $row['sa_lname'] . '</TD>' ;
			echo '<TD>' . $row['sa_email'] . '</TD>' ;
			echo '<TD>' . $row['sa_reg_date'] . '</TD>' ;
			echo '<TD>' . $row['sa_securityquestion'] . '</TD>' ;
			echo '<TD>' . $row['sa_response'] . '</TD>' ;
    		echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';
		echo '<hr>';
  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

#Inserts a lost record into the stuff table
function insert_record($dbc, $name, $number, $email, $Icat, $Iname, $descr, $location, $date, $room, $status) {  #Creates the query that inserts the create date, update date, finder, phone number, email, category, name, descrption, location, found date, room and status of a lost item into the stuff table
  #Creates a query that the amdin uses to insert create date, update date, item category, item name, description, location, lost name, room, owner, phone number, email, finder, finder's phone number, and finder's email int the stuff table
  $query = 'INSERT INTO stuff(create_date, update_date, owner, oPhoneNumber, oEmail, Icat, Iname, descr, Ilocation,  LostDate, room, status) VALUES (Now(), Now(), "' . $name . '", "' . $number . '", "' . $email . '", "' . $Icat . '", "' . $Iname . '", "' .$descr . '", "' . $location . '" , "' . $date . '", "' . $room . '", "' . $status . '" )' ;
  show_query($query);
	echo 'called';
  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;
  
  $query2 = 'UPDATE stuff SET location_id = (SELECT id FROM locations WHERE name = "' . $location . '")';
  $results2 = mysqli_query($dbc,$query2) ;
  echo $query2;

  return $results ;
}


#Inserts a found record into the stuff table
function insert_recordfinder($dbc, $name, $number, $email, $Icat, $Iname, $descr, $location, $date, $room, $status) {
  #Creates the query that inserts the create date, update date, finder, phone number, email, category, name, descrption, location, found date, room and status of a lost item into the stuff table
  #Creates a query that the amdin uses to insert create date, update date, item category, item name, description, location, lost name, room, owner, phone number, email, finder, finder's phone number, and finder's email int the stuff table
  $query = 'INSERT INTO stuff(create_date, update_date, finder, fPhoneNumber, fEmail, Icat, Iname, descr, Ilocation,  FoundDate, room, status) VALUES (Now(), Now(), "' . $name . '", "' . $number . '", "' . $email . '", "' . $Icat . '", "' . $Iname . '", "' .$descr . '", "' . $location . '" , "' . $date . '", "' . $room . '", "' . $status . '" )' ;
  show_query($query);
	echo 'called';
  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;
  
  $query2 = 'UPDATE stuff SET location_id = (SELECT id FROM locations WHERE name = "' . $location . '")';
  $results2 = mysqli_query($dbc,$query2) ;
  echo $query2;

  return $results ;
}

#Admin insert record into stuff table
#Used on the admin add stuff page
function insert_recordAdmin($dbc, $Icat, $Iname, $descr, $location, $date, $room,  $owner, $oPhoneNumber, $oEmail, $finder, $fPhoneNumber, $fEmail, $status) {
  #Creates a query that the amdin uses to insert create date, update date, item category, item name, description, location, lost name, room, owner, phone number, email, finder, finder's phone number, and finder's email int the stuff table
  $query = 'INSERT INTO stuff(create_date, update_date, Icat, Iname, descr, Ilocation, LostDate, room,  owner, oPhoneNumber, oEmail, finder, fPhoneNumber, fEmail, status) VALUES (Now(), Now(), "' . $Icat . '", "' . $Iname . '", "' . $descr . '", "' . $location . '", "' . $date . '", "' .$room . '", "' . $owner . '" , "' . $oPhoneNumber . '", "' . $oEmail . '", "' . $finder . '", "' . $fPhoneNumber . '", "' . $fEmail . '", "' . $status . '" )' ;
  show_query($query);

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;
  
  $query2 = 'UPDATE stuff SET location_id = (SELECT id FROM locations WHERE name = "' . $location . '")';
  $results2 = mysqli_query($dbc,$query2) ;
  echo $query2;

  return $results ;
}

#Shows the query as a debugging aid
function show_query($query) {
  #Creates global variable
  global $debug;
  #Displays the query on the form
  if($debug)
    echo "<p>Query = $query</p>";
}

#Checks the query results as a debugging aid
function check_results($results) {
  #Creates global variable
  global $dbc;
  #Displays the error on the form
  if($results != true)
    echo '<p>SQL ERROR = ' . mysqli_error( $dbc ) . '</p>'  ;


}

#update existing record
function update_record($dbc, $id, $category, $newValue, $newStatus){
	
	#Checks to see if all the form entries are valid, if not all the errors are put into an array and displayed
	if(!valid_formEntry($id))
      $errors[] = 'ID';
	else{
		$id = trim($id); 
	}
		
	if(!valid_formEntry($category))
	{
      $errors[] = 'category';
	}
	else{
		$category = trim($category); 
		if($category != "status")
		{
			if(!valid_formEntry($newValue))
				$errors[] = 'New Value';
			else{
				$newValue = trim($newValue); 
			}
			
		}
		
	}
	if (!empty($errors))
	{
		echo '<p style="color:red;" align = "center"> Error! Please enter your: ';
		foreach ($errors as $field){echo " -$field " ;}
	}
	else {
			$results = FALSE;
			$results2 = FALSE;
			$results4 = FALSE;
			$results3 = FALSE;
			if($category != "status"){
				
				#Creates the query to update item based on the categor chosen by the user
				$query = 'UPDATE stuff SET ' . $category . ' = "'. $newValue . '" WHERE id = '. $id;
				#Sets the update date and the date the previous query was executed
				$results = mysqli_query($dbc, $query);
			}
			
			if($newStatus != "None")
			{
				$query3 = 'UPDATE stuff SET status = "'. $newStatus . '" WHERE id = '. $id;
				$results3 = mysqli_query($dbc, $query3);
				
			}
			$query2 = 'UPDATE stuff SET update_date = now() WHERE id = '. $id;
			$results2 = mysqli_query($dbc, $query2);
			if($category = "Ilocation")
			{
				#sets the location to the word where the id is the same.
				$query2 = 'UPDATE stuff SET Ilocation = (SELECT name FROM locations WHERE id = ' . $newValue . ') WHERE id = ' . $id;
				$results2 = mysqli_query($dbc,$query2) ;
				$query4 = 'UPDATE stuff SET location_id = '. $newValue . ' WHERE id = ' . $id;
				$results4 = mysqli_query($dbc,$query4) ;
				
			}
			#Displays the query and a success message if the query was successful
			if ($results || ($results4 && $results2) || $results3){
				
				echo '<h2 style="color:red;" align = "center"> Success! Thanks!</h2>';
				
				echo '<h2 style="color:red;" align = "center"> New Limbo Database: </h2>';
				show_link_records_info($dbc); 
				#show_link_recordsAdminUpdate($dbc);
			}
			
			else {
				#Displays that the update failed if the query was unsuccessful
				echo '<h2 style="color:red;" align = "center"> your update failed </h2>';
			}
		}
			
}

#Update Item Status (Lost, Claimed, Found) for a specfic item in the stuff table
#Used to claim and item
function update_status($dbc, $id, $newStatus)
{
			#Query that changes the status for a chosen object
			$query = 'UPDATE stuff SET status = "'. $newStatus . '" WHERE id =' . $id;
			echo '" '. $query . '"';
			$results = mysqli_query($dbc, $query);
			if ($results){
				#Displayed if the query is successful
				echo '<h2 style="color:red;"> Success! Thanks!</h2>';
				echo '<h2 style="color:red;"> New Limbo: </h2>';
				#show_link_records($dbc);
			}
			else {
				#Displayed if the query fails
				echo '<h2 style="color:red;"> your update failed </h2>';
			}
}
			
#Admin Update Admin Personal Info 
#Used to update the users table, based on admin input
function update_adminPersonalInfo($dbc, $id, $category, $newValue)
{	
			#Creates a query to updte the chosen cateory of Admin table
			$query = 'UPDATE users SET ' . $category . ' = "'. $newValue . '" WHERE user_id =' . $id;
			echo '" '. $query . '"';
			$results = mysqli_query($dbc, $query);
			
			if ($results){
				#Displayed if the update is successful
				echo '<h2 style="color:red;"> Success! Thanks!</h2>';
				echo'<h2><a href = "http://127.0.0.1:8888/AdminHomepage.php" style="color:blue;" > Back to Homepage </a><h2>';
				echo '<h2 style="color:red;"> New Personal Info: </h2>';
				show_records_adminPersonalInfo($dbc, $id);
			}
			else {
				#Displayed if the update fails
				echo '<h2 style="color:red;"> your update failed </h2>';
			}
}

#Super Admin Update Admin Personal Info 
#Used to update the sa_users table, based on super admin input
function SAupdate_adminPersonalInfo($dbc, $id, $category, $newValue)
{	
			#Creates a query to updte the chosen cateory of Admin table
			$query = 'UPDATE users SET ' . $category . ' = "'. $newValue . '" WHERE user_id =' . $id;
			echo '" '. $query . '"';
			$results = mysqli_query($dbc, $query);
			
			if ($results){
				#Displayed if the update is successful
				echo'<h3 style="color:red; align="center">Success! Thanks!</h3>';
				echo'<h5 align="center"><a href = "http://127.0.0.1:8888/SuperAdminHomepage.php" style="color:blue;">Back to Super Admin Homepage</a><h5>';
				echo'<h4 align="center" style="color:red;"> New Admin List: </h4>';
				show_users($dbc);
			}
			else {
				#Displayed if the update fails
				echo '<h4 align="center" style="color:red;">Your update failed, please try again! </h4>';
			}
}

#Super Admin Update Admin Personal Info 
function update_sadminPersonalInfo($dbc, $id, $category, $newValue)
{
			#Creates a query to updte the chosen cateory of Admin table
			$query = 'UPDATE super SET ' . $category . ' = "'. $newValue . '" WHERE sa_id =' . $id;
			echo '" '. $query . '"';
			$results = mysqli_query($dbc, $query);
			if ($results){
				#Displayed if the update is successful
				echo '<h2 style="color:red;"> Success! Thanks!</h2>';
				echo'<h2><a href = "http://127.0.0.1:8888/SuperAdminHomepage.php" style="color:blue;" > Back to Homepage </a><h2>';
				echo '<h2 style="color:red;"> New Personal Info: </h2>';
				show_records_sadminPersonalInfo($dbc, $id);
			}
			else {
				#Displayed if the update fails
				echo '<h2 style="color:red;"> your update failed </h2>';
			}
}

#Validates Admin Login information
#Used on admin login page
#Password is hashed used SHA1
function validate_user($dbc, $username, $password)
{
	#Creates a query that selects all the information in the row of the users table, where the username and password are equal to those that were inputted by the user
	$query = 'SELECT * FROM users WHERE username = "' . $username . '" AND pass = "' . $password . '" ';
    show_query($query);
	$result = mysqli_query($dbc, $query);
	if(mysqli_num_rows($result) == 0)
	{
		return false;
	}
	else{
		return true;
	}
}	

#Shows the security questions to the admin on the AdminForgotPassword page
#Used to validate admin identity, before admin is allowed to change their information
function show_securityquestions($dbc){
	#Creates a query that selects the security question for the indicated user.
	$query = 'SELECT username, securityquestion FROM users';
    show_query($query);
	$result = mysqli_query($dbc, $query);
	if( $result )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		
  		echo '<TABLE align="center" border = "1">';
  		echo '<TR>';
		echo '<TH>Username</TH>';
		echo '<TH>Security Question</TH>';
  		echo '</TR>';
		
  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $result , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
			echo '<TD>' . $row['username'] . '</TD>' ;
			echo '<TD>' . $row['securityquestion'] . '</TD>' ;

    		echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';
		echo '<hr>';
  		# Free up the results in memory
  		mysqli_free_result( $result ) ;
	}
}

#Checks security question response and updates password if correct for admins
#Password has been previously hashed using SHA1
function validate_question($dbc, $username, $response, $newpassword)
{
	#Creates a query that checks the question
	$query = 'SELECT response FROM users WHERE username = "' . $username . '"';
	
	#Displays query on form
    show_query($query);
	$result = mysqli_query($dbc, $query);
	$row = mysqli_fetch_array( $result , MYSQLI_ASSOC );
	echo $row['response'];
	if(strtolower($row['response']) == strtolower($response))
	{
		
		$query2 = 'UPDATE users SET pass = "' . $newpassword . '" WHERE username = "' . $username . '"';
		$result = mysqli_query($dbc, $query2);
		return TRUE;
	}
	return FALSE;
}

#Shows the security question to the super admin on the Super AdminForgotPassword page
#Validates identity of super admin, before they can change their password
#Password has been previously using SHA1
function show_securityquestionsSA($dbc){
	#Creates a query that selects the security question for the indicated user.
	$query = 'SELECT sa_username, sa_securityquestion FROM super';
    show_query($query);
	$result = mysqli_query($dbc, $query);
	if( $result )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		
  		echo '<TABLE align = "center" border = "1">';
  		echo '<TR>';
		echo '<TH>Username</TH>';
		echo '<TH>Security Question</TH>';
  		echo '</TR>';
		
  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $result , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
			echo '<TD>' . $row['sa_username'] . '</TD>' ;
			echo '<TD>' . $row['sa_securityquestion'] . '</TD>' ;

    		echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';
		echo '<hr>';
  		# Free up the results in memory
  		mysqli_free_result( $result ) ;
	}
}

#Checks security question response and updates password if correct for superadmins
function validate_questionSA($dbc, $username, $response, $newpassword)
{
	#Creates a query that checks the question
	$query = 'SELECT sa_response FROM super WHERE sa_username = "' . $username . '"';
	
	#Displays query of the form
    show_query($query);
	$result = mysqli_query($dbc, $query);
	$row = mysqli_fetch_array( $result , MYSQLI_ASSOC );
	if(strtolower($row['sa_response']) == strtolower($response))
	{
		
		$query2 = 'UPDATE super SET sa_pass = "' . $newpassword . '" WHERE sa_username = "' . $username . '"';
		$result = mysqli_query($dbc, $query2);
		return TRUE;
	}
	return FALSE;
}

#Adds an admin to the users table
function insert_admin($dbc, $username, $fname, $lname, $email, $pass, $reg_date, $securityquestion, $response) {
  #Creates query that inserts the admin's, username, password, first name, last name, email, password, reg date, security question, and response into users table
  $query = 'INSERT INTO users(username, first_name, last_name, email, pass, reg_date, securityquestion, response) VALUES ("'. $username . '", "' . $fname . '", "' . $lname . '", "' . $email . '", "' . $pass . '", "' . $reg_date . '", "' . $securityquestion . '", "' . $response . '")';
  #Displays the query on the page
  show_query($query);

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results ;
}

#Check if a string is empty
#Performs input validation
function valid_formEntry($textValue){
 if(empty($textValue))
 return false;
 else {
 return true;
 }
}

#Deletes items from stuff table, using their id
function delete_item($dbc, $id) {
	#Creates query where item is deleted based on its item id
	$query = 'DELETE FROM stuff WHERE id = "' . $id . '" ';
	show_query($query);
	$result = mysqli_query($dbc, $query); 
}

#Admin Login
function load( $page = "AdminLogin.php", $user_id)
{
	$url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . dirname( $_SERVER[ 'PHP_SELF' ] ) ;
	$url = rtrim( $url, '/\\' ) ;
    $url .= '/' . $page . '?id=' . $user_id;
	
	session_start( );
	$_SESSION['id'] = $user_id;
	header( "Location: $url" );
	
	exit(); 
}

# Validates the admin username and password.
# Returns -1 if validate fails, and >= 0 if it succeeds
# which is the primary key id.
function validate($username = '', $password = '')
{
    global $dbc;

    if(empty($username))
      return -1 ;
  
	if(empty($password))
      return -1 ;

    # Make the query
    $query = "SELECT user_id, username, pass FROM users WHERE username='" . $username . "' AND  pass='" . $password . "'" ;
    show_query($query) ;

    # Execute the query
    $results = mysqli_query( $dbc, $query ) ;
    check_results($results);

    # If we get no rows, the login failed
    if (mysqli_num_rows( $results ) == 0 )
      return -1 ;

    # We have at least one row, so get the first one and return it
    $row = mysqli_fetch_array($results, MYSQLI_ASSOC) ;

    $user_id = $row [ 'user_id' ] ;

    return intval($user_id) ;
}

#Super Admin Login
function loadSA( $page = "SuperAdminLogin.php", $sa_id)
{
	$url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . dirname( $_SERVER[ 'PHP_SELF' ] ) ;
	$url = rtrim( $url, '/\\' ) ;
    $url .= '/' . $page . '?id=' . $sa_id;
	
	session_start( );
	$_SESSION['id'] = $sa_id;
	header( "Location: $url" );
	
	exit(); 
}
# Validates the super admin username and password.
# Returns -1 if validate fails, and >= 0 if it succeeds
# which is the primary key id.
function validateSA($sa_username = '', $sa_pass = '')
{
    global $dbc;

    if(empty($sa_username))
      return -1 ;
  
	if(empty($sa_pass))
      return -1 ;

    # Make the query
    $query = "SELECT sa_id, sa_username, sa_pass FROM super WHERE sa_username='" . $sa_username . "' AND sa_pass='" . $sa_pass . "'" ;
    show_query($query) ;

    # Execute the query
    $results = mysqli_query( $dbc, $query ) ;
    check_results($results);

    # If we get no rows, the login failed
    if (mysqli_num_rows( $results ) == 0 )
      return -1 ;

    # We have at least one row, so get the first one and return it
    $row = mysqli_fetch_array($results, MYSQLI_ASSOC) ;

    $sa_id = $row [ 'sa_id' ] ;

    return intval($sa_id) ;
}

#Delete Admin from users table, using the id
#Only used by Super Admin
function delete_admin($dbc, $user_id) {
	$query = 'DELETE FROM users WHERE user_id = "' . $user_id . '" ';
	show_query($query);
	$result = mysqli_query($dbc, $query); 
}

#Displays users(Admin) table
function show_users($dbc) {
	# Create a query to get the user_id, username, first name, last name, email, reg_date where id = the parameter value
	$query = 'SELECT user_id, username, first_name, last_name, email, reg_date, securityquestion, response FROM users' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		
  		echo '<TABLE border = "1" align="center">';
  		echo '<TR>';
		echo '<TH>user_id</TH>';
		echo '<TH>username</TH>';
		echo '<TH>first_name</TH>';
		echo '<TH>last_name</TH>';
		echo '<TH>email</TH>';
		echo '<TH>reg_date</TH>';
		echo '<TH>Security Question</TH>';
		echo '<TH>Response</TH>';
  		echo '</TR>';
		
  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
			echo '<TD>' . $row['user_id'] . '</TD>' ;
    		echo '<TD>' . $row['username'] . '</TD>' ;
    		echo '<TD>' . $row['first_name'] . '</TD>' ;
			echo '<TD>' . $row['last_name'] . '</TD>' ;
			echo '<TD>' . $row['email'] . '</TD>' ;
			echo '<TD>' . $row['reg_date'] . '</TD>' ;
			echo '<TD>' . $row['securityquestion'] . '</TD>' ;
			echo '<TD>' . $row['response'] . '</TD>' ;
    		echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';
		echo '<hr>';
  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}
#Shows the original table in limbo
#Uses anchor links, which the user can then click on to display more information about the selected item
function show_link_records_info($dbc) {
	# Create a query to get the id, create_date, location, category, item name, and status sorted by create_date
	$query = 'SELECT id, create_date, Ilocation, Icat, Iname, status FROM stuff ORDER BY create_date DESC' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<TABLE border = "1" align="center">';
  		echo '<TR>';
		echo '<TH>id</TH>';
  		echo '<TH>Date Reported</TH>';
  		echo '<TH>Location</TH>';
		echo '<TH>Category</TH>';
		echo '<TH>Item Name</TH>';
		echo '<TH>Status</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
			#adds the anchor link and appropriate table data
			$alink = '<A HREF=UpdateItemInfo.php?id=' . $row['id'] . '>' . $row['id'] . '</A>' ;
			echo '<TD ALIGN=right>' . $alink . '</TD>' ;
    		echo '<TD>' . $row['create_date'] . '</TD>' ;
    		echo '<TD>' . $row['Ilocation'] . '</TD>' ;
			echo '<TD>' . $row['Icat'] . '</TD>' ;
			echo '<TD>' . $row['Iname'] . '</TD>' ;
			echo '<TD>' . $row['status'] . '</TD>' ;
			echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
	# Create a query to show the locatons table
	$query2 = 'SELECT id, name FROM locations ORDER BY id ASC' ;

	# Execute the query
	$results2 = mysqli_query( $dbc , $query2 ) ;
	check_results($results2) ;
	if($results2)
	{
		# End the table
  		echo '</TABLE>';
		
		echo '<TABLE border = "1" align="center">';
  		echo '<TR>';
		echo '<TH>ID</TH>';
		echo '<TH>Name</TH>';
  		echo '</TR>';
		
		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results2 , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
    		echo '<TD>' . $row['id'] . '</TD>' ;
    		echo '<TD>' . $row['name'] . '</TD>' ; 
			echo '</TR>' ;
  		}
	}
}

#Shows stuff table
function show_record_info($dbc, $id) {
	# Create a query to get the id, create date, finder, finder's phone number, finder's email, owner, owner's phone number, owner's email
	#item category, item name, description, item location, room, status from stuff where id = the parameter value
	$query = 'SELECT id, create_date, finder, fPhoneNumber, fEmail, owner, oPhoneNumber, oEmail, Icat, Iname, descr, Ilocation, room, status FROM stuff WHERE id = ' . $id ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		
  		echo '<TABLE border = "1">';
  		echo '<TR>';
		echo '<TH>id</TH>';
  		echo '<TH>Date Reported</TH>';
		echo '<TH>Finder</TH>';
		echo '<TH>Finder\'s Phone Number </TH>';
		echo '<TH>Finder\'s Email </TH>';
		echo '<TH>Owner\'s Name</TH>';
		echo '<TH>Owner\'s Phone Number </TH>';
		echo '<TH>Owner\'s Email </TH>';
		echo '<TH>Item Category</TH>';
		echo '<TH>Item Name </TH>';
		echo '<TH>Item Description</TH>';
		echo '<TH>Location</TH>';
		echo '<TH>Room</TH>';
		echo '<TH>Status</TH>';
  		echo '</TR>';
		
  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
			echo '<TD>' . $row['id'] . '</TD>' ;
			echo '<TD>' . $row['create_date'] . '</TD>' ;
			echo '<TD>' . $row['finder'] . '</TD>' ;
			echo '<TD>' . $row['fPhoneNumber'] . '</TD>' ;
			echo '<TD>' . $row['fEmail'] . '</TD>' ;
			echo '<TD>' . $row['owner'] . '</TD>' ;
			echo '<TD>' . $row['oPhoneNumber'] . '</TD>' ;
			echo '<TD>' . $row['oEmail'] . '</TD>' ;
			echo '<TD>' . $row['Icat'] . '</TD>' ;
			echo '<TD>' . $row['Iname'] . '</TD>' ;
			echo '<TD>' . $row['descr'] . '</TD>' ;
			echo '<TD>' . $row['Ilocation'] . '</TD>' ;
			echo '<TD>' . $row['room'] . '</TD>' ;
    		echo '<TD>' . $row['status'] . '</TD>' ;
			echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';
		echo '<hr>';
  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

#Used for the keyword search on Quick Links page
function keyword_search($dbc, $column, $descr){
	$keyword = '%' . trim($descr) . '%';
	show_link_recordsKEY($dbc, $column, $keyword);
}

#Used for the keyword search on Super Admin Quick Links page
function keyword_searchSA($dbc, $column, $descr){
	$keyword = '%' . trim($descr) . '%';
	show_link_recordsSAKEY($dbc, $column, $keyword);
}

#Used for the keyword search search on Admin Quick Links page
function keyword_searchA($dbc, $column, $descr){
	$keyword = '%' . trim($descr) . '%';
	show_link_recordsAdminKEY($dbc, $column, $keyword);
}


?>