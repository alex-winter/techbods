<?php
	session_cache_expire( 20 );
  
	session_start();
  
	$inactive = 3000;
  
	if( isset($_SESSION['start']) ) {
		$session_life = time() - $_SESSION['start'];
		
		if($session_life > $inactive){
			header("Location: logout.php");
		}
	}
	
	$_SESSION['start'] = time();
	
	if( $_SESSION['username'] != true ){
		header('Location: index.php');
	} 
?>
