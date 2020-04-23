<?php
include("db_connect.inc");

  $email = $_REQUEST['Email'];
  $email = strtolower($email);

  if ($email == '') {
   $location = "Location: http://www.rpchiro.com/php/email_unsubscribe.php";
   header($location);
  } else {
     
     //print $email; 

     //print "<br />";

     $Query = "select email from email where LOWER(email)='" . $email . "'";
     //print $Query; 
     //print "<br />";

     $Row = $myDB->FetchAssocQuery($Query);

     $dbEmail = $Row['email'];

     //print "dbemail is $dbEmail";

     if ($dbEmail != '') {
        $updateQuery = "update email set subscribe = 'U' where LOWER(email)='" . $dbEmail . "'"; 
        $myDB->Query($updateQuery);
        $update = 'Y';
        
        $subject = "Automatic Email Unsubscribe";
        $message = "Email address " . $dbEmail . " has been automatically unsubscribed";
        $to_mail = "drjim@rpchiro.com";

        mail($to_mail,$subject,$message);


     } else {
        $update = 'N';
     } 
    
     $location = "Location: http://www.rpchiro.com/php/email_unsubscribe_result.php?update=" . $update;

     header($location);
  }

?>
