<?php

include("db_connect.inc");

?>

<form action="email_add_sql.php" method="get">

<?php
print "<FONT COLOR=\"#808080\">";
print "<br><br>";
print "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email:&nbsp;";
print "<input STYLE=\"color: #808080;\" type=\"text\" name=\"Email\" maxlenght = \"50\" size = \"50\">&nbsp;&nbsp;&nbsp;&nbsp;";
print "<p>";
print "&nbsp;&nbsp;<input type=\"submit\" name=\"type\" value=\"Insert\">";
print "&nbsp;&nbsp;<input type=\"button\" name=\"type\" value=\"Cancel\" onclick=\"parent.location='http://www.rpchiro.com/php/email.php?username=admin&password=Kim_3056&submit=View+Data'\">";
print "<p>";

print "</form>";
print "</html>";


?>
