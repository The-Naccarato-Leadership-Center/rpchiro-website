<?php
include("db_connect.inc");

$email = $_REQUEST['Email'];
$type = $_REQUEST['type'];

switch ($type)
{
   case "Unsubscribe":
      $Query = "update email set subscribe = 'U' where email = '" . $email . "'";
      $myDB->Query($Query);
      header("Location: http://www.rpchiro.com/php/email.php?username=admin&password=Kim_3056&submit=View+Data");
      break;
   case "Subscribe":
      $Query = "update email set subscribe = 'S' where email = '" . $email . "'";
      $myDB->Query($Query);
      header("Location: http://www.rpchiro.com/php/email.php?username=admin&password=Kim_3056&submit=View+Data");
      break;
}


?>
