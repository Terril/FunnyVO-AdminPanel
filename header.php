<?php 
	require_once("config.php"); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Search Tags -->
	<title><?php echo $app_name; ?> | Admin Panel</title>
	
    
    <link rel="stylesheet" type="text/css" href="css/style.css?<?php echo time();?>" />
    <link rel="stylesheet" type="text/css" href="rs-plugin/css/style.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="css/jquery.timepicker.css" />
	<link rel="shortcut icon" href="<?php echo $app_picture; ?>">	
	
    <script src="js/jquery-1.12.4.js"></script>
    <script src="js/jquery-ui.js"></script>
	<script src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/jquery.inputmask.bundle.js"></script>
	<script src="js/inputmask.numeric.extensions.js"></script>
	<script src="js/jquery.timepicker.js"></script>
	<script src="js/pagination.js"></script>
	<script src="js/custom.js?<?php echo time();?>"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-88404643-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-88404643-1');
    </script>
	<script>
	   $(window).load(function() {
	     $('#status').fadeOut();
	     $('#preloader').delay(350).fadeOut('slow');
	     $('body').delay(350).css({'overflow':'visible'});
	   })
	</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126191217-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-126191217-1');
	</script>
    
    <!-- Facebook Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '2223805407931076');
      fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=2223805407931076&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
    
</head>

<body class="resetPassword">


<div id="preloader" align="center">
  <div id="loading">
    <img src="img/loader.gif" alt="Loading.." height="140" />
  </div>
</div>


<?php
	
	if(isset($_SESSION['id']))
	{

		?>

			<header class="siteheader">
				<div class="wdth">
					<div class="logo left">
						<a href="index.php" style="text-decoration: none !important;">
						    <img src="<?php echo $app_picture; ?>" alt="d track" style="height:40px;" />
						    <h1 class='textColor'><?php echo $app_name; ?> Portal</h1>
						</a>
					</div>
					<div class="right navbar">
						<?php if( isset($_SESSION['id']) ){ ?>
						<span class="menu-icon opensidemenu" id="opensidemenu" onClick="openNav()">
						  <span class="bar1"></span>
						  <span class="bar2"></span>
						  <span class="bar3"></span>
						</span>
						<?php } else { ?>
						<ul class="nav-menu mnav">
							<li><a href="javascript:;" onClick="popup('login')"><i class="fa fa-user-circle"></i></a></li>
						</ul>
						<?php } ?>
						<ul class="nav-menu dnav">
							<?php if( isset($_SESSION['id']) ){ ?>
								<li class="lastmenu"><a><span class="myacc">Account</span> <span class="nameontop"><?php echo $_SESSION['email']; ?> <i class="fa fa-caret-down"></i></span></a>
									<ul class="submenu">

										<li class="logout"><a href="index.php?log=out">Log Out</a></li>
									</ul>
								</li>
								
							<?php } else { ?>
								
								<li>
									<a href="javascript:;" onClick="popup('login')">
										Login / Sign Up 
									</a>
									
								</li>
								

							<?php } ?>
						</ul>
					</div>
					<div class="clear"></div>
				</div>
			</header>
		<?php

	}	

?>




