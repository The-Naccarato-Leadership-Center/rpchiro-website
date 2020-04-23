<?php

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

if ($username == "admin" && $password == "Kim_3056")

{

   include("db_connect.inc");

   print "<form action=\"email_add.php\" method=\"get\">";
   print "<input type=\"submit\" name=\"type\" value=\"Add Email\">";
   print "&nbsp;&nbsp;&nbsp;";
   print "<A HREF=\"http://www.rpchiro.com/php/email.php?username=" . $username . "&password=" . $password . "\">Subscribed</A>"; 
   print "</form>";

   $Query = "select email, subscribe, source, name, phone from email where subscribe = 'U'";
   //$Query = "select email, subscribe, source from email limit 10";

  $RS = $myDB->Query($Query);

   while ($currRec = $myDB->FetchAssocRec($RS))
      {
         $myarray[] = $currRec;   //$myarray is really array of arrays; in this case $currRec
      }

   reset($myarray); //put pointer at beginning of array, may not be needed here but good form

   $rcount = count($myarray);  //returns the number of rows in the array

   // print $rcount

  print "<html>";
  print "<head>";
  print "<title>Sample Database Query</title>";
  print "</head>";

  print "<body>";

  print "<table align=\"center\" border=\"1\" cellpadding=\"0\" cellspacing=\"1\" bordercolor=\"black\">";
  print "<tr>";
  print "<td>&nbsp;Email&nbsp;</td>";
  print "<td>&nbsp;Subscribe&nbsp;</td>";
  print "<td>&nbsp;Source&nbsp;</td>";
  print "<td>&nbsp;Name&nbsp;</td>";
  print "<td>&nbsp;Phone&nbsp;</td>";
  print "</tr>";

  for ($counter = 0; $counter < $rcount ; $counter++)

   {
      print "<tr>";
      print "<td><A HREF=\"http://www.rpchiro.com/php/email_edit.php?email=" . urlencode($myarray[$counter]['email']) . "&subscribe=" .($myarray[$counter]['subscribe']) . "&source=" .($myarray[$counter]['source']) . "\">&nbsp;" . $myarray[$counter]['email'] . "</A>&nbsp;</td>"; 
      print "<td>&nbsp;" . $myarray[$counter]['subscribe'] . "&nbsp;</td>";
      print "<td>&nbsp;" . $myarray[$counter]['source'] . "&nbsp;</td>";
      print "<td>&nbsp;" . $myarray[$counter]['name'] . "&nbsp;</td>";
      print "<td>&nbsp;" . $myarray[$counter]['phone'] . "&nbsp;</td>";
      print "</tr>";
   }

   
  print "</table>";

  print "</p>";
  print "</body>";
  print "</html>";
}

else
{
    print "Wrong username and or password";
}

?>
