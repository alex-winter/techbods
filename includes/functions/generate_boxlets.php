<?php
	
	require('../../session.php');
	require('../classes/database.class.php');
	$db = Database::get();
	
	
	$sql = "SELECT * 
		    FROM users_dashboard 
			WHERE user_id=" . $_SESSION['engineer_id'];
	$query = $db->query($sql);
	$output = '';
	
	foreach($query as $boxlet){
		
		$query2 = $db->query("SELECT * FROM boxlets WHERE boxlet_id=" . $boxlet['boxlet_id']);
		$boxlet_attr = $query2->fetch(PDO::FETCH_ASSOC);
		?>
		
		<div class="boxlet" data-boxlet-id="' . $boxlet['boxlet_id'] . '" 
		     style="width:<?php echo $boxlet['width'] ?>; height:<?php echo $boxlet['height']?>; left:<?php echo $boxlet['pos_left'] ?>; top:<?php echo $boxlet['pos_top'] ?>;">
			<div class="boxlet-heading">
				<h3><?php echo $boxlet_attr['boxlet_title'] ?><i class="fa fa-expand expand-boxlet"></i></h3>
			</div>
			
			<div class="boxlet-body scroll">
			
			<?php include('../../boxlets/' . $boxlet_attr['plugin_dir'] . '/index.php'); ?>
			
			</div>
		</div>
		
<?php
	}
?>

