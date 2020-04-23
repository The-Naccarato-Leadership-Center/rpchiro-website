<?php

mysql_connect ('localhost', 'admin_admin', 'Kim_3056');

mysql_select_db ('admin_email');

$query = "select email from email";

$result = mysql_query($query);

while ($row = mysql_fetch_object ($result)) {
       echo "$row->ID, $row->email</BR>\n";
}


?>
