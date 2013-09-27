<?php
/*
 * Mostly based off of Rich Freeman's work :)
 * 
 * Modified a bit to satisfy my OCD and Paranoia
 * 
 */

	//get the name of the uploaded file & display the file name
	$image_name = $_FILES['photo']['name'];
	echo '		Image Name: ' . htmlentities($image_name, ENT_QUOTES, "UTF-8") . '<br>' . "\n";

	//get the type of file
	$type = $_FILES['photo']['type'];
	echo '		File Type: ' . $type. '<br>' . "\n";

	//see where the file got uploaded to in cache
	$temp_dir = $_FILES['photo']['tmp_name'];
	echo '		Temp Dir: ' . $temp_dir . '<br>' . "\n";

	//set up a permanent directory path
	$target = 'logos/' . $image_name;

	//copy the file out of cache to the permanent directory
	move_uploaded_file($temp_dir, $target);

	//see if the logo is to be set as default
	if( isset($_POST['default_logo']) ) {
		$default_state = 1;
	} else {
		$default_state = 0;
	}

	$alttext = trim( $_POST['alttext'] );

	echo( '		<img src="' . $target . '" width="450" title="' . htmlentities($alttext, ENT_QUOTES, "UTF-8") . '" alt="' . htmlentities($alttext, ENT_QUOTES, "UTF-8") . '">' . "\n" );

	//Connect to the database and set the character encoding
	require( "dbconnect.php" );

	//Escape any illegal characters that might be in the caption or filename
	$alttext = mysqli_real_escape_string( $conn, $alttext );
	$image_name = mysqli_real_escape_string( $conn, $image_name );

	$sql_insertImage = "INSERT INTO assignment2_logos (image_name,alttext,default_state) VALUES ('$image_name','$alttext','$default_state');";

	mysqli_query( $conn, $sql_insertImage ) or die( mysqli_error($conn) );

	mysqli_close( $conn );
	unset( $conn );
	unset( $sql_insertImage );

?>
