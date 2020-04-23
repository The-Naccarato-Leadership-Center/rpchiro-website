<? include("../includes/template/header.inc.php");?>

    <tr>
    <td width="272" height="474" valign="top">

	<table width="100%" height="100%" border="0" cellpadding="2" cellspacing="5" bgcolor="1F005C" class="leftbox">

        <tr>

          <td width="273" height="991" valign="top" align="center"><br>
           <img src="../images/aboutus/shoulder.jpg" width="210 px" height="210 px"><br>
		   <br>

		   <div class="testimonials"></div>
          		  
          </td>
        </tr>
    </table>

    <td width="499" valign="top" align="justify">

   <?php
        $name = $_POST[fname];
	$email = $_POST[email];
        $email = strtolower($email);
	$phone = $_POST[phone];
	$address = $_POST[address];
	$address2 = $_POST[address2];
	$attendees = $_POST[attendees];
	$ccamember = $_POST[ccamember];
	$webbirg = "drjim@rpchiro.com";
	//$webbirg2 = "drlorrainegiliberto@hotmail.com";

	$Subject = "Unsubscribe ".$name;
	$Message = "Unsubscribe: ".$email;
     
        function validate($email) {
	   $valid = true;

	   if ($email == null) { $valid = false; }

	   return $valid;
	}

  
        if (validate($email) == true){
           mail($webbirg, $Subject, $Message);
	   //mail($webbirg2, $Subject, $Message);
	
           print "<h1>";
           print "<div align=\"center\">You have successfully unsubscribed";
           print "</div>";
           print "</h1>";

        } else {
     ?>

			<h1>
			  <div align="center">  Weekly Email Coaching Tip Unsubscribe Form</div>
			</h1>
			<div class="text"></div>
			<form method="post" action="unsub.php">
	<div id="form">
	<table  width="465 px" height="314px" align="center" >


		<tr>
			<td><span class="text">Email:</span> </td><td><input name="email" type="text" size="40" /></td>
		</tr>

		<tr>
			<td><span class="text" align="center">Are you a robot?(Yes/No):</span> </td><td><input name="ccamember" type="text" size="40" /></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="Send" /> </td>
		</tr>

	</table>
	</div>
	<?php } ?>
</form>

    </td>
	

</table>


<? include("../includes/template/footer.inc.php");?>

</body>
</html>
