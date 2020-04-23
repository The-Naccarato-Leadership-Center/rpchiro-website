<?php
include("db_connect.inc");

  $email = $_REQUEST['email'];

  $Query = "select email, subscribe, source from email where LOWER(email)='" . $email . "'";
  $Row = $myDB->FetchAssocQuery($Query);
  
  $dbEmail = $Row['email'];
  $subscribe = $Row['subscribe'];
  $source = $Row['source'];

  print "Email already in database <p>";


  print "<table border=\"1\">";
  print "<th>Email</th>";
  print "<th>Subscribe</th>";
  print "<th>Source</th>";
  print "<tr>";
  print "<td>&nbsp;<A HREF=\"http://www.rpchiro.com/php/email_edit.php?email=" . $dbEmail . "&subscribe=" . $subscribe . "&source=" . $source . "\">" . $dbEmail . "</a>&nbsp;</td>";
  print "<td>" . $subscribe . "</td>";
  print "<td>" . $source . "</td>";
  print "</tr>";
  print "</table>";
  print "<br>";

  print "<input type=\"button\" name=\"back\" value=\"Enter another Email\" onclick=\"parent.location='http://www.rpchiro.com/php/email_add.php?type=Add+Email'\">";
  print "&nbsp;&nbsp;<input type=\"button\" name=\"type\" value=\"Cancel\" onclick=\"parent.location='http://www.rpchiro.com/php/email.php?username=admin&password=Kim_3056&submit=View+Data'\">";

  //if ($dbEmail != '') {
  //   $insertQuery = "insert into email values ('" . $email . "','S','N','','','','')";
 //    //print $Query;
 //    $myDB->Query($insertQuery);
 //    $location = "Location: http://www.rpchiro.com/php/email.php?username=admin&password=Kim_3056&submit=View+Data"
 // } else {
 //    $location = "Location: http://www.rpchiro.com/php/email_result.php?email=" . $email;
 // }

  // //header("Location: http://www.rpchiro.com/php/email.php");
  //header($location);

?>
