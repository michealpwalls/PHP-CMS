<?php
/*
 * edit.php
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
	
	$userIdIn = trim( $_GET['userid'] );

	if( empty( $userIdIn ) ) {
		echo( "The userid was empty.<br>" );
		$validation_state = false;
	}

	if( $validation_state ) {
		require_once( "dbconnect.php" );
		
		//Safely escape the user input before using it in a database query
		$userId = mysqli_real_escape_string( $conn, $userIdIn );

		$sql = "SELECT username,email FROM assignment2_users WHERE id='$userId';";
		
		$result = mysqli_query( $conn, $sql ) or die(mysqli_error($conn));

		while( $row = mysqli_fetch_array( $result ) ) {
			$username = $row['username'];
			$email = $row['email'];
		}
 
		mysqli_close( $conn );
?>
		<form method="post" action="index.php?id=4">

			<div>
				<label for="username">Username</label>
				<input name="username" value="<?=$username;?>">
			</div>

			<div>
				<label for="email">Email</label>
				<input name="email" value="<?=$email;?>">
			</div>

			<input type="hidden" name="userid" value="<?=$userId;?>">
			<input type="submit" value="Save">

		</form>
<?php
	} else {
		die( '<br><br>Cannot continue with missing fields. Please go back and fill in the empty fields.' );
	}
?>
