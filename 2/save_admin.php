<?php
/*
 * save_admin.php
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
	//Declare a status variable
	$validation_state = (bool) true;
	
	$usernameIn = trim( $_POST['username'] );
	$passwordIn = trim( $_POST['password'] );
	$password_confirmIn = trim( $_POST['confirm_password'] );
	$emailIn = trim( $_POST['email'] );

	if( empty( $usernameIn ) ) {
		echo( "You've missed the Username field.<br>" );
		$validation_state = false;
	}

	if( empty( $passwordIn ) ) {
		echo( "You've missed the Password field.<br>" );
		$validation_state = false;
	}

	if( empty( $password_confirmIn ) ) {
		echo( "You've missed the Confirm Password field.<br>" );
		$validation_state = false;
	}

	if( empty( $emailIn ) ) {
		echo( "You've missed the eMail field.<br>" );
		$validation_state = false;
	}

	if( $passwordIn != $password_confirmIn ) {
		echo( "The passwords did not match.<br>" );
		$validation_state = false;
	}

	if( $validation_state ) {
		require_once( 'dbconnect.php' );

		//hash the password and save it in a variable
		$password = openssl_digest( $passwordIn, "sha512" );

		//Properly escape dangerous characters. This will make it safe for MySQL
		$username = mysqli_real_escape_string( $conn, $usernameIn );
		$email = mysqli_real_escape_string( $conn, $emailIn );

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
		$sql = "INSERT INTO assignment2_users (username,password,email,admin_id) VALUES('" . $username . "', '" . $password . "', '" . $email . "', '1');";

		//query the database
		mysqli_query($conn, $sql) or die(mysqli_error($conn));	//"There was an internal error. If it continues to happen, please contact the site administrator"

		//Close the database connection
		mysqli_close($conn);

		echo( 'The new Administrator has been registered.' );
		header("location:index.php?id=3");
	}
?>
