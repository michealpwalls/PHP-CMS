<?php
/*
 * index.php
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
 */

?>
	<head>
		<title>Show Administrators</title>

<?php
	require_once( "html_head.php" );
	require_once( "user_navigation.php" );
	require_once( "logincontrol.php" );

	if( isset( $_SESSION['admin_id'] ) ) {
		if( $_SESSION['admin_id'] == 0 ) {
			die("This is Control Panel page can only be viewed by Administrators.");
		}
	}

	require_once( "dbconnect.php" );

	//Store an sql command to get the list of administrators
	$sql = "SELECT * FROM assignment2_users WHERE admin_id <> '0';";

	//Query the database and store the results
	$results = mysqli_query($conn, $sql);
?>
		<!-- Step 4: Create a table with a header row -->
		<table>
			<tr>
				<th>Username</th>
				<th>Email</th>
				<th>Delete</th>
				<th>Edit</th>
			</tr>
<?php
	//Step 6: Iterate through the $results collection
	while($row = mysqli_fetch_array($results)) {
		echo( "\n			<tr>\n" );
		echo( "					<td>" . $row['username'] . "</td><td>" . $row['email'] . "</td><td><a href=\"index.php?id=5&userid=" . $row['id'] . "\">Delete</a></td>\n" );
		echo( "					<td><a href=\"index.php?id=4&userid=" . $row['id'] . "\">Edit</a></td>\n" );
		echo( "				</tr>\n" );
	}

	//Step 7: Close database connection
	mysqli_close($conn);
?>
		</table>
