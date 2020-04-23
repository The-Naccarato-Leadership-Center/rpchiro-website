<?php
include("db_connect.inc");

  $result = $_REQUEST['update'];

  print "<font size=\"4\">";

  if ($result == 'Y') {
     print "Your email has been successfully unsubscribed.";
   } else {
     print "We're sorry, your email does not appear to be in our database.<p>";
     print "If this is an error, please email us at drjim@rpchiro.com with the word UNSUBSCRIBE in the subject line.";     
   } 
    
?>
