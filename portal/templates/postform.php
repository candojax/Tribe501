
<form enctype="multipart/form-data" class="well span8" action="?action=createpost" method="POST">

<div class="row">

<div class="span3">
<input type="hidden" value="crpost" name="create">
<label>Title: </label><input type="text" length="255" name="ptitle" required>
<label>Category: </label><select name="arcat" required>
<option value="" selected="selected"></option>
<?php 
$cats=$mysqli->query("SELECT category FROM postcats ORDER BY category");
while ($cat=$cats->fetch_assoc()) {
echo "<option value=''>" .$cat['category']. "</option>";
}
echo "</select>";
?><script type="text/javascript">
$('.fileupload').fileupload()
</script>
<label>Featured Image: </label>
<div class="fileupload fileupload-new" data-provides="fileupload">
<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" /></div>
<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
<div>
<input name="ftimg" type="file" />
<span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" /></span>
<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
</div>
</div>
</div>
<div class="span5">
<label>Post Content</label>
<textarea class="input-xlarge span5 editme" rows="10" name="arcont" type="text" required></textarea><Br>

		<button type="submit" class="btn btn-primary pull-right">Create Post</button>
</div>
</form>
</div>

