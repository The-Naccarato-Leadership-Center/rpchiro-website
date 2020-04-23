<?php

include("db_connect.inc");


$email = $_GET['email'];
$subscribe = $_GET['subscribe'];
$source = $_GET['source'];


//echo $email
?>

<form action="email_edit_sql.php" method="get">

<?php
print "<FONT COLOR=\"#808080\">";
print "<br><br>";
print "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email:&nbsp;";
print "<input READONLY STYLE=\"color: #808080;\" type=\"text\" name=\"Email\" maxlenght = \"50\" size = \"50\" value =" . $email . ">&nbsp;&nbsp;&nbsp;&nbsp;";
print "<p>";
print "Subscribe:&nbsp;";
print "<input READONLY STYLE=\"color: #808080;\" type=\"text\" name=\"Subscribe\" maxlenght = \"3\" size = \"3\" value =" . $subscribe . ">";
print "<p>";
print "&nbsp;&nbsp;&nbsp;&nbsp;Source:&nbsp;";
print "<input READONLY STYLE=\"color: #808080;\" type=\"text\" name=\"Source\" maxlenght = \"5\" size = \"5\" value =" . $source . ">";
print "</FONT>";
print "<p>";

print "<input type=\"submit\" name=\"type\" value=\"Unsubscribe\">";
print "&nbsp;&nbsp;<input type=\"submit\" name=\"type\" value=\"Subscribe\">";
print "&nbsp;&nbsp;<input type=\"button\" name=\"type\" value=\"Cancel\" onclick=\"parent.location='http://www.rpchiro.com/php/email.php?username=admin&password=Kim_3056&submit=View+Data'\">";
print "<p>";

print "</form>";
print "</html>";


?>
