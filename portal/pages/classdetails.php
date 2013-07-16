
<legend>Class Details</legend>
<?php 
//Set the title of the page
$pagetitle = "View Class";
$class = $_GET['class'];
//Content
$stmt=$mysqli->query("SELECT * FROM `classes` WHERE `clss-id` = '$class'");
while ($r=$stmt->fetch_assoc()) {
echo "<div class='span8 well'>";
echo "<h2>" .$r["clss-name"];
echo "</h2><p>";
echo "Instructor: " .$r["clss-inst"]. "<br>";
echo "Program: " .$r["clss-prgm"]. "<br>";
echo "Class Level: " .$r["clss-lvl"]. "<br>";
echo "Description: " .$r["clss-dscptn"]. "<br>";
echo "Seats Available: " .$r["clss-seats"]. "<br>";
echo "</p><p><a class='btn' href='#'>View details &raquo;</a></p></div>";

}

?>
<div class="span3">
<h2>Resources</h2>
<ul class="nav nav-list">
                                    <li class="nav-header">News Posts</li>
					<li><a href="?action=createpost">Create Post</a></li>
                                    <li><a href="?action=posts">View Posts</a></li>
                                    <li><a href="?action=addpostcat">Add Category</a></li>
					<li class="divider"></li>
                                    <li class="nav-header">Classes</li>
                                    <li><a href="?action=createclass">Create Class</a></li>
                                    <li><a href="?action=viewclasses">View Classes</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">Users</li>
                                    <li><a href="?action=register">Add User</a></li>
                                    <li><a href="?action=users">View Users</a></li>
					<li class="divider"></li>
					<li> <a href="?action=quickadd">Quick Add</a></li>

                                </ul>
</div>
