<?php
// Require the MY_SQL library, fail if it is not found
require_once("mysql_db.php");

// Setup the parameters to access the database

define("DB_HOST", "localhost");
define("DB_USER", "admin_admin");
define("DB_PASS", "Kim_3056");
define("DB_NAME", "admin_email");

// Set the DB attributes and create the DB object
$dbAttribs = array("host" => DB_HOST, "username" => DB_USER, "password" => DB_PASS, "database" => DB_NAME);
$myDB = new mysql_db($dbAttribs);
?>
