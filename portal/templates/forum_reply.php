<form method="POST" action="?action=forum_topic&topicid=<?php echo $postid; ?>">
<fieldset>

<!-- Form Name -->
<h2><i class="icon-comment"></i>Comment</h2>
<input type="hidden" value="<?php echo $id; ?>" name="commenterid">
<input type="hidden" value="postcomment" name="postreply">
<input type="hidden" value="<?php echo $postid; ?>" name="parentid">

<!-- Textarea -->
<div class="control-group">
  <div class="controls">                     
    <textarea id="reply" name="reply" class="editme"></textarea>
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <div class="controls">
<?php if (isset($_SESSION['id'])) {

echo    "<button id='singlebutton' name='singlebutton' class='btn btn-info'>Post Response</button>";
}
else
{ echo "Please log in to comment."; }
?>
  </div>
</div>

</fieldset>
</form>
