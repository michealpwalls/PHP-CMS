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
		<title>Edit a Page of Content</title>

<?php
	require_once( "html_head.php" );
	require_once( "user_navigation.php" );
	require_once( "logincontrol.php" );
	
	if( isset( $_SESSION['admin_id'] ) ) {
		if( $_SESSION['admin_id'] == 0 ) {
			die("This is Control Panel page can only be viewed by Administrators.");
		}
	}

	if( !isset($_POST['page_content']) ) {
		require_once( "10/edit_form.php" );
	} else {
		require_once( "10/save_edit.php" );
	}
	
?>
