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
 * 
 */
 ?>
	<head>
		<title>Log In</title>
<?php
	if( isset($_GET['subid']) ) {
		if( $_GET['subid'] == 1 ) require_once('1/logout.php');
	}

	require_once( "html_head.php" );
	require_once( "user_navigation.php" );

	if( isset($_GET['oldid']) ) $oldidIn = trim( $_GET['oldid'] );

	if( !isset($_GET['oldid']) || !is_int($oldidIn) ) {
		$oldid = (int) 0;
	} else {
		$oldid = (int) $oldidIn;
	}

	if( !isset($_POST['username']) ) {
		require_once('1/login.php');
	} else {
		require_once('1/authenticate_login.php');
	}
?>
