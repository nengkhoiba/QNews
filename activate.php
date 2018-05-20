<?php include_once("config.php");
//http://localhost/QNews/activate.php?id=1&q=E&s=0
$id=$_GET['id'];
$q=$_GET['q'];
$status=$_GET['s'];


if($q=="E"){
$sql="UPDATE `content` SET `isActive`='$status' WHERE ID='$id'";
}else{
	$sql="DELETE FROM `content` WHERE ID='$id'";
	
}
$result= mysqli_query($link, $sql);

if(!$result)
{
	echo json_encode (array ("status" => "fail")) ;

}else{
	echo json_encode (array("status" => "success"));
}
?>