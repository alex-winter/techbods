<?php

?>

<html>
<head>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
	<!--JQUERY-->
	<script type="text/javascript" src="js/libs/jquery.js"></script>
	<script type="text/javascript" src="js/libs/jquery.easing.js"></script>
	<script type="text/javascript" src="js/libs/jquery.bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery.login.js"></script>
	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="css/libs/bootstrap.css" />
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/login.css" />
</head>

<body>
	<div id="login-container">
		<form name="form1" method="post" action="check_login.php" class="form-inline" role="form">
			
			<h1>Login</h1>
			
			<br/>
			
			<div class="input-group input-group-lg">
				<span class="input-group-addon"><i class="fa fa-male"></i></span>
				<input name="username" class="form-control" type="text" id="username" placeholder="username" />
			</div>
			
			<br/>
			
			<div class="input-group input-group-lg">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<input name="password" class="form-control" type="password" id="password" placeholder="password" />
			</div>
			
			<br/>
			
			<input class="btn btn-success btn-block btn-lg" type="submit" name="Submit" value="Login" />	
			
		</form>
	</div>
	
</body>
</html>