<?php
include_once("config.php");
$sql = "SELECT id,url
					FROM  image_url
					ORDER BY  image_url.id DESC
					LIMIT 1";

$query = mysqli_query($link, $sql);
	while($result=mysqli_fetch_assoc($query)){
	
	$id=$result['id'];
	$url=$result['url'];

}
if($query){
	echo json_encode(array("status" => "ok","id"=>$id,"url"=>$url));
}else{
	echo json_encode(array("status" => "no"));
}
?>