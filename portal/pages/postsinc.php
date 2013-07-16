<legend>Latest News</legend>
<div class="news">
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
echo "<h4>" .$r[title]. "</h4>";
echo "<p>" .$r[contents]. "</p><p>";
echo "<i><small>Posted by <a href='profile.php?id=" .$r[stu_id]. "'>" .$authname. "</a> on " .$r[dateposted]. " in " .$r[categoryID]. "</small>";
echo "</p></i><hr>";

}
?>
</div>
