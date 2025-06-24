<?php
$page = $_SERVER['PHP_SELF'];
$sec = "30";
?>

<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>NAS</title>
		<link href="assets/addons/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/addons/fontawesome/css/all.min.css" rel="stylesheet">
		<link href="assets/css/login-style.css" rel="stylesheet">
	</head>
	
	<body>
		<div class="login">
			<h1>NAS</h1>
			<form action="authenticate.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" value="Login">
			</form>
		</div>
	</body>
</html>
