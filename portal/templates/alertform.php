<form action="?action=createalert" class="form-horizontal well" method="post">
<fieldset>

<!-- Form Name -->
<legend>Create Alert</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Alert Name</label>
  <div class="controls">
    <input id="alt_name" name="alt_name" placeholder="Title" class="input-xlarge" required="" type="text">
    <p class="help-block">A short name for your alert</p>
  </div>
</div>

<!-- Textarea -->
<div class="control-group">
  <label class="control-label">Alert Message</label>
  <div class="controls">                     
    <textarea id="alt_text" name="alt_text">Message text</textarea>
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label">Submit Alert</label>
  <div class="controls">
<input type="hidden" name="sub" id="sub" value="subalert">
    <button id="submit" name="submit" class="btn btn-primary">Submit</button>
  </div>
</div>

</fieldset>
</form>