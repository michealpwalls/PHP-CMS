<?php
/*
 * update_admin.php
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

	$userIdIn = trim( $_POST['userid'] );
	$usernameIn = trim( $_POST['username'] );
	$emailIn = trim( $_POST['email'] );

	//Declare a status variable
	$validation_state = (bool) true;

	if( empty( $usernameIn ) ) {
		echo( "You've missed the Username field.<br>" );
		$validation_state = false;
	}

	if( empty( $emailIn ) ) {
		echo( "You've missed the eMail field.<br>" );
		$validation_state = false;
	}
	
	if( empty( $userIdIn ) ) {
		echo( "The userid was empty.<br>" );
		$validation_state = false;
	}

	if( $validation_state ) {
		require_once( 'dbconnect.php' );

		//hash the password and save it in a variable
		$password = openssl_digest( $passwordIn, "sha512" );

		//Properly escape dangerous characters. This will make it safe for MySQL
		$username = mysqli_real_escape_string( $conn, $usernameIn );
		$email = mysqli_real_escape_string( $conn, $emailIn );
		$userId = mysqli_real_escape_string( $conn, $userIdIn );
		
		//Check to make sure the email address has not already been registered
		$emailCheck_result = mysqli_query( $conn, "SELECT * FROM assignment2_users WHERE email='$email';" );
		while( $row = mysqli_fetch_array( $emailCheck_result ) ) {
			//The user already exists, so redirect back to register admin page
			echo("That email address has already been registered.<br><br>\n");
			echo("Click <a href=\"javascript:history.go(-1)\">HERE</a> to go back.<br>\n");
			mysqli_close( $conn );
			exit();
		}
		unset( $emailCheck_result );

		//write our sql commands to add the new user
		$sql = "UPDATE assignment2_users SET username='$username',password='$password',email='$email' WHERE id='$userId'";

		//query the database
		mysqli_query($conn, $sql) or die(mysqli_error($conn));	//"There was an internal error. If it continues to happen, please contact the site administrator"

		//Close the database connection
		mysqli_close($conn);

		echo( 'The new Administrator has been registered.' );
		header("location:index.php?id=3");
	} else {
		die( '<br><br>Cannot continue with missing fields. Please go back and fill in the empty fields.' );
	}
?>
