<?php

$home_directory = $(dirname(__FILE__));

session_start();
// Redirect to login page if not logged in
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
?>
