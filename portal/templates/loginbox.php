 <div class="pull-right">
                <ul class="nav pull-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome,
                     <?php if (isset($_SESSION['name'])) {
$name = $_SESSION['name'];
echo $fullname;
} else { echo "you"; } ?>
                    
                     <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="?action=edit_profile"><i class="icon-cog"></i> Preferences</a></li>
                            <li><a href="?action=contact_support"><i class="icon-envelope"></i> Contact Support</a></li>
                            <li class="divider"></li>
                            <li><a href="?action=logout"><i class="icon-off"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
              </div>