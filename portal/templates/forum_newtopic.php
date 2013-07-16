
<form class="form-horizontal" action="?action=forum_newtopic" method="POST">
<fieldset>

<!-- Form Name -->
<legend>New Topic</legend>
<input type="hidden" value="<?php echo $id; ?>" name="authorid">
<input type="hidden" value="newpost" name="newtopic">
<!-- Text input-->
<div class="control-group">
  <label class="control-label">Title</label>
  <div class="controls">
    <input id="topicname" name="topicname" placeholder="Topic Title" class="input-xlarge" required="" type="text">
    
  </div>
</div>

<!-- Textarea -->
<div class="control-group">
  <label class="control-label">Content</label>
  <div class="controls">                     
    <textarea class="editme" id="content" name="postcontent"></textarea>
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label">Submit Topic</label>
  <div class="controls">
    <button id="post" name="post" class="btn btn-success">Post</button>
  </div>
</div>

</fieldset>
</form>

