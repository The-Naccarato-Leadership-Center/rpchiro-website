<? include("../includes/template/header2.inc.php");?>


  <div class="row" style="display: inline-flex;">
    <div class="col-1 sidebar" style="background-color: #001b09; text-align: center;">
      <img src="../images/jim1.png" width="85%" style="padding-bottom: 20px;">
      <? include("../includes/template/tip.inc.php");?>
      

      <div class="testimonials">A good practice does not spring up overnight but grows slowly and soundly because it is rooted in the solid, fertile ground of hard work, integrity, and dignified, time-proven principles and procedures. To accomplish this objective,  participate in the Weekly Email Coaching Program.</div>

    </div>
    <div class="col-3">

      <div class="mobilepic">
      <img src="../images/jim1.png" width="70%" style="box-shadow: 4px 4px 4px grey;">
      </div>
      
      <h1>Weekly Email Coaching Signup Form</h1>

      <p>By subscribing to the Weekly Email Coaching Program, you will receive the email coaching messages at <i>no charge!</i> Receive current, relevant, practice-building information specifically designed to teach you how to succeed and prosper. <b>Every doctor should be on the Weekly Email Coaching Program!</b></p>

      <div>

      <form method="post" action="send_mail.php">
        <p>
          <label>Name<br />
            <input type="text" name="first_name" required>
          </label>
        </p>
        <p>
          <label>Email<br />
            <input type="email" name="email_address" required>
          </label>
        </p>
        <p>
          <label>State<br />
            <select name="state" required>
              <option value="AL">Alabama</option>
              <option value="AK">Alaska</option>
              <option value="AZ">Arizona</option>
              <option value="AR">Arkansas</option>
              <option value="CA">California</option>
              <option value="CO">Colorado</option>
              <option value="CT">Connecticut</option>
              <option value="DE">Delaware</option>
              <option value="DC">District Of Columbia</option>
              <option value="FL">Florida</option>
              <option value="GA">Georgia</option>
              <option value="HI">Hawaii</option>
              <option value="ID">Idaho</option>
              <option value="IL">Illinois</option>
              <option value="IN">Indiana</option>
              <option value="IA">Iowa</option>
              <option value="KS">Kansas</option>
              <option value="KY">Kentucky</option>
              <option value="LA">Louisiana</option>
              <option value="ME">Maine</option>
              <option value="MD">Maryland</option>
              <option value="MA">Massachusetts</option>
              <option value="MI">Michigan</option>
              <option value="MN">Minnesota</option>
              <option value="MS">Mississippi</option>
              <option value="MO">Missouri</option>
              <option value="MT">Montana</option>
              <option value="NE">Nebraska</option>
              <option value="NV">Nevada</option>
              <option value="NH">New Hampshire</option>
              <option value="NJ">New Jersey</option>
              <option value="NM">New Mexico</option>
              <option value="NY">New York</option>
              <option value="NC">North Carolina</option>
              <option value="ND">North Dakota</option>
              <option value="OH">Ohio</option>
              <option value="OK">Oklahoma</option>
              <option value="OR">Oregon</option>
              <option value="PA">Pennsylvania</option>
              <option value="RI">Rhode Island</option>
              <option value="SC">South Carolina</option>
              <option value="SD">South Dakota</option>
              <option value="TN">Tennessee</option>
              <option value="TX">Texas</option>
              <option value="UT">Utah</option>
              <option value="VT">Vermont</option>
              <option value="VA">Virginia</option>
              <option value="WA">Washington</option>
              <option value="WV">West Virginia</option>
              <option value="WI">Wisconsin</option>
              <option value="WY">Wyoming</option>
            </select>
          </label>
        </p>
        <p>
          <label>Are you a DC?<br />
            <select name="dc" required>
              <option value="Yes">Yes</option>
              <option value="No">No</option>
            </select>
          </label>
        </p>
        <p>
          <input type="submit">
        </p>
      </form>

    </div>

    <p>*<i>Under no circumstances will we ever sell or share your email address or personal information.</i></p>

    </div>
  </div>
</div>


<? include("../includes/template/footer2.inc.php");?>

</body>
</html>
