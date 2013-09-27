<?php
/*
 * user_navigation.php
 * 
 * Copyright 2013 Micheal Walls <michealpwalls@gmail.com>
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 * 
 * 
 */

?>
		<header>
<?php
	//Connect to the database to retrieve the default logo
	require( "dbconnect.php" );
	
	//Prepare an SQL command to retrieve the default logo
	$sql_defaultLogo = "SELECT * FROM assignment2_logos WHERE default_state=1;";
	
	//Run the SQL command and store the results in an object
	$result = mysqli_query( $conn, $sql_defaultLogo );
	
	//Iterate through the result object and populate an array of values
	while( $row = mysqli_fetch_array($result) ) {
		$image_name = $row['image_name'];
		$alttext = $row['alttext'];
	}	//end while loop

	//Only try to output a logo if one was found in the database
	if( isset($image_name) ) {
		echo( '			<img class="logo" src="logos/' . $image_name . '" alt="' . $alttext . '" title="' . $alttext . '">&nbsp;&nbsp;' . "\n" );
	} else {
		echo( '			&nbsp;&nbsp;' . "\n" );
	}

	session_start();

	if( !isset( $_SESSION['user_id'] ) ) {
?>
			<nav class="users">
				<div class="users"><a href="index.php">Home</a></li>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="index.php?id=1">Log In</a></div>
			</nav>
<?php
	} else {
		if( isset( $_SESSION['admin_id'] ) ) {
			if( $_SESSION['admin_id'] != 0 ) {
?>
			<nav class="users">
				<div class="users"><a href="index.php">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="index.php?id=6">Administrative Control Panel</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="index.php?id=1&subid=1">Log Out</a></div>
			</nav>
<?php
			}
		}
	}
?>
		</header>
