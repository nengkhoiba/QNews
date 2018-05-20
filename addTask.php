<?php include_once("config.php");
//http://localhost/QNews/addTask.php?ID=2&title=old%20task&desc=descikhjkjkj&summary=old%20task%20summary
$id= mysqli_real_escape_string($link,$_GET['ID']);
$title=mysqli_real_escape_string($link,$_GET['title']);
$desc=mysqli_real_escape_string($link,$_GET['desc']);
$summary=mysqli_real_escape_string($link,$_GET['summary']);

if($id=="0"){

	$sql="INSERT INTO `task`(`title`, `discription`, `summary`) VALUES ('$title','$desc','$summary')";
}else{
	$sql="UPDATE `task` SET `title`='$title',`discription`='$desc',`summary`='$summary' WHERE ID='$id'";
}


$result= mysqli_query($link, $sql);

if(!$result)
{
	echo json_encode (array ("status" => "fail")) ;

}else{
	echo json_encode (array("status" => "success"));
}
?>