<?php
/*
 * set_default_image.php
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

	if( isset($_GET['logoid']) ) {
		$logoId = trim( $_GET['logoid'] );
	} else {
		die( "This Control Panel utility requires a logoid to be supplied in order for it to work.<br>\n" );
	}

	//Open a connection to the database
	require( "dbconnect.php" );
	
	//Prepare the SQL command to set all logos to an unset state
	$sql_clearState = "UPDATE assignment2_logos SET default_state=0;";
	
	//Run the clearState command
	mysqli_query( $conn, $sql_clearState );
	
	//Destroy the old command and store a new one
	unset( $sql_clearState );
	$sql_setState = "UPDATE assignment2_logos SET default_state=1 WHERE id='$logoId';";
	
	//Run the setState command
	mysqli_query( $conn, $sql_setState );
	
	//Close connection to the database and destroy leftover variables
	mysqli_close( $conn );
	unset( $conn );
	unset( $sql_setState );

	echo( "The logo has been successfully set as the Default." );
	header("Location:index.php?id=12");
?>
