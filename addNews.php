<?php include_once("config.php");
//http://localhost/QNews/addNews.php?cat_id=8&title=News%20title&body=News%20body&image=image.jpg&posted_by=1
$cat_id=mysql_real_escape_string(trim($_GET['cat_id']));
$title=mysql_real_escape_string(trim($_GET['title']));
$body=mysql_real_escape_string(trim($_GET['body']));
$image=mysql_real_escape_string(trim($_GET['image']));
$posted_by=mysql_real_escape_string(trim($_GET['posted_by']));

$sql="INSERT INTO `content`( `cat_id`, `title`, `body`, `image`, `posted_on`, `posted_by`, `no_like`) 
		VALUES ('$cat_id','$title','$body','$image',NOW(),'$posted_by',0)";
$result= mysqli_query($link, $sql);

if(!$result)
{
	echo json_encode (array ("status" => "fail")) ;

}else{
	echo json_encode (array("status" => "success"));
}
?>