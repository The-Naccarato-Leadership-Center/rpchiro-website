<?php
session_start();
//database connection settings

define("HOSTNAME" , "Localhost");
define("USERNAME" , "drjimcon_admin");
define("PASSWORD" , "Kim_3056");
define("DATABASE" , "drjimcon_system");


$dbc = @mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE) OR die ('Unable to connect.');

?>