</div><!-- Modal -->
<div class="modal hide fade" id="myModal">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">x</button>
    <h3>Login to <?php echo $sitename; ?></h3>
  </div>
  <div class="modal-body">

<div class="span2">
  <form action="?action=login" method="post">
                            <p><label>Username </label>
		<input class="span3" type="text" placeholder="Username" name="usrnm"></p><p>
			<label>Password: </label>
                            <input class="span3" type="password" placeholder="Password" name="pass">
                           </p> <button type="submit" class="btn-success pull-right">Sign in</button>

                        </form>
</div>
</div>
  <div class="modal-footer">
    New User?
    <a href="?action=register" class="btn btn-primary">Register</a>
  </div>
</div>