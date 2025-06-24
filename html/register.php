<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to login page
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>NAS</title>
		<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/fontawesome/css/all.min.css" rel="stylesheet">
		<link href="assets/css/home-style.css" rel="stylesheet">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>NAS</h1>
				<a href="home.php"><i class="fas fa-home"></i>Home</a>
				<a href="register.php"><i class="fas fa-user-plus"></i>Register</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Register</h2>
			<form action="register-authenticate.php" method="post" autocomplete="off">
				<table>
					<tr>
						<td>Username:</td>
						<td>
							<input type="text" name="username" placeholder="Username" id="username" required>
						</td>
					</tr>
					<tr>
						<td>Password:</td>
						<td>
							<input type="password" name="password" placeholder="Password" id="password" required>
						</td>
					</tr>
					<tr>
						<td>Confirm:</td>
						<td>
							<input type="password" name="password-confirm" placeholder="Password" id="password-confirm" required>
						</td>
					</tr>
					<tr>
						<td>Email:</td>
						<td>
							<input type="email" name="email" placeholder="Email" id="email" required>
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" value="Register">
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>
