<?php
	require('includes/classes/database.class.php');
	$db = Database::get();
	
	$username = $_POST['username']; 
	$password = $_POST['password'];
	$username = stripslashes($username);
	$password = stripslashes($password);
	$password = md5($password);
    
	$sql="SELECT * 
		  FROM engineers 
		  WHERE username='$username' 
		  AND password='$password' 
		  AND status = 1";
	
	$stmt = $db->query($sql);
	$count = $stmt->rowCount();
	
	if($count==1){
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		session_start();
		
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['engineer_id'] = $row['engineer_id'];
		$_SESSION['branch'] = $row['branch'];
		$_SESSION['userlevel'] = $row['userlevel'];
		
		$_SESSION['start'] = time();
		
		header('Location: main.php');
		
	} else {
		echo "Wrong Username or Password";
	}
?>