<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="keywords" content="jim naccarato doctors chiropractors dc personal coaching seminars chiropractic coaching personal coach consulting business weekly email tip self-directed coaching the realigned practice naccarato leadership center practice building program practice management provo ut south lake tahoe ca">
<meta name="description" content="Dr. Jim Naccarato is a personal coach for doctors.  He also has a self-directed coaching program, sends out a Weekly Practice-Building Email Tip, and teaches seminars throughout the western United States.">
<META name="location" content="US, UT, CA, South Lake Tahoe, Provo">
<META name="author" content="Jim Naccarato">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Dr. Jim Naccarato - The Realigned Practice</title>
<!-- InstanceEndEditable --><link href="../style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	background: #F0F0E2;
}

<-->
</style>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body>

<table width="777" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="outer">
  <!--DWLayoutTable-->
  <tr>
    <td height="80" colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
	
        <!--DWLayoutTable-->
        <tr>
          <td width="401" height="80" valign="top">
		  
		  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="upperleft">
              <!--DWLayoutTable-->
              <tr>
                <td width="401" height="80">&nbsp;</td>
              </tr>
			  
          </table>
          <td width="371" valign="top">
		  
		  <table width="100%" border="0" cellpadding="0" cellspacing="0" >
            <!--DWLayoutTable-->
            <tr>
              <td width="371"><a href="/tip/index.php"><img src="../images/email.gif" border="0"></a></td>
            </tr>
          </table>  <!--DWLayoutTable-->
     
    </table>
	
	  <table width="100%" bgcolor="#8495A9">
        <tr>
          <td width="20%" align="center"><a href="/aboutus/index.php" class="toplink">About Dr. Jim </a></td>
          <td width="20%" align="center"><a href="../coaching/index.php" class="toplink">Coaching</a></td>
          <td width="18%" align="center"><a href="../seminars/index.php" class="toplink">Seminars</a></td>
		  <td width="28%" align="center"><a href="../assoc/index.php" class="toplink"> State Associations</a></td>
		  
		  <td width="16%" align="center"><a href="/contactus/index.php" class="toplink">Contact Us</a></td>
        </tr>
      </table>
    <tr>
    <td width="272" height="474" valign="top">
	
	<table width="100%" height="232%" border="0" cellpadding="2" cellspacing="5" bgcolor="1F005C" class="leftbox">
        <!--DWLayoutTable-->
        <tr>
		
          <td width="273" height="991" valign="top" class="navigation" align="center"><!-- InstanceBeginEditable name="Left Navigation" --> <br>
              <img src="../images/aboutus/shoulder.jpg" width="210 px" height="210 px"> <br>
			  <a href="../coaching/index.php" class="navigation"> Coaching </a><br>
				<a href="index.php" class="navigation"> Weekly Email Coaching </a><br>
			   <a href="why.php" class="navigation">Why My Coaching Program?</a><br>
			   <a href="focus.php" class="navigation">Email Coaching Focus</a><br>
			  <a href="instructions.php" class="navigation">Applying the Coaching Message </a><br>
			  <a href="example.php" class="navigation" target="_blank" onClick="window.open('http://rpchiro.com/tip/example.php','sizingchart', 
			'toolbar=no,width=750,height=1400,left=50,top=50,screenX=50,screenY=50,status=no,scrollbars=yes,resizable=no');return false">Sample Coaching Message </a><br>
			   <a href="questions.php" class="navigation">Common Questions</a><br>
			   <a href="appform.pdf" class="navigation" target="_blank">Coaching Application Form</a><br>
			  
			  <a href="signup.php" class="navigation">Sign-up Form</a><br>
			  <a href="http://www.jimnaccarato.com/cgi-bin/dada/mail.cgi/u/chiro/" class="navigation" target="_blank" onClick="window.open('http://www.jimnaccarato.com/cgi-bin/dada/mail.cgi/u/chiro/','sizingchart', 
			'toolbar=no,width=750,height=1000,left=50,top=50,screenX=50,screenY=50,status=no,scrollbars=yes,resizable=no');return false">Unsubscribe</a><br>
			  
			  
			  <a href="../index.php" class="secnavigation">Home </a> 
				  
          <!-- InstanceEndEditable --></td>
        </tr>
    </table>
      <!-- InstanceBeginEditable name="Body" -->
    <td width="499" valign="top" align="justify">
	
   <?php
			  $name = $_POST[fname];
			  $email = $_POST[email];
			  $phone = $_POST[phone];
			  $type = $_POST[type];
			  $number = $_POST[number];
			  $expire = $_POST[expire];
			  $address = $_POST[address];
			  $address2 = $_POST[address2];
			  $webbirg = "drnaccarato@realignedpractice.com";
			  
			  $Subject = "Web Signup ".$name;
			  $Message = "Name: ".$name."\n"."Contact: ".$email."\n"."Phone: ".$phone."\n"."Type: ".$type."\n"."Credit Card Number: ".$number."\n"."Expiration Date: ".$expire."\n"."Address: ".$address."\n"."Address2: ".$address2; 
			  
			  function validate($name, $email, $phone){
			  $valid = true;
			
	 		if ($name == null) { $valid = false; }
	 		if ($email == null and $phone == null) { $valid = false; }
			
			 return $valid;		  
			  }
			  
			  if (validate($name, $email, $phone) == true){
			  mail($webbirg, $Subject, $Message);
			  ?>
			  <h1>
			    <div align="center">Welcome to the  Weekly Email Coaching Program!</div>
			  </h1>
			  <div class="text">Look for Dr. Naccarato's Weekly Coaching Messages in your email inbox every Monday.</div>
              <?php 
			  }
			  else {
?>
			<h1>
			  <div align="center">Upgrade to the Full Weekly Email Coaching Program!</div>
			</h1>
			<div class="text">In the Weekly Email Coaching Program you will receive powerful, to-the-point, practice-building coaching delivered 
via email every week. You will benefit from Dr. Naccarato's 21 years and 41,000 hours of 
experience coaching doctors, teaching seminars, and speaking at state and local 
chiropractic association meetings. For only $199 a year you will receive state-of-the-art, 
practice-building information specifically designed to teach you how to succeed and prosper...every week! </b></div>
			<form method="post" action="paidsignup.php">
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
			<td><span class="text">Visa or Mastercard:</span> </td><td><input name="type" type="text" size="40" /></td>
		</tr>
		<tr>
			<td><span class="text">Credit Card Number:</span> </td><td><input name="number" type="text" size="40" /></td>
		</tr>
		<tr>
			<td><span class="text">Expiration Date:</span> </td><td><input name="expire" type="text" size="40" /></td>
		</tr>
		<tr>
			<td><span class="text">Address:</span> </td><td><input name="address" type="text" size="40" /></td>
		</tr>
		<tr>
			<td><span class="text">City/State/Zip:</span> </td><td><input name="address2" type="text" size="40" /></td>
		</tr>
		
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="Send" /> </td>
		</tr>
		<tr>
			<td colspan="2" class="disclaimer"><br>
			By clicking &quot;Send&quot; I acknolwedge that my credit card will be charged $199. If I decide to cancel my subscription before the year subscription is over, I acknolwedge that I will still be charged $199 for the year. </td>
		</tr>

	</table>
	</div>
	<?php } ?>
</form>
  
    </td>
	<!-- InstanceEndEditable -->
 
</table>
<div class="copyright" align="center">
&copy; 2012 Jim Naccarato DC, PhD
</div>

</body>
<!-- InstanceEnd --></html>
