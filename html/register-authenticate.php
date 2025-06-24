<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'admin';
$DATABASE_PASS = 'F1J8qbu7s0$kGP-{2T@3hc';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
	exit('Complete the registration form');
}
// Make sure the submitted registration values are not empty
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
	exit('Complete the registration form');
}
// Email Validation
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	exit('Email is not valid');
}
// Invalid Characters Validation
if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) == 0) {
	exit('Username is not valid');
}
// Character Length Check
if (strlen($_POST['password']) > 30 || strlen($_POST['password']) < 16) {
	exit('Password must be between 16 and 30 characters long');
}

// Check if the account with that username exists.
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password
	// using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		echo 'Username exists, please choose another!';
	} else {
		// Username doesn't exists, insert new account
		if ($stmt = $con->prepare('INSERT INTO accounts (username, password, email) VALUES (?, ?, ?)')) {
			// We do not want to expose passwords in our database, so hash the password
			// and use password_verify when a user logs in.
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$stmt->bind_param('sss', $_POST['username'], $password, $_POST['email']);
			$stmt->execute();
			echo 'Successfully Registered, you can now login';
		} else {
			// Something is wrong with the SQL statement, so you must check to make sure
			// your accounts table exists with all 3 fields.
			echo 'Could not prepare statement';
		}
	}
	$stmt->close();
} else {
	// Something is wrong with the SQL statement, so you must check to make sure your
	// accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
$con->close();
?>
