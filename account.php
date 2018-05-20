<?php include_once("config.php");
//http://localhost/QNews/account.php?id=12121313kndsan&s=1
$id=$_GET['id'];
$status=$_GET['s'];


$sql="UPDATE `user` SET `isActive`='$status' WHERE facebook_id='$id'";

$result= mysqli_query($link, $sql);

if(!$result)
{
	echo json_encode (array ("status" => "fail")) ;

}else{
	echo json_encode (array("status" => "success"));
}
?>