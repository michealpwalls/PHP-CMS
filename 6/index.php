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
		<title>Administrative Control Panel</title>

<?php
	require_once( "html_head.php" );
	require_once( "user_navigation.php" );
	require_once( "logincontrol.php" );

	if( isset( $_SESSION['admin_id'] ) ) {
		if( $_SESSION['admin_id'] != 0 ) {
?>
		<p>This is your Administrative Control Panel</p>
		<ul>
			<li><a href="index.php?id=3">List all Administrative users</a></li>
			<li><a href="index.php?id=2">Register a new Administrative user</a></li>
			<li><a href="index.php?id=7">Add a new Content Page</a></li>
			<li><a href="index.php?id=8">List all Content Pages</a></li>
			<li><a href="index.php?id=11">Upload a new Logo / Banner</a></li>
			<li><a href="index.php?id=12">Show all available Logos</a></li>
		</ul>
<?php
		} else {
			//If the user's admin_id is 0, they are not an administrator
			echo("The Administrative Control Panel can only be used by Administrators.");
		}
	} else {
		//If the admin_id is not present in the SESSION, well I don't know what went wrong but they shouldn't go further :O
		echo("The Administrative Control Panel can only be used by Administrators.");
	}
?>
