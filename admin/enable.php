<?php
include_once ("config.php");
$flag = $_GET['flag'];
//user active or deactivate 
if($flag==2){
	
	$id =$_GET['id'];
	
	$sql = "UPDATE `user` SET `isActive`=0 WHERE ID='$id'";
	$result = mysqli_query($link,$sql);
	if($result){
		header("location:user_data.php");
	}
}
if($flag == 1 ){
	$id = $_GET['id'];
	$sql = "UPDATE `user` SET `isActive`=1 WHERE ID='$id'";
	$result = mysqli_query($link,$sql);
	if($result){
		header("location:user_data.php");
	}
}
//content publish or unpublish

if ($flag == 3){
	$id =$_GET['id'];
	$sql ="UPDATE `content` SET `isActive`=1 WHERE ID='$id'";
	$result = mysqli_query($link, $sql);
	if($result){
		header("location:content_data.php");
	}
}
elseif ($flag == 4){
	$id =$_GET['id'];
	$sql ="UPDATE `content` SET `isActive`=0 WHERE ID='$id'";
	$result = mysqli_query($link, $sql);
	if($result){
		header("location:content_data.php");
	}
}


?>