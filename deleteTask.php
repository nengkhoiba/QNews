<?php
include_once("config.php");
$ID=$_GET['ID'];
$sql="DELETE FROM task where ID='$ID'";
$result= mysqli_query($link, $sql);

if(!$result)
{
	echo json_encode (array ("status" => "fail")) ;

}else{
	echo json_encode (array("status" => "success"));
}