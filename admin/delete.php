<?php
include_once ("config.php");

//USER DELETE
$flag = $_GET['flag'];
if($flag == 1){
	$id = $_GET['id'];
	$sql = "DELETE FROM `user` WHERE ID='$id'";
	$result = mysqli_query($link,$sql);
	if($result){
		header("location:user_data.php");
	}
}

//NEWS DELETE
$flag = $_GET['flag'];
if($flag == 2){
	$id = $_GET['id'];
	$sql = "DELETE FROM `content` WHERE ID='$id'";
	$result = mysqli_query($link,$sql);
	if($result){
		header("location:content_data.php");
	}
}

?>