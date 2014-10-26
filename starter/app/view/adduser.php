<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add User</title>
</head>
<body>
	<h2>Add user</h2>
	<form action="http://localhost/wpa17/starter/public/submituser" method="post">
		<fieldset>
			<p>
				<label for="username">User Name</label>
				<input type="text" id="username" name="username" value="" maxlength="20" />
			</p>
			<p>
				<label for="password">Password</label>
				<input type="password" id="password" name="password" value="" maxlength="20" />
			</p>
			<p>
				<input type="hidden" name="form_token" value="<?php echo $form_token; ?>" />
				<input type="submit" value="Add User" />
			</p>
		</fieldset>
	</form>
</body>
</html>