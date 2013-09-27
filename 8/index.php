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
		<title>List all Content Pages</title>

<?php
	require_once( "html_head.php" );
	require_once( "user_navigation.php" );
	require_once( "logincontrol.php" );

	if( isset( $_SESSION['admin_id'] ) ) {
		if( $_SESSION['admin_id'] == 0 ) {
			die("This Control Panel page can only be viewed by Administrators.");
		}
	}

	require_once( "dbconnect.php" );

	//Store an sql command to get the list of administrators
	$sql_listPages = "SELECT id,name,title FROM assignment2_pages;";

	//Query the database and store the results
	$results_listPages = mysqli_query($conn, $sql_listPages);
?>
		<!-- Step 4: Create a table with a header row -->
		<table>
			<tr>
				<th>Link Name</th>
				<th>Page Title</th>
				<th>Controls</th>
			</tr>
<?php
	//Step 6: Iterate through the $results collection
	while($row = mysqli_fetch_array($results_listPages)) {
		echo( "\n			<tr>\n" );
		echo( "					<td>" . htmlentities($row['name'], ENT_QUOTES, "UTF-8") . "</td><td>" . htmlentities($row['title'], ENT_QUOTES, "UTF-8") . "</td>\n" );
		echo( "					<td>\n" );
		echo( "						<a href=\"index.php?id=9&pageid=" . $row['id'] . "\">Delete</a>&nbsp;&nbsp;" );
		echo( "						<a href=\"index.php?id=10&pageid=" . $row['id'] . "\">Edit</a>&nbsp;&nbsp;" );
		echo( "						<a href=\"index.php?page=" . $row['id'] . "\">Show</a></td>\n" );
		echo( "				</tr>\n" );
	}

	//Step 7: Close database connection
	mysqli_close($conn);
?>
		</table>
