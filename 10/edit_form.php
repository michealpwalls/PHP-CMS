<?php
/*
 * edit_form.php
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
	
	$pageIdIn = trim( $_GET['pageid'] );

	if( empty( $pageIdIn ) ) {
		echo( "The pageid was empty.<br>" );
		$validation_state = false;
	}

	if( $validation_state ) {
		require_once( "dbconnect.php" );
		
		//Safely escape the user input before using it in a database query
		$pageId = mysqli_real_escape_string( $conn, $pageIdIn );

		$sql_editPrefill = "SELECT title,name,content FROM assignment2_pages WHERE id='$pageId';";
		
		$result = mysqli_query( $conn, $sql_editPrefill ) or die( mysqli_error($conn) );

		while( $row = mysqli_fetch_array( $result ) ) {
			$title = $row['title'];
			$name = $row['name'];
			$content = $row['content'];
		}
 
		mysqli_close( $conn );
?>
		<form method="post" action="index.php?id=10">

			<div>
				<label for="page_name">Link Name</label>
				<input name="page_name" value="<?=$name;?>" required>
			</div>

			<div>
				<label for="page_title">Page Title</label>
				<input name="page_title" value="<?=$title;?>" required>
			</div>
			
			<div>
				<label for="page_content">Page Content</label>
				<textarea name="page_content" rows="5" cols="50" required><?=$content;?></textarea>
			</div>

			<input type="hidden" name="pageid" value="<?=$pageId;?>">
			<input type="submit" value="Save">

		</form>
<?php
	} else {
		die( '<br><br>Cannot continue with missing fields. Please go back and fill in the empty fields.' );
	}
?>
