
<?php 
//Set the title of the page

//$sort = $_POST['classinst'];
 $q=$_GET["inst"];
if (!isset($q)) {
$stmt=$mysqli->query("SELECT * FROM classes");
}
else
{
$stmt=$mysqli->query("SELECT * FROM classes WHERE `clss-inst` = '$q'");
}
//Content

echo "<legend>All Classes</legend>";
?><div id="slctclass"><?php
include('templates/classdisplay.php');
?>
</div>
<?php
include('templates/cartsb.php');
include('templates/sortbar.php');
?>

</div>
