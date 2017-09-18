<?php include_once("config.php");

$sql="SELECT 
con.title,
cat.Name AS category,
con.body,
con.image,
con.posted_on AS Post_date,
usr.Name AS posted_by,
con.no_like
FROM content con
LEFT JOIN category cat ON cat.ID=con.cat_id
LEFT JOIN user usr ON usr.ID=con.posted_by";
$result= mysqli_query($link, $sql);

$NewsArray=array();
if(!$result)
{
	die('could not get data');

	}
	while($row= mysqli_fetch_assoc($result))
	{
		$news=array();
		$news['title']=$row['title'];
		$news['category']=$row['category'];
		$news['body']=$row['body'];
		$news['image']=$row['image'];
		$news['Post_date']=$row['Post_date'];
		$news['posted_by']=$row['posted_by'];
		$news['no_like']=$row['no_like'];
		
		$NewsArray[]=$news;
	}
	$output['news']=$NewsArray;
	echo json_encode($output);

?>