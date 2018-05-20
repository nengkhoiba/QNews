<?php include_once("config.php");
//http://localhost/QNews/getCat.php
$sql="SELECT ID, Name FROM category";
$result= mysqli_query($link, $sql);

$CatArray=array();
if(!$result)
{
	die('could not get data');

	}
	while($row= mysqli_fetch_assoc($result))
	{
		
		$cat=array();
		$cat['id']=$row['ID'];
		$cat['Name']=$row['Name'];
		
		$CatArray[]=$cat;
	}
	$output['category']=$CatArray;
	echo json_encode($output);

?>