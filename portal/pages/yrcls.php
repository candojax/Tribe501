<?php
$getyourcls = $mysqli->query("SELECT
 stdid,
 GROUP_CONCAT(DISTINCT regd.courses) AS crs,
 `classes`.`clss-id`,
 `classes`.`clss-name`,
 `classes`.`clss-prgm`,
 `classes`.`clss-lvl`,
 `classes`.`clss-inst`,
 `classes`.`clss-dscptn`
 FROM regd classes where `classes`.`clss-id`=4");
while ($c=$getyourcls->fetch_assoc()) {
echo $c['crs'];
$cls = explode(",", $c['crs']);
print_r($c);
echo "<b>Class Name:</b> " . $c['clss-name'];
echo "<br><b>Instructor: </b>" . $c['clss-inst'];
echo "<br><b>Level: </b>" . $c['clss-lvl'];
echo "<br><b>Program: </b>" . $c['clss-prgm'];
echo "<Br><br>";

}
?>
