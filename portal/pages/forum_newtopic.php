
<?php
isloggedin();
if ($_POST['newtopic'] == "newpost") {
$poster = $_POST['authorid'];
$title = $_POST['topicname'];
$content = $_POST['postcontent'];
$postdate = date('Y-m-d H:i:s');
$crtopic = $mysqli->prepare("INSERT INTO forumtopics (`opid`, `title`, `postcontent`, `posted`) VALUES (?, ?, ?, ?)");
$crtopic->bind_param('ssss', $poster, $title, $content, $postdate);
if (!$crtopic->execute()) {
echo "<div class='alert alert-error'>
  <button type='button' class='close' data-dismiss='alert'>&times;</button>An error occurred, your content has not been posted, please try again.</div>";
} else { echo "<div class='alert alert-success'>
  <button type='button' class='close' data-dismiss='alert'>&times;</button>Your content has been posted and is now live.</div>"; 
 } } 
echo "<div class='span8'>";
include("templates/forum_newtopic.php");
echo "</div>";
?>