<?php if (!isset($id)) {
echo '<script> window.location="?action=welcome"; </script> ';
}
?>

<div class="row">       
<div class="span8">
                <center><img src="img/logo.png"><h3>Student & Instructor Portal</h3>
                <p>Welcome to the new student and instructor portal for The Performers Academy.</p><p> For assistance, use the Help section above for answers to common questions, or to chat live with our staff (when available).</p>
               <p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p></center>
</div><div class="span4"><div class="well"><?php include('pages/postsinc.php'); ?></div></div>
</div>
<div class="row">
<div class="span4">
<div class="well">
                    <legend>Your Classes</legend>
                    <p><?php include('pages/yourclasses.php'); ?>
</p>
                    <p><a class="btn" href="?action=myclasses">View details &raquo;</a></p>
                </div></div>
<div class="span4">
<div class="well">
	<legend>Student Alerts</legend>
              <?php include('pages/alerts.php'); ?>      
		<p><a class="btn" href="#">View more &raquo;</a></p>
</div></div>
<div class="span4">
<div class="well">
        <legend>Our Staff</legend>
                    <p>
<img src="img/kezia.jpg">
<img src="img/joanna.jpg">
<img src="img/dwight.jpg">
<img src="img/karen.jpg">

</p>
</div>                </div></div>
