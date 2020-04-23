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
	<h1>Log Check</h1>
	
<br>
<?php
	if (isset($_SESSION['username'])) {
		echo "Logged in!";
		
	} else {
		echo "Not Logged in!";
		
	}

?>
<br><br>
<form action="logout.php">
	<button>Log out</button>
</form>



    </td>

</table>



<? include("../includes/template/footer.inc.php");?>



</body>
</html>
