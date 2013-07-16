<?php
$postid = $_GET['topicid'];
echo "<div class='span8'>";
echo "<div class='span8'>";
readforumpost($postid);
echo "</div>";

echo "<div class='span8' id='cmnts'>";
include("pages/forum_replies.php");
echo "</div></div>";
echo "<div class='span3'>";
include("pages/forum_reply.php");
include("templates/forumbar.php");
echo "</div>";
?>
