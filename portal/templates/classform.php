


<form class="well span8 form-horizontal" action="?action=createclass" method="post">
<fieldset>

<!-- Form Name -->


<!-- Text input-->
<div class="control-group">
  <label class="control-label">Class Name</label>
  <div class="controls">
    <input id="classname" name="classname" placeholder="Name of Class" class="input-xlarge" required="" type="text">
    
  </div>
</div>
                  <div class="control-group">
                    <label class="control-label">Dates:</label>
                    <div class="controls">
<input type="text" id="datepicker1" name="clsfrom" placeholder="Start Date" required/>
<input type="text" id="datepicker2" name="clsto" placeholder="End Date" required/>

      <script>
            $( "#datepicker1" ).datepicker({dateFormat: "yy-mm-dd"});
            $( "#datepicker2" ).datepicker({dateFormat: "yy-mm-dd"});

      </script>  

                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Times:</label>
                    <div class="controls">
<input type="text" id="time1" name="clstime1" placeholder="Start Time" required/>
<input type="text" id="time2" name="clstime2" placeholder="End Time" required/>

<script>
$('#time1').timepicker({timeFormat: "hh:mm tt"});
$('#time2').timepicker({timeFormat: "hh:mm tt"});

</script>
</div></div>

<div class="control-group">
<label class="control-label">Price</label>
<div class="controls">
$<input type="text" name="clsprice" placeholder="00.00" required>
</div>
</div>


<div class="control-group">
<label class="control-label">Age Group</label>
<div class="controls">
<?php getagegroups(); ?>
</div>
</div>
<!-- Select Basic -->
<div class="control-group">
  <label class="control-label">Program</label>
  <div class="controls">
<?php getprograms(); ?>
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="control-group">
  <label class="control-label">Level</label>
  <div class="controls">
    <label class="radio inline">
      <input name="level" value="1" checked="checked" type="radio">
      1
    </label>
    <label class="radio inline">
      <input name="level" value="2" type="radio">
      2
    </label>
    <label class="radio inline">
      <input name="level" value="3" type="radio">
      3
    </label>
    <label class="radio inline">
      <input name="level" value="4" type="radio">
      4
    </label>
    <label class="radio inline">
      <input name="level" value="dt" type="radio">
     DT
    </label>
    <label class="radio inline">
      <input name="level" value="appr" type="radio">
      Apprentice
    </label>
  </div>

</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Instructor</label>
  <div class="controls">
<?php
getinstructors(); ?>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label">Seats</label>
  <div class="controls">
    <input id="classmax" name="classmax" placeholder="0" class="input-mini" required="" type="text">
    
  </div>
</div>

<!-- Textarea -->
<div class="control-group">
  <label class="control-label">Description</label>
  <div class="controls">                     
    <textarea id="classdscptn" name="classdscptn" class="editme"></textarea>
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label"></label>
  <div class="controls">
<input type="hidden" name="makeclass" value="create">

    <button id="Create" name="Create" class="btn btn-primary" type="submit">Submit</button>
  </div>
</div>

</fieldset>
</form>
