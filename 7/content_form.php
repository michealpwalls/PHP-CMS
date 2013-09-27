<?php
/*
 * content_form.php
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
		<form method="post" action="index.php?id=7">
			<div>
				<label for="page_name">Link Name</label>
				<input type="text" name="page_name" maxlength="17" required>
			</div>
			<div>
				<label for="page_title">Page Title</label>
				<input name="page_title" type="text" required>
			</div>
			<div>
				<label for="page_content">Page Content</label>
				<textarea name="page_content" rows="5" cols="50" required></textarea>
			</div>
			<input value="Submit" type="submit">
		</form>
