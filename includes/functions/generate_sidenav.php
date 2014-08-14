<?php
	require('../../session.php');
	require('../classes/database.class.php');

if(isset($_SESSION['userlevel'])){
	$user_level = $_SESSION['userlevel'];
?>
	
	<li class="parent"><a class="nav-link current" data-href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li class="parent"><a class="nav-link" data-href="job_list.php"><i class="fa fa-search"></i> Job List</a></li>
	<li class="parent"><a class="nav-link" data-href="new_job.php"><i class="fa fa-plus"></i> New Job</a></li>
	<li class="parent"><a class="nav-link" data-href="call_logger.php"><i class="fa fa-phone"></i> Call Logger</a></li>
	<li class="parent"><a class="nav-link" data-href="charts.php"><i class="fa fa-bar-chart-o"></i> Charts &beta;eta</a></li>

<?php
	if($user_level > 5){
?>
		<li class="parent"><a class="nav-link" data-href="technicians.php"><i class="fa fa-male"></i> Technicians</a></li>
<?php		
	}
}
?>