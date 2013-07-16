<?php if (isset($_POST['add'])) {

error_reporting(E_ALL);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}





$stuid = 'NULL';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$fullname = array($lname,$fname);

$name = implode(",", $fullname);

$arcode = $_POST['arcode'];
$phone3 = $_POST['phone3'];
$phone4 = $_POST['phone4'];
$primphone = array($arcode,$phone3,$phone4);

$phone = implode("-", $primphone);

$secarcode = $_POST['secarcode'];
$secphone3 = $_POST['secphone3'];
$secphone4 = $_POST['secphone4'];
$secphone = array($secarcode,$secphone3,$secphone4);

$secphone = implode("-", $secphone);

$stradd = $_POST['stradd'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$addarr = array($stradd,$city,$state,$zip);

$address = implode(",", $addarr);

$dobmonth = $_POST['dobmonth'];
$dobday = $_POST['dobday'];
$dobyr = $_POST['dobyr'];
$dobarr = array($dobyr,$dobmonth,$dobday);

$dob = implode("", $dobarr);

$ec1fname = $_POST['ec1fn'];
$ec1lname = $_POST['ec1ln'];
$ec1narr = array($ec1fname,$ec1lname);
$ec1name = implode(" ", $ec1narr);
$ec1arcd = $_POST['ec1ac'];
$ec1f3 = $_POST['ec1f3'];
$ec1l4 = $_POST['ec1l4'];
$ec1pharr = array($ec1arcd,$ec1f3,$ec1l4);
$ec1phone = implode("-", $ec1pharr);

$ec1rel = $_POST['ec1rel'];

$ec1arr = array($ec1name,$ec1rel,$ec1phone);


$emcon1 = implode(",", $ec1arr);

$ec2fname = $_POST['ec2fn'];
$ec2lname = $_POST['ec2ln'];
$ec2narr = array($ec2fname,$ec2lname);
$ec2name = implode(" ", $ec2narr);
$ec2arcd = $_POST['ec2ac'];
$ec2f3 = $_POST['ec2f3'];
$ec2l4 = $_POST['ec2l4'];
$ec2pharr = array($ec2arcd,$ec2f3,$ec2l4);
$ec2phone = implode("-", $ec2pharr);
$ec2rel = $_POST['ec2rel'];

$ec2arr = array($ec2name,$ec2rel,$ec2phone);

$emcon2 = implode(",", $ec2arr);

$username = $_POST['uname'];
$pass = md5($_POST['pass']);
$status = $_POST['status'];
$level = $_POST['level'];
$fund = $_POST['fund'];
$emp = $_POST['empl'];
$email = $_POST['email'];
$trainyr = $_POST['trainyr'];

$q = $dbh->prepare("INSERT INTO students (stu_id, stu_usrname, stu_pass, stu_name, stu_status, stu_lvl, stu_cmpfnd, stu_empl, stu_phone, stu_phone2, stu_email, stu_addr, stu_dob, stu_emcon1, stu_emcon2, stu_trainyr) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$q->execute(array($stuid, $username, $pass, $name, $status, $level, $fund, $emp, $phone, $secphone, $email, $address, $dob, $emcon1, $emcon2, $trainyr));

echo "<div class='alert'>
  <button type='button' class='close' data-dismiss='alert'>&times;</button>
  <strong><p>Success!</p></strong><p>Thank you for registering, " . $fname . ". Please log in to continue.</p>
</div>";




$mysqli->close();
}
?>
<form onsubmit="return formCheck(this);" class="form-horizontal" action='?action=register' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Register</legend>
    </div>
<div id="span12">
<div class="alert alert-info">Please note, items marked with <i class="icon-asterisk"></i> are required to submit this form.</div>
      <!-- Username -->
      <div class="control-group well span3">
     <h3>Basic Information</h3><span>
<label><i class="icon-asterisk"></i>First</label>
<input type="text" name="fname" class="input-medium" maxlength="255" size="14" value="" required>
<label><i class="icon-asterisk"></i>Last</label>
<input type="text" name="lname" class="input-medium" maxlength="255" size="14" value="" required></p></span>
<label>Birthday</label>
<span>
<input name="dobmonth" class="input-mini" size="2" maxlength="2" value="MM" type="text"> /
<input name="dobday" class="input-mini"  size="2" maxlength="2" value="DD" type="text"> /
<input name="dobyr" class="input-mini" size="4" length="4" maxlength="4" value="YYYY" type="text"></p>
</span>
      </div>
 

      <div class="control-group well span3">
<h3>Mailing Address</h3>
       <label><i class="icon-asterisk"></i>Street Address</label>
<input name="stradd" value="" type="text" required><br>
<label><i class="icon-asterisk"></i>City</label>
<input name="city" value="" type="text" required><span>
<label><i class="icon-asterisk"></i>State & ZIP Code</label><input name="state" class="input-mini" size= "2" maxlength="2" value="" type="text" required>

<input name="zip" class="input-mini" size="5" maxlength="15" value="" type="text" required></span> </div>

 
<div class="control-group well span3">
<h3>Contact Information</h3>
<label><i class="icon-asterisk"></i>Email </label>

<input name="email" type="text" maxlength="255" value="" required>
<br>
<label><i class="icon-asterisk"></i>Primary Phone Number </label><span>
<input name="arcode" class="input-mini" size="3" maxlength="3" value="" type="text" required> -

</span>
<span>
<input name="phone3" class="input-mini" size="3" maxlength="3" value="" type="text"> -

</span>
<span>
<input name="phone4" class="input-mini" size="4" maxlength="4" value="" type="text">

</span>
<br>
<label>Secondary Phone Number </label>
<span>
<input name="secarcode" class="input-mini" size="3" maxlength="3" value="" type="text"> -

</span>
<span>
<input name="secphone3" class="input-mini" size="3" maxlength="3" value="" type="text"> -

</span>
<span>
<input name="secphone4" class="input-mini" size="4" maxlength="4" value="" type="text">

</span>         <p class="help-block">You will need to enter a valid email address in order to activate your account. </p>
      </div>

 
<div class="control-group well span3">
<h3>Student Information</h3>

<label>Status</label>
<select name="status"> 
<option value="" selected="selected"></option>
<option value="0" >New Student</option>
<option value="1" >Returning</option>
</select>
<label>Program Level </label>
<select name="level"> 
<option value="" selected="selected"></option>
<option value="1" >I</option>
<option value="2" >II</option>
<option value="3" >III</option>
<option value="4" >IV</option>
<option value="dt" >DT</option>
<option value="appr">Apprentice</option>
</select>

<label>Fundamentals Completed? </label>

<select name="fund"> 
<option value="" selected="selected"></option>
<option value="1" >Yes</option>
<option value="0" >No</option>
</select>        <p class="help-block">Please confirm password</p>
      </div>

 
<div class="control-group well span3">
<h3>Student Background</h3>
<label>Employment or Other Schools </label>
<br>
<textarea name="empl"></textarea>

<br>
<label>What year did you begin training? </label><br>
<input name="trainyr" type="text" maxlength="4" value=""/> 
</div>

<div class="control-group well span3">
<h3>New Account</h3>
<label><i class="icon-asterisk"></i>Username </label>
<input name="uname" type="text" maxlength="255" value="" required> 
 <br>
<label><i class="icon-asterisk"></i>Password </label>
<input name="pass" id="password" type="password" maxlength="255" value="" required>
<br>
<label><i class="icon-asterisk"></i>Password</label>
<input name="pass-chk" id="password-check" type="password" maxlength="255" value="" required>
<br>
<small>
Please enter your password twice for security purposes
</small>
</div>

<div class="control-group well span3">
<h3>Emergency Contact</h3>
<label class="description">Name </label><br>
<span>
<label for="element_11_1">First</label>
<input id="element_11_1" name= "ec1fn" type="text" class="element text" maxlength="255" size="8" value=""/>

</span>
<span>
<label>Last</label>
<input id="element_11_2" name= "ec1ln" type="text" class="element text" maxlength="255" size="14" value=""/>

</span> 
<br>
<label class="description" for="element_12">Relationship </label>

<input id="element_12" name="ec1rel" class="element text medium" type="text" maxlength="255" value=""/> 
<br>
<label class="description" for="element_13">Phone </label>
<span>
<input id="element_13_1" name="ec1ac" size="3" maxlength="3" value="" class="input-mini" type="text"> -
</span>
<span>
<input id="element_13_2" name="ec1f3" size="3" maxlength="3" value="" class="input-mini" type="text"> -
</span>
<span>
<input id="element_13_3" name="ec1l4" size="4" maxlength="4" value="" class="input-mini" type="text">
</span>
</div>

<div class="control-group well span3">
<h3>Emergency Contact 2</h3>
<label class="description" for="element_14">Name </label><br>
<span>

<input id="element_14_1" name="ec2fn" class="element text" type="text" maxlength="255" size="8" value=""/>

</span>
<span>
<label>Last</label>
<input id="element_14_2" name="ec2ln" type="text" class="element text" maxlength="255" size="14" value=""/>

</span> <br>

<label class="description" for="element_15">Relationship </label>

<input id="element_15" name="ec2rel" class="element text medium" type="text" maxlength="255" value=""/> 
 <br>

<label class="description" for="element_16">Phone </label>
<span>
<input id="element_16_1" name="ec2ac" class="input-mini" size="3" maxlength="3" value="" type="text"> -

</span>
<span>
<input id="element_16_2" name="ec2f3" class="input-mini" size="3" maxlength="3" value="" type="text"> -

</span>
<span>
<input id="element_16_3" name="ec2l4" class="input-mini" size="4" maxlength="4" value="" type="text">

</span>

</div>

<div class="control-group well span3">
<h3>Submit Registraton</h3>
       <p> <i class="icon-asterisk"></i><input type="checkbox" name="add" value="add"> Confirm Registration</p>
<p><i class="icon-asterisk"></i><input type="checkbox" name="terms" value="terms">I agree to all terms and conditions.</p>
<p><i class="icon-asterisk"></i><input type="checkbox" name="infotrue" value="infotrue">I certify that all information is correct and true.</p>
<p><input type="checkbox" name="mlist" value="mlist">I would like to receive information from The Performer's Academy via e-mail.</p>


        <button class="btn btn-success" type="Submit">Register</button>
      </div>
</div>
  </fieldset>
</form>


<script language="JavaScript">
<!--

/***********************************************
* Required field(s) validation v1.10- By NavSurf
* Visit Nav Surf at http://navsurf.com
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

function formCheck(formobj){
	// Enter name of mandatory fields
	var fieldRequired = Array("fname", "lname");
	// Enter field description to appear in the dialog box
	var fieldDescription = Array("First Name", "Last Name");
	// dialog message
	var alertMsg = "Please complete the following fields:\n";
	
	var l_Msg = alertMsg.length;
	
	for (var i = 0; i < fieldRequired.length; i++){
		var obj = formobj.elements[fieldRequired[i]];
		if (obj){
			switch(obj.type){
			case "select-one":
				if (obj.selectedIndex == -1 || obj.options[obj.selectedIndex].text == ""){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
				break;
			case "select-multiple":
				if (obj.selectedIndex == -1){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
				break;
			case "text":
			case "textarea":
				if (obj.value == "" || obj.value == null){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
				break;
			default:
			}
			if (obj.type == undefined){
				var blnchecked = false;
				for (var j = 0; j < obj.length; j++){
					if (obj[j].checked){
						blnchecked = true;
					}
				}
				if (!blnchecked){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
			}
		}
	}

	if (alertMsg.length == l_Msg){
		return true;
	}else{
		alert(alertMsg);
		return false;
	}
}
// -->
</script>
