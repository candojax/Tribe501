<div class="center well">
  	<legend>Quick Add User Utility</legend>
    <form accept-charset="UTF-8" action="?action=quickadd" method="post">
		<p><input class="span3" name="fname" placeholder="First Name" type="text"> 
		<input class="span3" name="lname" placeholder="Last Name" type="text"> </p><p>
        <input class="span3" name="uname" placeholder="Username" type="text">
        <input class="span3" name="pass" placeholder="Password" type="password"> </p><p>
        <input type="checkbox" name="admin" value="1"> Give User Admin Priveleges</p><p>

        <input type="checkbox" name="add" value="add"> Add User?
<button class="btn btn-warning" type="submit">Add User</button></p>
    </form>
</div>
<?php
if (isset($_POST['add'])) {
$stuid = 'NULL';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$fullname = array($lname,$fname);
$name = implode(",", $fullname);
$username = $_POST['uname'];
$pass = md5($_POST['pass']);
$admin = $_POST['admin'];

$q = $dbh->prepare("INSERT INTO students (stu_id, stu_usrname, stu_pass, stu_name, admin) VALUES (?, ?, ?, ?, ?)");
$q->execute(array($stuid, $username, $pass, $name, $admin));

echo "<div class='alert'>
  <button type='button' class='close' data-dismiss='alert'>&times;</button>
  <strong><p>Success!</p></strong><p>" .$fname. " has been added to the user database.</p>
</div>";




$mysqli->close();
}