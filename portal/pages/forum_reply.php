<?php
if ($_POST['postreply'] == "postcomment") {
$parent = $_POST['parentid'];
$commenter = $_POST['commenterid'];
$replycontent = $_POST['reply'];
$replydate = date('Y-m-d H:i:s');
$crcomment = $mysqli->prepare("INSERT INTO forumreplies (`parent`, `commenter`, `comdate`, `replycontent`) VALUES (?, ?, ?, ?)");
$crcomment->bind_param('ssss', $parent, $commenter, $replydate, $replycontent);
if (!$crcomment->execute()) {
echo "<div class='alert alert-error'>
  <button type='button' class='close' data-dismiss='alert'>&times;</button>An error occurred, your content has not been posted, please try again.</div>";
} else { echo "<div class='alert alert-success'>
  <button type='button' class='close' data-dismiss='alert'>&times;</button>Your content has been posted and is now live.</div>"; 
 } } 
include("templates/forum_reply.php");
?>