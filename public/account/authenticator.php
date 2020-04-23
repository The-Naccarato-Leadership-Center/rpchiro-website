<?php
session_start();
require_once('global_settings.php');

//convert post
$username = $_POST['username'];
$user_pass = $_POST['user_pass'];

$sql = "SELECT * FROM accounts WHERE username='$username' AND user_pass='$user_pass'";
$result = mysqli_query($dbc, $sql);

if (!$row = mysqli_fetch_assoc($result)){
	echo "Your username or password is incorrect!";	
	
} else {
	$_SESSION['username'] = $row['username'];
}

header("Location: logcheck.php");
?>