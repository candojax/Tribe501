<?php
$program = $_GET["p"];
$stmt=$mysqli->query("SELECT * FROM classes WHERE `clss-prgm` = '$program'");
$row_cnt = $stmt->num_rows;
?>
<legend><?php echo $program; ?> Program</legend>
<?php

if ($row_cnt==0) {
echo "<div class='span8 well'>";
echo "<h2><p><i class='icon-question-sign'></i>Sorry</p></h2><p>No classes were found with the terms you searched for. If you feel this is an error, feel free to contact support.</p></div>";
} else
{ include('templates/classdisplay.php');
 }


include('templates/cartsb.php');
?>
