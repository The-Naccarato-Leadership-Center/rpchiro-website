<?php

include("db_connect.inc");

$Query = "select count(*) from email";


$RS = $myDB->Query($Query);

while ($currRec = $myDB->FetchAssocRec($RS))
   {
      $myarray[] = $currRec;   //$myarray is really array of arrays; in this case $currRec
   }

reset($myarray); //put pointer at beginning of array, may not be needed here but good form

$rcount = count($myarray);  //returns the number of rows in the array

print $rcount

?>
<html>
<head>
<title>Sample Database Query</title>
</head>

<body>
<p>Query:<?php echo $Query; ?>
</p>
</body>
</html>
