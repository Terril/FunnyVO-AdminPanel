<?php 
require_once("header.php"); 
require_once("config.php"); 
?>

<?php 
	
	if(!isset($_SESSION['id'])){ 
    	@header("Location: index.php");
    	echo "<script>window.location='index.php'</script>";
    	//die;
	} 

?>

<div class="section mini dashboardscreen"><div class="wdth">
	<div class="col15 left">
		<?php require_once("login_leftsidebar.php"); ?> 
	</div>
	<div class="col85 right contentside" style="padding:0px 15px;">
		<?php if( !isset($_GET['p']) ) { //dashboard
			?>
				<h2 class="title">Dashboard</h2>
				<p>Main dashboard here.. </p>
			<?php
		} //dashboard = end
		else 
		{ //inner pages

				if( $_GET['p'] == "all_videos" ) { 
					include("all_videos.php");
				} 
				
				if( $_GET['p'] == "users" ) { 
					include("users.php");
				} 
				
				if( $_GET['p'] == "addNews" ) { 
					include("addNews.php");
				} 
				
				if( $_GET['p'] == "sounds" ) { 
					include("sounds.php");
				} 
				
				if( $_GET['p'] == "allCategory" ) { 
					include("allCategory.php");
				} 
				
				if( $_GET['p'] == "discovery" ) { 
					include("discovery.php");
				} 
				
				
				if( $_GET['p'] == "change_password" ) { //change_password
					include("change_password.php");
				} //change_password = end
				
				if( $_GET['p'] == "profileVerification" ) { //change_password
					include("profileVerification.php");
				}
				

		} //inner pages = end ?>
	</div>
	<div class="clear"></div>
</div></div>

<?php require_once("footer.php"); ?>