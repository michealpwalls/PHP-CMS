<?php
/*
 * save_edit.php
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

	$pageId = trim( $_POST['pageid'] );
	$titleIn = trim( $_POST['page_title'] );
	$nameIn = trim( $_POST['page_name'] );
	$contentIn = trim( $_POST['page_content'] );

	//Declare a status variable
	$validation_state = (bool) true;

	if( empty( $pageId ) ) {
		echo( "You've missed the page ID.<br>" );
		$validation_state = false;
	}

	if( empty( $titleIn ) ) {
		echo( "You've missed the Title field.<br>" );
		$validation_state = false;
	}
	
	if( empty( $nameIn ) ) {
		echo( "You've missed the Name field.<br>" );
		$validation_state = false;
	}
	
	if( empty( $contentIn ) ) {
		echo( "You've missed the Content field.<br>" );
		$validation_state = false;
	}

	if( $validation_state ) {
		require_once( 'dbconnect.php' );

		//Properly escape dangerous characters. This will make it safe for MySQL
		$title = mysqli_real_escape_string( $conn, $titleIn );
		$name = mysqli_real_escape_string( $conn, $nameIn );
		$content = mysqli_real_escape_string( $conn, $contentIn );

		//write our sql commands to add the new user
		$sql = "UPDATE assignment2_pages SET title='$title',name='$name',content='$content' WHERE id='$pageId'";

		//query the database
		mysqli_query( $conn, $sql ) or die( mysqli_error($conn) );	//"There was an internal error. If it continues to happen, please contact the site administrator"

		//Close the database connection
		mysqli_close($conn);

		echo( 'Your changes have been applied.' );
		header("location:index.php?id=8");
	} else {
		die( '<br><br>Cannot continue with missing fields. Please go back and fill in the empty fields.' );
	}
?>
