<?php
/*
 * authenticate_login.php
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
	$usernameIn = trim( $_POST['username'] );
	$passwordIn = trim( $_POST['password'] );

	$validation_state = (bool) true;

	if( empty( $usernameIn ) ) {
		echo( "You've missed the Username field.<br>" );
		$validation_state = false;
	}

	if( empty( $passwordIn ) ) {
		echo( "You've missed the Password field.<br>" );
		$validation_state = false;
	}

	if( $validation_state ) {
		require_once( 'dbconnect.php' );

		//Properly escape dangerous characters. This will make it safe for MySQL
		$username = mysqli_real_escape_string( $conn, $usernameIn );
		$password = openssl_digest( $passwordIn, "sha512" );	//512-bit hash

		$sql = "SELECT * FROM assignment2_users WHERE username = '$username' AND password = '$password'";

		$result = mysqli_query($conn, $sql);

		$count = mysqli_num_rows($result);

		if ($count >= 1) {
			echo 'Logged in Successfully.';

			while ($row = mysqli_fetch_array($result)) {
				//Start the session
				session_start();
				
				//I store the IDs in a session
				$_SESSION['user_id'] = $row['id'];
				$_SESSION['admin_id'] = $row['admin_id'];

				//Make sure the connection closes before redirecting
				mysqli_close($conn);

				//Redirect to the main index
				header('Location:index.php?id=' . $oldid);
			}

			mysqli_close($conn);
		} else {
			echo( "Invalid Login<br>\n" );
		}

		mysqli_close($conn);
	} else {
		die( '<br><br>Cannot continue with missing fields. Please go back and fill in the empty fields.' );
	}
?>
