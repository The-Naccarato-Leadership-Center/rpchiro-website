<? include("../includes/template/header.inc.php");?>

    <tr>
    <td width="272" height="474" valign="top">

	<table width="100%" height="100%" border="0" cellpadding="2" cellspacing="5" bgcolor="navy" class="leftbox">
        <tr>

          <td width="273" height="991" valign="top" class="navigation" align="center"><br>
              <img src="../images/jim3.png" width="180 px"> <br>
              <br>

			 <? include("../includes/template/account.inc.php");?>

				<p>
				<div class="testimonials">If you're really committed to excellence in any field, find a  coach who can help guide you to a higher level of achievement.<b>--Joe Montana</b>


				<br>
			</div>
      </td>
        </tr>
    </table>
    <td width="499" valign="top" align="justify">
	<h1>Register</h1>
        

<form id="Register" name="register" method="post" action="sign_up.php">
 <table width="498">
   <tr>
	<td align="right"><label for="first_name">First Name: </label></td>
	<td align="left"><input type="text" id="first_name" name="first_name" maxlength="32"></td>
  </tr>
   <tr>
	<td align="right"><label for="last_name">Last Name: </label></td>
	<td align="left"><input type="text" id="last_name" name="last_name" maxlength="32"></td>
  </tr>
  <tr>
	<td align="right"><label for="username">Username: </label></td>
	<td align="left"><input type="text" id="username" name="username" maxlength="32"></td>
  </tr>
  <tr>
	<td align="right"><label for="user_pass">Password: </label></td>
	<td align="left"><input type="password" id="user_pass" name="user_pass"></td>
  </tr>
  <tr>
   <td></td>
   <td align="left">
	<input type="hidden" name="submitted" value="true">
	<input type="submit" value="Submit" />
   </td>
  </tr>
 </table>
</form>



    </td>

</table>



<? include("../includes/template/footer.inc.php");?>



</body>
</html>
