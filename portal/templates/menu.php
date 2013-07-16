
                        <ul class="nav">
<li><img src="<?php echo $sitelogo; ?>" height="70" width="70"></li>
                            <li><a href="?action=main"><i class="icon-home icon-white"></i> Home</a></li>
					<?php if (isset($id)) { 
                                    include('templates/menu_student.php'); } ?>
                            <li><a href="?action=forum"><i class="icon-comments icon-white"></i> Forum</a></li>
				<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-question icon-white"></i> Help</a></a>
                                <ul class="dropdown-menu">
					<li><a href="#">Frequently Asked Questions</a></li>
                                    <li><a href="#">Knowledgebase</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Contact Support</a></li>
                                </ul>
                            </li>
<?php
if ($admin == "1") {
include('templates/menu_admin.php'); } ?>
                        </ul>