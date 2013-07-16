<?php
echo "<div class='span9'>";
if (isset($_GET['pgm'])) {
$stmt=$mysqli->query("SELECT * FROM `classes` WHERE `clss-prgm` = '$_GET[pgm]'");
} 
if(!isset($_GET['pgm'])) {
$stmt=$mysqli->query("SELECT * FROM `classes` WHERE `clss-prgm` = \"Martial Arts\"");
}
print_r($_GET);
while ($r=$stmt->fetch_assoc()) {
echo "<div class='row well'>";
echo "<div class='span6'>";
echo "<h4>" .$r['clss-name']. " - Level " .$r['clss-lvl'];
echo "</h4><p>";
echo "Instructor: " .$r['clss-inst']. "</p>";
echo "<p>Program: " .$r['clss-prgm']. "</p>";
echo "<p>Age Group: " .$r['clss-age']. "</p>";
echo "<p>Seats Available: " .$r['clss-seats']. "</p>";
echo "<p><a class='btn' href='?action=classdetails&class=" .$r['clss-id']. "'>View details &raquo;</a></p>";
echo "</div><div class='span2'><p><img class='pull-right' src='" .$r["clss-img"]. "'></p></div></div>";
}
echo "</div>";
?>
