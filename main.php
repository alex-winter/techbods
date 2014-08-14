<?php 
	require('session.php');
	require('includes/classes/database.class.php');
?>

<html>
	<head>
		<title>Techs</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- BEGIN GLOBAL MANDATORY STYLES -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
		<link href="css/libs/bootstrap.css" rel="stylesheet" type="text/css"/>
		<link href="css/libs/font-awesome.css" rel="stylesheet">
		<!--END GLOBAL MANDATORY STYLES-->
		<!-- BEGIN THEME STYLES -->
		<link href="css/techbods.css" rel="stylesheet" type="text/css"/>
		<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
		<link href="css/main.css" rel="stylesheet" type="text/css"/>
		<!-- END THEME STYLES -->
	</head>
	<body>
	
		<div id="header-container">
			<a href="main.php" class="logo-container">
				<img class="logo" src="images/system/logo.png" />
			</a>
			<ul class="nav user-nav">
			  <li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				  <img class="profile-image" src="images/users/<?php echo 'alex.jpg' ?>" />
				</a>
				<ul class="dropdown-menu">
				  <li><a href="#" class="full_screen">Full Screen</a></li>
				  <li class="divider"></li>
				  <li><a href="includes/lock.php">Lock</a></li>
				  <li><a href="logout.php">Logout</a></li>
				</ul>
			  </li>
			</ul>
		</div>
		
		<div id="main-container">
			<div id="side-nav-container">
				<ul class="nav" data-js-generate="side_nav">
					{generate nav here}
				</ul>
			</div>
			<div id="page_container">
				<nav id="page_header" class="navbar navbar-default" role="navigation" data-js-generate="page_heading">

				</nav>
				<div id="page_content" class="scroll" data-js-generate="page_content">
					{Content here}
				</div>
			</div>
		</div>
		
		<!-- BEGIN SCRIPTS -->
		<script src="js/libs/jquery.js" type="text/javascript"></script>
		<script src="js/libs/jquery-ui.js" type="text/javascript"></script>
		<script src="js/libs/jquery.easing.js" type="text/javascript"></script>
		<script src="js/libs/jquery.bootstrap.js" type="text/javascript"></script>
		
		<script src="js/jquery.functions.js" type="text/javascript"></script>
		<script src="js/jquery.interaction.js" type="text/javascript"></script>
		<script src="js/jquery.responsive.js" type="text/javascript"></script>
		<!-- END SCRIPTS -->
		
	</body>
</html>