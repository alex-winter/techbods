<?php
	/*	
		$sql='SELECT * from jobs where status < 89 ORDER BY job_number, date_in';
        $result = mysql_query($sql);
        while ($row = mysql_fetch_array($result))
        {
		  $sql1 = 'SELECT * from customer WHERE customer_id = "' . $row['customer_id'] . '"';
		  $res = mysql_query($sql1);
		  $customer = mysql_fetch_array($res);
                  $sqlact = 'SELECT * from actions where job_number = "' . $row['job_number'] . '"';
                  $engineer_id = '9999';
		  $res = mysql_query($sqlact);
                  while  ($act = mysql_fetch_array($res)) {
                    $engineer_id=$act['engineer_id'];
					
                   // echo '<pre>';
                   // print_r($act);
                   // echo '</pre>';
                  }
                    
		  if ($engineer_id <> '9999') {
    		    $sqleng = 'SELECT * from engineers WHERE engineer_id = "' . $engineer_id . '"';
                    $reseng = mysql_query($sqleng);
                    while ($engineer = mysql_fetch_array($reseng)) {
                      $engineer_name = $engineer['name'];
                    }
 		  } else {
                    $engineer_name = 'not assigned';
		  }
                  unset($engineer);
                  //unset($engineer_id);
                  $priority = $row['priority'];        
				  
		  if ($engineer_id == $_SESSION['engineer_id']) {	
	*/
	
	
	$sql = "SELECT * 
			FROM jobs 
			WHERE status < 89 
			ORDER BY job_number, date_in";
	$query = $db->query($sql);   
	
	$output = '
	<div class="table-responsive">
		<table class="table">
			<thead>
				<th>Date</th>
				<th>Customer</th>
				<th>Job Number</th>
				<th>Device</th>
				<th>Description</th>
			<thead>
			<tbody>
	';
	
	foreach($query as $job){
		
		$sqlact = 'SELECT * 
				   FROM actions 
				   WHERE job_number = "' . $job['job_number'] . '"';
				   
		$engineer_id = '9999';
		
		$res = $db->query($sqlact);
		  
		foreach ($res as $act) {
			$engineer_id = $act['engineer_id'];
			//echo $job['job_number'] . '/' . $engineer_id . '<br/>';
		}
		
		$sql2 = "SELECT * 
				 FROM customer 
				 WHERE customer_id=" . $job['customer_id'];
		$query2 = $db->query($sql2);
		$customer = $query2->fetch(PDO::FETCH_ASSOC);
		
		$sql4 = "SELECT * 
				 FROM engineers 
				 WHERE engineer_id='" . $act['engineer_id'] . "'";
		$query4 = $db->query($sql4);
		$engineer = $query4->fetch(PDO::FETCH_ASSOC);
		
		
		if ($engineer['engineer_id'] == $_SESSION['engineer_id']) {
			$output .= "
			<tr class=''>
				<td>" . $job['date_in'] . "</td>
				<td>" . $customer['customer_forename'] . " " . $customer['customer_surname'] . "</td>
				<td>" . $job['job_number'] . "</td>
				<td>" . $job['make'] . " " . $job['model'] . "</td>
				<td>" . $job['problem'] . "</td>
			</tr>
			";
		}
		
	}
	
	$output .= '
			</tbody>
		</table>
	</div>
	';
	
	echo $output;
	
?>