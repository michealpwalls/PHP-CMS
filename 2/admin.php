<?php
/*
 * admin.php
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
		<form method="post" action="index.php?id=2">

			<div>
				<label for="username">Username</label>
				<input type="text" name="username" maxlength="16" required>
			</div>
			<div>
				<label for="password">Password</label>
				<input name="password" type="password" required>
			</div>
			<div>
				<label for="confirm_password">Password</label>
				<input name="confirm_password" type="password" required>
			</div>
			<div>
				<label for="email">Email</label>
				<input name="email" maxlength="100" required>
			</div>
			<input value="Submit" type="submit">
		</form>
