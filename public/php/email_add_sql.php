<?php
include("db_connect.inc");

  $email = $_REQUEST['Email'];

  $Query = "select email from email where LOWER(email)='" . $email . "'";
  //print $Query;
  $Row = $myDB->FetchAssocQuery($Query);
  $dbEmail = $Row['email'];

  if ($dbEmail == '') {
     $insertQuery = "insert into email values ('" . $email . "','S','N','','','','',CURDATE())";
     print "&nbsp;&nbsp;Invalid entry, please enter a valid email address.";
     print "<p>";
     print "&nbsp;&nbsp;<input type=\"button\" name=\"type\" value=\"Back\" onclick=\"history.back()\">";
     print "&nbsp;&nbsp;<input type=\"button\" value=\"Main Database\" onclick=\"location.href='http://www.rpchiro.com/php/email.php?username=admin&password=Kim_3056&submit=View+Data'\">";
     $myDB->Query($insertQuery);
     $location = "Location: http://www.rpchiro.com/php/email.php?username=admin&password=Kim_3056&submit=View+Data";
  } else {
     $location = "Location: http://www.rpchiro.com/php/email_result.php?email=" . $email;
  }

  //header("Location: http://www.rpchiro.com/php/email.php");
  header($location);

?>
