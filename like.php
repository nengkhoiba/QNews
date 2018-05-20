<?php
//http://localhost/QNews/like.php?id=1&user=1
include_once("config.php");
$feed_id=$_GET['id'];
$user=$_GET['user'];

$sql="SELECT is_like FROM `like_table` WHERE new_id='$feed_id' AND user_id='$user'";
$result= mysqli_query($link, $sql);
if(!$result)
{
	die('could not get data');

}
$like=0;
$flag=0;
while($row= mysqli_fetch_assoc($result))
{$flag=1;
	if($row['is_like']=="0"){
		$like=0;
	}else{
		$like=1;
	}
}

if($flag==0){
	$sql1="INSERT INTO `like_table`(`user_id`, `new_id`, `is_like`) VALUES ('$user','$feed_id',1)";
	
}else{
	if($like==0){
		$sql1="UPDATE `like_table` SET `is_like`=1 WHERE user_id='$user' AND new_id='$feed_id' ";
	}else{
		$sql1="UPDATE `like_table` SET `is_like`=0 WHERE user_id='$user' AND new_id='$feed_id' ";
	}
}

$result1= mysqli_query($link, $sql1);

if(!$result1)
{
	echo json_encode (array ("status" => "fail")) ;

}else{
	echo json_encode (array("status" => "success"));
}

?>