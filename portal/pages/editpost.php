<?php
if ($_POST['update'] == "update") {
$postid = $_POST['editpostid'];

$editpost = $mysqli->prepare("UPDATE article SET title = ?, contents = ? WHERE artid= ? ");
$editpost->bind_param('ssi', $_POST['postname'], $_POST['postcontent'], $postid);
if (!$editpost->execute()) {
echo "There was an error editing this post.";
} else { echo "<div class='alert'>
  <button type='button' class='close' data-dismiss='alert'>&times;</button>
  <strong><p>Success!</p></strong><p>" .$_POST['postname']. " has been updated.</p>
</div>"; } 

}
$postid = $_POST['editpostid'];

$getposts = $mysqli->query("SELECT
 article.artid,
 article.author,
 article.title,
 article.dateposted,
 article.categoryID,
 article.contents,
 students.stu_id,
 students.stu_name
 FROM article
 JOIN students ON students.stu_id=article.author
 WHERE article.artid=$postid
 ORDER BY artid DESC");
while ($r=$getposts->fetch_assoc()) {

echo 
"<form class='well span8' action='?action=editpost' method='POST'>
<legend>Edit Post - " .$r[title]. "</legend>

<div class='row'>

<div class='span3'>
<input type='hidden' value='update' name='update'>
<input type='hidden' name='editpostid' value='" .$r[artid]. "'>
<label>Title: </label><input type='text' length='255' name='postname' value='" .$r[title]. "'>
<label>Category: </label><select name='arcat'>
<option value='" .$r[categoryID]. "' selected='selected'>" .$r[categoryID]. "</option>
<option value='announce'>Announcement</option>
<option value='event'>Event</option>
<option value='news'>News</option>
</select>
</div>
<div class='span5'>
<label>Post Content</label>
<textarea class='input-xlarge span5 editme' rows='10' name='postcontent' type='text'>" .$r[contents]. "</textarea><Br>

		<button type='submit' class='btn btn-primary pull-right'>Edit Post</button>
</div>
</form>
</div>";
}


?>