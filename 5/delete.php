<?php
/*
 * delete.php
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
 
	//grab the id from the url
	$userId = $_GET['userid'];

	//grab the confirmation from the url
	$confirmation = $_GET['confirm'];

	//Compare the user's response to confirmation messageBox
	if( $confirmation == "y") {
		//connect to the db
		require_once( "dbconnect.php" );

		//write the sql to delete user from users table
		$sql = "DELETE FROM assignment2_users WHERE id='$userId';";

		//run the deletion
		mysqli_query( $conn, $sql ) or die(mysqli_error($conn));
		
		//write the sql to delete user from the admins table
		$sql = "DELETE FROM assignment2_admins WHERE user_id='$userId';";

		//run the deletion
		mysqli_query( $conn, $sql ) or die(mysqli_error($conn));

		//disconnect
		mysqli_close( $conn );

		//inform the user the entry was deleted
		echo( "Entry was successfully removed..<br>\n" );
		header( "Location:index.php?id=3" );
	} else if( $confirmation == "n") {
		//User explicitly responded no to confirmation, so bring them back to the premiership_table.php
		header( "Location:index.php?id=3" );
	} else {
		//Get user confirmation before deleting the entry
	?>
			<div id="messageBox">
				Are you sure you want to delete this entry?<br>
				<a class="button" href="index.php?id=5&userid=<?=$userId?>&confirm=y">Delete</a><a class="button" href="index.php?id=5&userid=<?=$userId?>&confirm=n">Cancel</a>
			</div>
<?php
	}//end of confirmation if
?>
