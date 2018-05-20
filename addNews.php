<?php include_once("config.php");
//http://localhost/QNews/addNews.php?id=0&cat_id=8&title=News%20title&body=News%20body&image=image.jpg&posted_by=1
$id=mysqli_real_escape_string($link,trim($_GET['id']));
$cat_id=mysqli_real_escape_string($link,trim($_GET['cat_id']));
$title=mysqli_real_escape_string($link,trim($_GET['title']));
$body=mysqli_real_escape_string($link,trim($_GET['body']));
$image=mysqli_real_escape_string($link,trim($_GET['image']));
$posted_by=mysqli_real_escape_string($link,trim($_GET['posted_by']));
$push=mysqli_real_escape_string($link,trim($_GET['push']));

if($id==0){
$sql="INSERT INTO `content`( `cat_id`, `title`, `body`, `image`, `posted_on`, `posted_by`, `no_like`) 
		VALUES ('$cat_id','$title','$body','$image',NOW(),'$posted_by',0)";
}else{
$sql="UPDATE `content` SET 
		`cat_id`='$cat_id',
		`title`='$title',
		`body`='$body',
		`image`='$image',
		 isActive=0,
		 posted_on=NOW()
		
		WHERE ID='$id'";
}
$result= mysqli_query($link, $sql);

if(!$result)
{
	echo json_encode (array ("status" => "fail")) ;

}else{
	echo json_encode (array("status" => "success"));
}
?>