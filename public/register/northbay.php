<? include("../includes/template/header.inc.php");?>

    <tr>
    <td width="272" height="474" valign="top">

	<table width="100%" height="100%" border="0" cellpadding="2" cellspacing="5" bgcolor="1F005C" class="leftbox">

        <tr>

          <td width="273" height="991" valign="top" align="center"><br>
           <img src="../images/aboutus/shoulder.jpg" width="210 px" height="210 px"><br>
		   <br>

		   <div class="testimonials">A powerful seminar that cuts through the dogma of modern practice management! It pulls you back on track, headed in the right direction. <b>--Jeff Norman DC</b> </div>
          		  
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

	$Subject = "Santa Rosa Register ".$name;
	$Message = "Name: ".$name."\n"."Contact: ".$email."\n"."Phone: ".$phone."\n"."Address: ".$address."\n"."Address2: ".$address2."\n"."Attendees: ".$attendees."\n"."CCA Member: ".$ccamember;
     
        function validate($name, $email, $phone) {
	   $valid = true;

	   if ($name == null) { $valid = false; }
	   if ($email == null and $phone == null) { $valid = false; }

	   return $valid;
	}

  
        if (validate($name, $email, $phone) == true){
           mail($webbirg, $Subject, $Message);
	   mail($webbirg2, $Subject, $Message);
	
           print "<h1>";
           print "<div align=\"center\">You have successfully registered!";
           print "</div>";
           print "</h1>";
           print "<div class=\"text\">If you have any questions about the seminar, contact Scott Bell DC at 707-526-1928.</div>";

        } else {
     ?>

			<h1>
			  <div align="center">  North Bay District July 27th Seminar Signup Form</div>
			</h1>
			<div class="text">Fill out the following form to register for our 2 hour seminar on July 27th.  Join us and get 2 hours of CE credit's while you learn the 5 critical steps to building a practice full of patients who stay, pay and refer!  </div>
			<form method="post" action="northbay.php">
	<div id="form">
	<table  width="465 px" height="314px" align="center" >

		<tr>
			<td><span class="text">Name:</span> </td><td><input name="fname" type="text" size="40" /></td>
		</tr>
		<tr>
			<td><span class="text">Email:</span> </td><td><input name="email" type="text" size="40" /></td>
		</tr>
		<tr>
			<td><span class="text">Phone Number:</span> </td><td><input name="phone" type="text" size="40" /></td>
		</tr>
		<tr>
			<td><span class="text">Address:</span> </td><td><input name="address" type="text" size="40" /></td>
		</tr>
		<tr>
			<td><span class="text">City/State/Zip:</span> </td><td><input name="address2" type="text" size="40" /></td>
		</tr>
		<tr>
			<td><span class="text">Number Attending:</span> </td><td><input name="attendees" type="text" size="40" /></td>
		</tr>
		<tr>
			<td><span class="text">CCA Member(Yes/No):</span> </td><td><input name="ccamember" type="text" size="40" /></td>
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
