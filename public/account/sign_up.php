<?php
session_start();
//this script gets new information from the registration pages and enters it into the accounts table, effectively creating a new account
require_once('global_settings.php');

//convert post
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$user_pass = $_POST['user_pass'];

$sql = "INSERT INTO accounts (first_name, last_name, username, user_pass) VALUES ('$first_name', '$last_name', '$username', '$user_pass')";
$result = mysqli_query($dbc, $sql);

header("Location: login.php");
?>