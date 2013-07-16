<?php
isloggedin();
isadmin();
echo "<legend>Create A Class</legend>";

if ($_POST['makeclass'] == "create") {

$classid = 'NULL';
$clsage = $_POST['clage'];
$clname = $_POST['classname'];
$clprgm = $_POST['classprgm'];
$cllevel = $_POST['level'];
$clinst = $_POST['classinst'];
$clseats = $_POST['classmax'];
$cldscptn = $_POST['classdscptn'];
$stdate = $_POST['clsfrom'];
$endate = $_POST['clsto'];
$stime = date('H:i:s', strtotime($_POST['clstime1']));
$ftime = date('H:i:s', strtotime($_POST['clstime2']));
$clprice = $_POST['clsprice'];

$stmt = $mysqli->prepare("INSERT INTO classes (`clss-age`, `clss-name`, `clss-prgm`, `clss-lvl`, `clss-inst`, `clss-seats`, `clss-dscptn`, `clss-begin`, `clss-over`, `clss-stime`, `clss-ftime`, `clss-price`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('sssisissssss', $clsage, $clname, $clprgm, $cllevel, $clinst, $clseats, $cldscptn, $stdate, $endate, $stime, $ftime, $clprice);
if (!$stmt->execute()) {
echo "<div class='alert alert-error'>";
//echo "An error occurred. Please check your data and try again.
// If you believe you are receiving this message in error, please contact technical support.";
    printf("Errormessage: %s\n", $mysqli->error);
echo "</div>";
include('templates/classform.php');
} else {
echo "<div class='alert alert-success'>
Class created. Click here to make changes, view, or delete this class.</div>";
include('templates/classform.php');

}
} else { include('templates/classform.php');
}
?>
