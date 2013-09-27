<?php
/*
 * save_content.php
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
	
	//Store the input from the user after running Trim on it
	$nameIn = trim( $_POST['page_name'] );
	$titleIn = trim( $_POST['page_title'] );
	$contentIn = trim( $_POST['page_content'] );

	//Make sure there were no empty inputs
	if( empty( $nameIn ) ) {
		echo( "You've missed the Link Name field.<br>" );
		$validation_state = false;
	}

	if( empty( $titleIn ) ) {
		echo( "You've missed the Page Title field.<br>" );
		$validation_state = false;
	}

	if( empty( $contentIn ) ) {
		echo( "You've missed the Page Content field.<br>" );
		$validation_state = false;
	}

	//Now that all inputs were filled out proceed to store the input in the database
	if( $validation_state ) {
		require_once( 'dbconnect.php' );

		//Properly escape dangerous characters. This will make it safe for MySQL
		$name = mysqli_real_escape_string( $conn, $nameIn );
		$title = mysqli_real_escape_string( $conn, $titleIn );
		$content = mysqli_real_escape_string( $conn, $contentIn );

		//Store the sql commands to add the new Page
		$sql_newPage = "INSERT INTO assignment2_pages (name,title,content) VALUES('" . $name . "', '" . $title . "', '" . $content . "');";

		//query the database
		mysqli_query( $conn, $sql_newPage ) or die( mysqli_error($conn) );	//"There was an internal error. If it continues to happen, please contact the site administrator"

		//Close the database connection
		mysqli_close( $conn );

		echo( 'The new Page of Content has been added to the database.' );
		header("location:index.php?id=8");
	}
?>
