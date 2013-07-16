<?php
$getyourcls = $mysqli->query("SELECT
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

while ($c=$getyourcls->fetch_assoc()) {

echo "<b>Class Name:</b> " . $c['clss-name'];
echo "<br><b>Instructor: </b>" . $c['clss-inst'];
echo "<br><b>Level: </b>" . $c['clss-lvl'];
echo "<br><b>Program: </b>" . $c['clss-prgm'];
echo "<Br><br>";

}
?>
