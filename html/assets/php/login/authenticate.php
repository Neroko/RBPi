<?php
session_start();
include 'assets/php/login/private/login-user.php';
$page = $_SERVER['PHP_SELF'];
// Connect to Server
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// Error with the connection, stop script and display error
	exit('Failed to connect to SQL: ' . mysqli_connect_error());
}
// Check if data from login form was submitted, isset() will check if the data exists
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Username and/or password fields are empty
	exit('Fill both the username and password fields');
}
// Prepare SQL to prevent SQL injection
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	// Bind parameters username to string
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store result to check if the account exists in the database
	$stmt->store_result();
	
	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $password);
		$stmt->fetch();
		// Account exists, verify password
		// Note: Use password_hash in registration file to store hashed passwords
		if (password_verify($_POST['password'], $password)) {
			// Verification success! User has logged-in.
			// Create sessions, so we know the user is logged in, they basically act like
			// cookies but remember the data on the server.
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['username'];
			$_SESSION['id'] = $id;
			
			
			// ***************************
			// **** HOME LOCATION ********
			// ***************************
			header('Location: '$page/'home.php');
			
			
		}else {
			// Incorrect password
			echo 'Incorrect username and/or password!';
		}
	} else {
		// Incorrect username
		echo 'Incorrect username and/or password!';
	}
	$stmt->close();
}
?>
