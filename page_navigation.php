<?php
/*
 * page_navigation.php
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

	//Connect to the database
	require( "dbconnect.php" );
	
	//Prepare an SQL command to get a list of all Content Pages
	$sql_pagesList = "SELECT * FROM assignment2_pages;";
	
	//Query the database with the SQL command
	$result_pagesList = mysqli_query( $conn, $sql_pagesList ) or die( mysqli_error($conn) );

	//Close the database connection and clean up the variables.
	mysqli_close( $conn );
	unset( $conn );
	unset( $sql_pagesList );

	//Output all of the Pages in the database
	echo( "		<nav class=\"pages\">\n" );
	echo( " 			<header><h1>Pages</h1></header>\n" );
	echo( "				<ul>\n" );
	while( $row = mysqli_fetch_array($result_pagesList) ) {
		echo( "					<li><a href=\"index.php?id=0&page=" . $row['id'] . "\" alt=\"" . htmlentities($row['title'], ENT_QUOTES, "UTF-8") . "\">" . htmlentities($row['name'], ENT_QUOTES, "UTF-8") . "</a></li><br>\n" );
	}
	unset( $result_pagesList );
	echo( "				</ul>\n" );
	echo( "		</nav>\n" );
?>
