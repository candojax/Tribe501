<legend>Enrolled Classes</legend>
<?php
isloggedin();
$getmycls = $mysqli->query("SELECT
 `registered`.`courseid`,
 `registered`.`stdid`,
 `classes`.`clss-id`,
 `classes`.`clss-name`,
 `classes`.`clss-prgm`,
 `classes`.`clss-lvl`,
 `classes`.`clss-inst`,
 `classes`.`clss-dscptn`
 FROM `registered`
 JOIN `classes` ON `registered`.`courseid`=`classes`.`clss-id` AND `registered`.`stdid`='$id'");
echo "<div class='span9'>";
while ($c=$getmycls->fetch_assoc()) {
echo "<div class='span7 well'>";
echo "<legend>" . $c['clss-name']. "</legend>";
echo "<p><b>Instructor: </b>" . $c['clss-inst']. "</p>";
echo "<p><b>Level: </b>" . $c['clss-lvl']. "</p>";
echo "<p><b>Program: </b>" . $c['clss-prgm']. "</p>";
echo "</p><p><a class='btn' href='?action=classdetails&class=" .$c['clss-id']. "'>View details &raquo;</a></p>";

echo "</div>";

}
echo "</div><div class='span3'>";
include('templates/sortbar.php');
echo "</div>";
?>
