
<link rel="stylesheet" type="text/css" href="/techs_remastered/css/debug.css">

<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

include("database.class.php");
$db = Database::get();


/*!
	CLASS FUNCTION DOCUMENTATION
	
	The purpose of this PHP class is for core job orientated functionality
	
	Developer: Alex Winter
	
	Function Contents:
	- insert_job
	- update_job
	- list_jobs
*/


class jobs 
{
	//Database connection
	public $db;
	
	public function __construct($db)
	{
		//assign database singleton 
		$this->db = $db;
	}
	
	function insert_job($data) 
	{			  
		foreach ($data as $col => $val) {
			$col_array[] = $col;
			$val_array[] = "'$val'";
		}
		$sql = "INSERT INTO customer(" . implode(',', $col_array) . ") VALUES (" . implode(',', $val_array) . ")";
		$this->execute($sql);
	}
	
	function update_job($data, $job_id)
	{ 
		foreach ($data as $col => $val) {
			$set_array[] = $col . "='$val'";
		}
		$sql .= "UPDATE jobs SET " . implode(',', $set_array) . " WHERE job_id=$job_id";
		$this->execute($sql);
	}
	
	function delete_job($job_ids) 
	{
		foreach ($job_ids as $job_id) {
			$delete_array[] = $job_id;
		}
		$sql .= "UPDATE jobs SET status=-1 WHERE job_id=$job_id";
		$this->execute($sql);
	}
	
	function list_jobs($filter_rows=null, $filter_columns=null, $order=null, $like=null) 
	{
		if(!empty($filter_columns)) {
			$filter_array = json_decode($filter_columns);
			$column_array = array();
			$thead = "";
			foreach ($filter_array as $column => $name) {
				$column_array[] = $column;
				$thead .= "<th>$name</th>";
			}
			$cols = implode(',', $column_array);
		} else {
			$cols = "*";
		}
		$sql = "SELECT $cols FROM jobs ";
		if(!empty($filter_rows)) {
			$columnLists = array();
			foreach ($filter_rows as $filterJson) {
				$filter = json_decode($filterJson);
				if ($filter) {
					if (!isset($columnLists[$filter->column])) {
						$columnLists[$filter->column] = array();
					}
					$columnLists[$filter->column][] = $filter->condition;
				}
			}
			$columnStrings = array();
			foreach ($columnLists as $column => $values) {
				$columnStrings[] = $column . " IN(" . implode(",", $values) . ")";
			}	
			$sql .= " WHERE " . implode(" AND ", $columnStrings);
		}
		if(!empty($like)) {
			$patterns = array();
			//keys are the column names	
			foreach ($like as $key => $val) {
				$patterns[] = "$key LIKE '$val'";
			}
			$sql .= " " . implode(' OR ', $patterns);
		}
		if(!empty($order)) {
			$sql .= " ORDER BY $order";
		}
		$query = $this->db->query($sql);
		$output = "<table><thead>$thead</thead><tbody>";
		while ($job = $query->fetch(PDO::FETCH_ASSOC)) {
			$output .= "<tr>";
			foreach ($job as $job_column) {
				$output .= "<td>$job_column</td>";
			}
			$output .= "</tr>";
		}
		$output .= "</tbody></table>";
		return $output;
	} //END list_jobs
	
	function execute($sql){
		try {
			$this->db->exec($sql);
		} 
		catch (Exception $e){
			echo 'Exception -> ' . var_dump($e->getMessage());
		}
	}
} //END CLASS jobs

	

$jobs = new jobs($db);

//$data = array("test1"=>"hello", "test2"=> "how are you", "test3"=>"do you want", "test4"=>"some bacon");
//$job_id = 5;
//echo $jobs->update_job($data, $job_id);

//$filter_columns = json_encode(array("job_number"=>"Job Number", "date_in"=>"Date In", "problem"=>"Problem Description"));
//echo $jobs->list_jobs(null, $filter_columns);

$jobs->insert_job(array("heelo"=>"poo"));

?>