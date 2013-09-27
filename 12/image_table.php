<?php
/*
 * image_table.php
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
		<table>
			<caption>Click on a Logo / Banner to set it as the default Logo</caption>
			<tbody>
<?php

	//Connect to the database and set the character encoding
	require( "dbconnect.php" );

	//Prepare an SQL command to retrieve all the Logos / Banners from the database
	$sql_grabLogos = "SELECT id,image_name,alttext,default_state FROM assignment2_logos;";

	//Run the SQL command on the database and store the result object
	$results_grabLogos = mysqli_query( $conn, $sql_grabLogos ) or die( mysqli_error($conn) );

	//Once the results object has been created, the connection can be closed and the conn object destroyed
	mysqli_close( $conn );
	unset( $conn );

	//A counter to count how many columns of images have been displayed
	$columnCount = 1;

	while( $row = mysqli_fetch_array($results_grabLogos) ) {
		//determine if we need to start a new row
		if ($columnCount == 1) {
			echo '<tr>';
		}

		echo '<td><a href="index.php?id=12&logoid=' . $row['id'] . '"><img src="logos/' . $row['image_name'] . '" width="300" height="300" alt="' . $row['alttext'] .
		'" title="' . $row['alttext'] . '"></a></td>';

		$columnCount = $columnCount + 1; //increment the counter

		//see if we should close the row
		if ($columnCount == 4) {
			echo '</tr>';
			$columnCount = 1;
		}
					/** <td><a href="index.php?id=12&logoid=<?=$logoId;?>"><img src="logos/<?=$image_name;?>" alt="<?=$alttext;?>" title="<?=$alttext;?>" width="150px" height="150px"></a></td> */
	}	//end while loop

	//After extracting the values and storing them in their own isolated variables, the entire results object can be destroyed
	unset( $results_grabLogos );
?>
			</tbody>
		</table>
	</body>

</html>
