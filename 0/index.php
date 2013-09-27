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

	require_once( "html_head.php" );
	require_once( "user_navigation.php" );

	//Do something
	if( isset($page) ) {
		require( "dbconnect.php" );
		$sql_pageContent = "SELECT title,content FROM assignment2_pages WHERE id='$page';";
		$result_pageContent = mysqli_query( $conn, $sql_pageContent );
		mysqli_close( $conn );
		unset( $conn );
		unset( $sql_pageContent );
		while( $row = mysqli_fetch_array($result_pageContent) ) {
			$page_title = $row['title'];
			$page_content = $row['content'];
		}
		unset( $result_pageContent );

		if( !isset( $page_title ) ) $page_title = (string) "Welcome!";
		if( !isset( $page_content ) ) $page_content = (string) "Welcome to Mike's Content Management System! This is the default content that is displayed when there is no Content Pages in the database";
?>
		<article>
			<header>
				<h1><?=htmlentities($page_title, ENT_QUOTES, "UTF-8");?></h1>
			</header>
			<div class="content">
				<?=htmlentities($page_content, ENT_QUOTES, "UTF-8");?>
				
			</div>
		</article>
<?php
	} else {
		echo("		<p>There are no Content Pages in the database yet. Feel free to <a href=\"index.php?id=7\">create one</a> now.</p>\n" );
	}

	require_once( "page_navigation.php" );
?>
