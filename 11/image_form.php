<?php
/*
 * Mostly based off of Rich Freeman's work :)
 * 
 * Unknown license.. Given to me as a student of his class.
 * 
 */

?>
		<form method="POST" action="index.php?id=11" enctype="multipart/form-data">

			<div>
				<label for="photo">Upload a Logo or Banner:</label>
				<input type="file" name="photo" required>
			</div>

			<div>
				<label for="alttext">Alternative Text:</label>
				<input type="text" name="alttext" required>
			</div>

			<div>
				<label for="default_logo">Default Logo?:</label>
				<input type="checkbox" name="default_logo" value="1">
			</div>

			<input type="submit" value="Upload">
		</form>
