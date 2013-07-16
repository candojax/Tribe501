<div class="span12 row">
<legend>All Blog/News Posts</legend>
<?php 
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
 ORDER BY artid DESC");
while ($r=$getposts->fetch_assoc()) {

$sqlname = $r[stu_name];
$authxp = explode(",", $sqlname);
$autharr = array($authxp[1],$authxp[0]);
$authname = implode(" ",$autharr);
echo "<div class='span8 well'><h2>" .$r[title]. "</h2>";
echo "<p>" .$r[contents]. "</p><p>";
echo "<i><small>Posted by <a href='profile.php?id=" .$r[stu_id]. "'>" .$authname. "</a> on " .$r[dateposted]. " in " .$r[categoryID]. "</small>";
echo "</p></i></div>";
echo "<div class='span2 well'>
<p><i class='icon-eye-open'></i> <a href='?action=viewpost&post=" .$r['artid']. "' class='btn btn-primary'>View Post</a></p>
<p><i class='icon-trash'></i> <a class='btn btn-primary'>Delete Post</a></p>
<form method='POST' action='?action=editpost'>
<input type='hidden' name='editpostid' value='" .$r[artid]. "'>
<i class='icon-edit'></i> <input class='btn btn-primary' type='submit' value='Edit Post'></form></i>

</div>";
}
?>
</div>