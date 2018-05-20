<?php include_once("config.php");
$user=$_GET['u'];
$page=$_GET['p'];

$count=10;
$end=$page*10;
$start=$end-10;
$sql="SELECT 
con.ID,
con.title,
cat.Name AS category,
con.body,
con.image,
DATE(con.posted_on) AS posted_on,
TIME(con.posted_on) AS posted_at,
usr.Name AS posted_by,
(select COUNT(is_like) from like_table where new_id=con.ID AND is_like=1) AS no_like,
(select COUNT(is_like) from like_table where user_id=$user AND new_id=con.ID AND is_like=1) AS isLike		
FROM content con
LEFT JOIN category cat ON cat.ID=con.cat_id
LEFT JOIN user usr ON usr.ID=con.posted_by
WHERE con.isActive=0
AND con.posted_by=$user
ORDER BY con.posted_on DESC
		LIMIT $start,$count ";
$result= mysqli_query($link, $sql);

$NewsArray=array();
if(!$result)
{
	die('could not get data');

	}
	while($row= mysqli_fetch_assoc($result))
	{
		$now=strtotime(date("Y-m-d"));
		$past=strtotime($row['posted_on']);
		$diff=$now-$past;
		$day=floor($diff/(60*60*24));
		if($day==0)
		{
		
			$diff=strtotime(date("H:i:s"))-strtotime($row['posted_at']);
				
			$temp=$diff/86400; // 60 sec/min*60 min/hr*24 hr/day=86400 sec/day
				
			// days
			$days=floor($temp);$temp=24*($temp-$days);
			// hours
			$hours=floor($temp);$temp=60*($temp-$hours);
			// minutes
			$minutes=floor($temp); $temp=60*($temp-$minutes);
			// seconds
			$seconds=floor($temp);
				
			if($hours==0){
				if($minutes==0){
					$day=$seconds." sec ago";
				}else{
					$day=$minutes." mins ago";
				}
		
			}else{
				$day=$hours." hrs ago";
			}
		
		}else
		{
			if($day<=31){
				$day=$day." day(s) ago.";
			}else{
					
				$day=ceil($day/30);
				if($day<=12)
				{
					$day=$day." month(s) ago.";
				}else{
					$day=ceil($day/12);
					$day=$day." year(s) ago.";
				}
			}
		}
		$news=array();
		$news['id']=$row['ID'];
		$news['title']=$row['title'];
		$news['category']=$row['category'];
		$news['body']=$row['body'];
		$news['image']=$row['image'];
		$news['Post_date']=$day;
		$news['posted_by']=$row['posted_by'];
		$news['no_like']=$row['no_like'];
		$news['isLike']=$row['isLike'];
		
		$NewsArray[]=$news;
	}
	$output['news']=$NewsArray;
	echo json_encode($output);

?>