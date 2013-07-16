<?php

/* SECURITY FUNCTIONS */
//Check if user is admin
function isadmin() {
global $admin;
if ($admin == "0") {
echo "<div class='alert alert-error'>";
echo "Sorry, you do not have access to this page.</div>";
include("templates/footer.php");
die();
}
}

//check if user is logged in
function isloggedin() {
global $id;
if (!isset($id)) {
echo "<div class='alert alert-error'>";
echo "Sorry, you must be logged in to access this page.</div>";
include("templates/footer.php");
die();
}
}


//Table of users
function usrdata() {
echo "<table class='table table-striped table-hover table-bordered'>";
echo "<th>Name</th><th>Username</th><th>Email</th><th>Details</th>";
$usrs = array();
global $hostname, $dbuser, $dbpass, $dbname, $mysqli;
$users = $mysqli->query("SELECT * FROM students ORDER BY stu_name");
while ($usrs = $users->fetch_assoc()) {
	$namexp = explode(",", $usrs['stu_name']);
	$lname = $namexp[0];
	$fname = $namexp[1];
	$namearr = array($fname,$lname);
	$fullname = implode(" ",$namearr);
echo "<tr>";
echo "<td>" .$fullname. "</td>";
echo "<td>" .$usrs['stu_usrname']. "</td>";
echo "<td><a>" .$usrs['stu_email']. "</a></td>";
echo "<td><a href='?action=student&id=" .$usrs['stu_id']. "'>Details</a></td>";

echo "</tr>";
}
echo "</table>";
}


//User details
function stdetails($studentid) {
echo "<table class='table table-striped table-bordered'>";

echo "<th>Name</th><th>Username</th><th>Email</th>";
$usrs = array();
global $hostname, $dbuser, $dbpass, $dbname, $mysqli;
$users = $mysqli->query("SELECT * FROM students WHERE stu_id = '$studentid' ORDER BY stu_name");
while ($usrs = $users->fetch_assoc()) {
	$namexp = explode(",", $usrs['stu_name']);
	$lname = $namexp[0];
	$fname = $namexp[1];
	$namearr = array($fname,$lname);
	$fullname = implode(" ",$namearr);
echo "<tr>";
echo "<td>" .$fullname. "</td>";
echo "<td>" .$usrs['stu_usrname']. "</td>";
echo "<td><a>" .$usrs['stu_email']. "</a></td>";
echo "</tr>";
}
echo "</table>";
}


//Index list of forum topics
function getforumtopics() {
echo "<table class='table table-striped table-hover table-bordered'>";
echo "<th>Topic</th><th>Author</th><th>Date Posted</th>";
global $hostname, $dbuser, $dbpass, $dbname, $mysqli;
$posts=$mysqli->query("SELECT
 `students`.`stu_id`,
 `students`.`stu_name`,
 `forumtopics`.`topicid`,
 `forumtopics`.`opid`,
 `forumtopics`.`title`,
 DATE(`forumtopics`.`posted`) AS post_date,
 TIME(`forumtopics`.`posted`) AS post_time
 FROM `students`
 RIGHT JOIN `forumtopics` ON `forumtopics`.`opid`=`students`.`stu_id`");
while ($topics=$posts->fetch_assoc()) {
	$sqlname = $topics[stu_name];
	$authxp = explode(",", $sqlname);
	$autharr = array($authxp[1],$authxp[0]);
	$authname = implode(" ",$autharr);
	$sqldate = $topics['post_date'];
	$postdate = date("F d, Y", strtotime($sqldate));
	$sqltime = $topics['post_time'];
	$posttime = date("g:i A", strtotime($sqltime));
echo "<tr><td><a href='?action=forum_topic&topicid=" .$topics[topicid]. "'>" .$topics['title']. "</td>";
echo "<td>" .$authname. "</td>";
echo "<td>" .$postdate. " " .$posttime. "</td></tr>";

}
echo "</table>";
}


//Read a forum post
function readforumpost($postid) {
global $hostname, $dbuser, $dbpass, $dbname, $mysqli, $id;
$readerid = $id;
$post=$mysqli->query("SELECT
 `students`.`stu_id`,
 `students`.`stu_name`,
 `forumtopics`.`topicid`,
 `forumtopics`.`opid`,
 `forumtopics`.`title`,
 DATE(`forumtopics`.`posted`) AS post_date,
 TIME(`forumtopics`.`posted`) AS post_time,
 `forumtopics`.`postcontent`
 FROM `students`,`forumtopics`
 WHERE `forumtopics`.`topicid`='$postid' AND `forumtopics`.`opid`=`students`.`stu_id`");
while ($topic=$post->fetch_assoc()) {
	$sqlname = $topic['stu_name'];
	$authxp = explode(",", $sqlname);
	$autharr = array($authxp[1],$authxp[0]);
	$authname = implode(" ",$autharr);
	$sqldate = $topic['post_date'];
	$postdate = date("F d, Y", strtotime($sqldate));
	$sqltime = $topic['post_time'];
	$posttime = date("g:i A", strtotime($sqltime));
echo "<legend>" .$topic[title]. "</legend>";
echo "<p><i>Posted by " .$authname;
echo " on " .$postdate. " at " .$posttime. "</i></p>";
echo "<div>" .$topic['postcontent']. "</div>";
if ($topic['stu_id'] == $readerid) {
echo "<br><br><a class='btn btn-primary'>Edit Post</a> <a class='btn btn-danger'>Delete Post</a> ";
} else { echo "<br><br>"; }
}
}

function forumreplies() {
global $hostname, $dbuser, $dbpass, $dbname, $mysqli, $postid;

$replies=$mysqli->query("SELECT
 `students`.`stu_id`,
 `students`.`stu_name`,
 DATE(`forumreplies`.`comdate`) AS com_date,
 TIME(`forumreplies`.`comdate`) AS com_time,
 `forumreplies`.*
 FROM forumreplies, students
 WHERE forumreplies.parent='$postid' AND `students`.`stu_id`=forumreplies.commenter");
while ($comments = $replies->fetch_assoc()) {
	$sqlname = $comments['stu_name'];
	$authxp = explode(",", $sqlname);
	$autharr = array($authxp[1],$authxp[0]);
	$authname = implode(" ",$autharr);
	$sqldate = $comments['com_date'];
	$comdate = date("F d, Y", strtotime($sqldate));
	$sqltime = $comments['com_time'];
	$comtime = date("g:i A", strtotime($sqltime));
echo "<div class='well'>";
echo "<p>" .$authname. " <small>" .$comdate. " " .$comtime. "</small></p><p>";
echo $comments['replycontent'];
echo "</p></div>";
}
}
//Selectbox of programs
function getprograms() {
global $hostname, $dbuser, $dbpass, $dbname, $mysqli;
echo "<select id='classprgm' name='classprgm' class='input-medium' required>";
echo "<option value='' selected='selected'>Select a program</option>";
$pgmnm=$mysqli->query("SELECT * FROM programs");
while ($pname=$pgmnm->fetch_array()) {
echo "<option value='" .$pname['pgm-name']. "'>" .$pname['pgm-name']. "</option>";
 } echo "</select>";
}


//Selectbox of agegroups
function getagegroups() {
global $hostname, $dbuser, $dbpass, $dbname, $mysqli; 
echo "<select id='clage' name='clage' class='input-xlarge' required>";
echo "<option value='' selected='selected'>Please select an age group</option>";
$ages=$mysqli->query("SELECT * FROM agegroups");
while ($agegrps=$ages->fetch_array()) {
echo "<option value='" .$agegrps['agegrp']. "'>" .$agegrps['agegrp']. "</option>";
 } echo "</select>";
}

//Selectbox of instructors
function getinstructors() {
global $hostname, $dbuser, $dbpass, $dbname, $mysqli, $fullname;
echo "<select id='classinst' name='classinst' class='input-medium' required>";
echo "<option value='" .$fullname. "' selected='selected'>" .$fullname. "</option>";
$instnm=$mysqli->query("SELECT * FROM instructors ORDER BY `inst-name`");
while ($i=$instnm->fetch_array()) {
echo "<option value='" .$i['inst-name']. "'>" .$i['inst-name']. "</option>";
 } echo "</select>";
}

//Sort classes by instructor
function tabinstructors() {
global $hostname, $dbuser, $dbpass, $dbname, $mysqli, $fullname;
$instnm=$mysqli->query("SELECT * FROM instructors ORDER BY `inst-name`");
while ($i=$instnm->fetch_array()) {
echo "<li><a href='?action=viewclasses&inst=" .$i['inst-name']. "'>" .$i['inst-name']. "</a></li>";
 } 
}

//Sort classes by program
function tabprograms() {
global $hostname, $dbuser, $dbpass, $dbname, $mysqli, $fullname;
$instnm=$mysqli->query("SELECT * FROM programs ORDER BY `pgm-name`");
while ($i=$instnm->fetch_array()) {
echo "<li><a href='?action=programs&p=" .$i['pgm-name']. "'>" .$i['pgm-name']. "</a></li>";
 } 
}


/* Alpha code for more dynamic pages
function getcontent($cols,$table,$pageid) {

global $hostname, $dbuser, $dbpass, $dbname, $mysqli;
$getpage=$mysqli->query("SELECT $cols FROM $table WHERE pageid='$pageid'");
while ($r=$getpage->fetch_assoc()) {
echo "<legend>" .$r['title']. "</legend>";
eval($r['content']); }
}

function editcontent($cols,$table,$pageid) {

global $hostname, $dbuser, $dbpass, $dbname, $mysqli;
$getpage=$mysqli->query("SELECT $cols FROM $table WHERE pageid='$pageid'");
while ($r=$getpage->fetch_assoc()) {
echo "<div class='editme'>" .$r['title']. "</div>";
echo "<div class='editme'>";
echo eval($r['content']);
echo "</div>"; }
}

function classinfo($class) {
global $hostname, $dbuser, $dbpass, $dbname, $mysqli;

}
*/
//function layout($pageid) {
//global $hostname, $dbuser, $dbpass, $dbname, $mysqli;
//$cont=$mysqli->query("SELECT * FROM `pages` WHERE pageid='$pageid'");
//$p=$cont->fetch_assoc();
//eval($p['leftcol']);
//$template = $p['template'];
//}


?>
