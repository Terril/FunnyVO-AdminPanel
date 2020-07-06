<ul class="login_leftsidebar"> 

	<?php 

		?>
		    <li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "users" ) {
				echo 'class="active"';
			} } ?> ><a href="dashboard.php?p=users">All Users</a></li>
			
			<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "profileVerification" ) {
				echo 'class="active"';
			} } ?> ><a href="dashboard.php?p=profileVerification">Profile Verification</a></li>
			
			<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "sounds" ) {
				echo 'class="active"';
			} } ?> ><a href="dashboard.php?p=sounds&page=sound">All Sounds</a></li>
			
			<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "all_videos" ) {
				echo 'class="active"';
			} } ?> ><a href="dashboard.php?p=all_videos">All Videos</a></li>
			
			<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "discovery" ) {
				echo 'class="active"';
			} } ?> ><a href="dashboard.php?p=discovery">Discovery Section</a></li>
			
			<li <?php if(isset($_GET['p'])) { if( $_GET['p'] == "change_password" ) {
				echo 'class="active"';
			} } ?> ><a href="dashboard.php?p=change_password">Chanage Password</a></li>

			<li <?php if(isset($_GET['log'])) { if( $_GET['log'] == "out" ) {
				echo 'class="active"';
			} } ?> ><a href="dashboard.php?log=out">Logout</a></li>

			

	
		<?php

		?>

</ul>