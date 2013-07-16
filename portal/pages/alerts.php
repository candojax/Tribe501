<?php
$getalerts = $mysqli->query("SELECT
 `alt_id`, `alt_name`, `alt_date`, `alt_text`
 FROM `alerts` ORDER BY `alt_id` DESC LIMIT 3");

while ($a=$getalerts->fetch_assoc()) {
echo "<p><b>" .$a['alt_name']. "</b><br>" .$a['alt_text']. "<br><small><i>" .$a['alt_date']. "</i></small></p>"; 
}
?>