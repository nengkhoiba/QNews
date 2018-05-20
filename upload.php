<?php
include_once("config.php");
$base=$_REQUEST['image'];
// Get file name posted from Android App
$base_url="http://www.qnews.co.in/";

$filename = $_REQUEST['filename'];
// Decode Image
// $binary=base64_decode($base);
if($base!=null)
{
	$binary=base64_decode($base);
	header('Content-Type: bitmap; charset=utf-8');
	// Images will be saved under 'www/imgupload/uplodedimages' folder
	$file = fopen('images/news/'.$filename, 'wb');
	// Create File
	fwrite($file, $binary);
	fclose($file);
	$url=$base_url."images/news/".$filename;
	$sql1="INSERT INTO `image_url`(`url`) VALUES ('$url')";
	$query1= mysqli_query($link, $sql1);
}

if($query1)
{

	$sql = "SELECT id,url
					FROM  image_url
					ORDER BY  image_url.id DESC
					LIMIT 1";
	 
	$query = mysqli_query($link, $sql);
	while($result=mysqli_fetch_assoc($query)){
		$id=$result['id'];

	}
	echo json_encode(array("status" => "uploaded","id"=>$id,"url"=>$url));
}
else{
	echo json_encode(array("status" => "uploade_fail"));
}
?>