<?php
	require('../../session.php');
	require('../classes/database.class.php');
?>
	<div class="container-fluid">
		<!-- Page and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse page-heading-tools" id="bs-example-navbar-collapse-1">
			
			<?php
			//Rules on the tools or lose and be in da blues
			switch($_POST['page']) {
				case 'Dashboard': 
					echo '<button id="save-dashboard" type="button" class="btn btn-success">Save Dashboard</button>';
				break;
			}
			?>
			
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
