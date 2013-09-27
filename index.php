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
<!doctype html>

<html lang="en">

<?php
	//Initialize our id, to use as the job id for our main page index.
	if( isset($_GET['id']) ) {
		//An ID has been passed in. I first make sure it is not an empty string
		$idIn = trim( $_GET['id'] );
		//Next I make sure the id passed in by the user is not empty after running Trim on it
		if( !empty( $idIn ) ) {
			//Next I make sure the user submitted id is an integer
			if( $idIn >= 0 && $idIn <= 9999 ) {
				//The id was a valid Integer, so I store it for use as the job index later on
				$id = (int) $idIn;
			} else {
				//Reset the ID to the safe default
				$id = (int) 0;
			}
		} else {
			$id = (int) 0;
		}
		unset($idIn);
	} else {
		//An ID does not yet exist, so I initialize an id to 0 for the default page.
		$id = (int) 0;
	}

	//Initialize a Page variable, to control which Content is displayed.
	if( isset($_GET['page']) ) {
		//A page number has been passed in. First trim any whitespaces, tabs or newline characters
		$pageIn = trim( $_GET['page'] );
		//Next I make sure the id passed in by the user is not empty after running Trim on it
		if( !empty( $pageIn ) ) {
			//Next I make sure the user submitted page number is a valid integer
			if( $pageIn >= 1 && $pageIn <= 9999 ) {
				//The page number was a valid Integer, so I store it for use later
				$page = (int) $pageIn;
			} else {
				//Reset the page number to a safe default
				$page = (int) 1;
			}
		} else {
			$page = (int) 1;
		}
		unset($pageIn);
	} else {
		//An page number does not yet exist, so I initialize an one to 0 for the default content page.
		$page = (int) 1;
	}

	//Load the content based on the ID passed to index.php. If no ID was passed, or if the ID passed does not exist just include an error
	if( file_exists( $id . "/index.php" ) ) {
		require_once( $id . "/index.php" );
	} else {
		require_once( "jobnotfound.php" );
	}

	//Include the common Footer
	require_once( "footer.php" );
?>
	</body>

</html>
