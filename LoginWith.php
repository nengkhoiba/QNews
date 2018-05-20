<?php
//http://localhost/QNews/LoginWith.php?name=Tom&fid=12121313kndsan&url=http://kajdkajkj.com
include_once("config.php");
$name=$_GET['name'];
$fid= $_GET['fid'];
$profile=$_GET['url'];
$sql = "SELECT isActive FROM `user` WHERE facebook_id='$fid'";
$info=$fid;
$role="USER";
$result= mysqli_query($link, $sql);
if(!$result)
{
	die('could not get data');

}
$stat="fail";
$flag=0;
while($row= mysqli_fetch_assoc($result))
{$flag=1;
if($row['isActive']=="0"){
	$stat="block";
}else{
	$stat="success";
}
}

if($flag==0){
	$sql1="INSERT INTO `user`(name,profile_url,facebook_id,isActive) 
			VALUES ('$name','$profile','$fid',1)";
	$result1= mysqli_query($link, $sql1);
	
	if(!$result1)
	{
		$stat="fail";
	
	}else{
		$sql2="SELECT ID,role FROM user WHERE facebook_id='$fid'";
		$result2= mysqli_query($link, $sql2);
		
		while($row2= mysqli_fetch_assoc($result2))
		{
			$info=$row2['ID'];
			$role=$row2['role'];
		}
		$stat="success";
	}
}else{
	if($stat=="success"){
		$sql1="UPDATE `user` SET name='$name',profile_url='$profile' WHERE facebook_id='$fid' AND isActive=1 ";
		$result1= mysqli_query($link, $sql1);
		
		if(!$result1)
		{
			$stat="fail";
		
		}
		$sql2="SELECT ID,role FROM user WHERE facebook_id='$fid'";
		$result2= mysqli_query($link, $sql2);
		
		while($row2= mysqli_fetch_assoc($result2))
		{
			$info=$row2['ID'];
			$role=$row2['role'];
		}
	}
}
echo json_encode (array("status" => $stat,"info"=>$info,"role"=>$role));

?>