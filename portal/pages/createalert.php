<?php if ($_POST['sub'] == "subalert") {
$altitle = $_POST["alt_name"];
$altdate = date('Y-m-d');
$altcont = $_POST["alt_text"];
$crpost = $mysqli->prepare("INSERT INTO alerts (`alt_name`, `alt_date`, `alt_text`) VALUES (?, ?, ?)");

$crpost->bind_param('sss', $altitle, $altdate, $altcont);
 
if (!$crpost->execute()) {
echo "<div class='alert alert-error'>
  <button type='button' class='close' data-dismiss='alert'>&times;</button>An error occurred, your content has not been posted, please try again.</div>";
} else { echo "<div class='alert alert-success'>
  <button type='button' class='close' data-dismiss='alert'>&times;</button>Your content has been posted and is now live.</div>"; 
 }  } include('templates/alertform.php');
?>