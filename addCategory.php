<?php include_once("config.php");
//http://localhost/QNews/addCategory.php?name=
$CatName=$_GET['name'];

$sql="INSERT INTO `category`(`Name`) VALUES ('$CatName')";
$result= mysqli_query($link, $sql);

if(!$result)
{
	echo json_encode (array ("status" => "fail")) ;

}else{
	echo json_encode (array("status" => "success"));
}
?>