<?php include_once("config.php");

$page=$_GET['p'];
$count=10;
$end=$page*10;
$start=$end-10;
$sql="
SELECT `ID`, `title`, `discription`, `summary` FROM `task`
ORDER BY ID DESC
		LIMIT $start,$count ";
$result= mysqli_query($link, $sql);

$taskArray=array();
if(!$result)
{
	die('could not get data');

	}
	while($row= mysqli_fetch_assoc($result))
	{
		
		$task=array();
		$task['id']=$row['ID'];
		$task['title']=$row['title'];
		$task['discription']=$row['discription'];
		$task['summary']=$row['summary'];
		
		$taskArray[]=$task;
	}
	$output['task']=$taskArray;
	echo json_encode($output);

?>