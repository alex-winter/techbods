<?php
	require('../../session.php');
	require('../classes/database.class.php');
	$db = Database::get();

	if (isset($_POST['boxlets_array'])) {
	
		$boxlets_array = $_POST['boxlets_array'];
		
		$result = '';
		
		foreach ($boxlets_array as $b) {
			$boxlet = json_decode($b);
			
			$sql = "
			UPDATE users_dashboard 
			SET width='" . $boxlet->width . "', height='" . $boxlet->height . "', pos_top='" . $boxlet->top . "', pos_left='" . $boxlet->left . "' 
			WHERE user_id='" . $_SESSION['engineer_id'] . "' 
			AND boxlet_id='" . $boxlet->id . "'";
			
			$db->exec($sql); //or die(print_r($db->errorInfo(), true));
			
			//$result .= "</br></br>" . $sql;
		}
		
		//echo $result;
		
	} else {
	
		echo 'Error: Boxlet array';
	}

?>