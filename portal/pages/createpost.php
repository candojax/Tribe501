
<?php
echo "<legend>Create a New Post</legend>";
isadmin();
if ($_POST['create'] != "crpost") {
include('templates/postform.php');
include('templates/footer.php');

} else {
if (isset($_FILES['ftimg']) && $_FILES['ftimg']['size'] > 0) {

// Temporary file name stored on the server
$tmpName = $_FILES['ftimg']['tmp_name'];

// Read the file
$fp = fopen($tmpName, 'r');
$data = fread($fp, filesize($tmpName));
$data = addslashes($data);
fclose($fp);
}

$artitle = $_POST["ptitle"];
$postdate = date('Y-m-d');
$artcat = $_POST["arcat"];
$artcont = $_POST["arcont"];
$crpost = $mysqli->prepare("INSERT INTO article (`author`, `title`, `dateposted`, `categoryID`, `contents`, `artimg`) VALUES (?, ?, ?, ?, ?, ?)");

$crpost->bind_param('sssssb', $id, $artitle, $postdate, $artcat, $artcont, $data);
$crpost->send_long_data(0, file_get_contents($fp));
}
if (!$crpost->execute()) {
echo "<div class='alert alert-error'>An error occurred, your content has not been posted, please try again.</div>";
} else { echo "<div class='alert alert-success'>Your content has been posted and is now live.</div>";
include('templates/postform.php'); }
?>
