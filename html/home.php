<?php include 'assets/php/login/login-check.php'; ?>

<!DOCTYPE html>
<html>
	<?php include 'assets/head.php'; ?>
	<body class="loggedin">
		<?php include 'assets/nav.php'; ?>
		<div class="content">
			<h2>Dashboard</h2>
			<?php echo "$home_directory"; ?>
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
			<p> TODO List:
			-- Setup Drive Status
			-- Setup CPU Status
			-- Setup MEM Status
			-- Setup CPU Temp
			-- Setup Network Speed Test</p>
		</div>
	</body>
</html>
