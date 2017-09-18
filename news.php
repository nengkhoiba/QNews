<?php
include_once("config.php");
$id=$_GET['id'];
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
LEFT JOIN user usr ON usr.ID=con.posted_by
WHERE 
con.ID=$id";

$result= mysqli_query($link, $sql);

while($rows= mysqli_fetch_assoc($result))
{
	?>
	
	
	<html>
		<head>
		    <title><?php echo $rows['title'];?></title>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="Q News" content="width=device-width, initial-scale=1">
		
			<link href="css/news.css" rel="stylesheet">
		</head>
		<body>
			<div class="upper">
			<?php if($rows['image']!="" && $rows['image']!=null && $rows['image']!="NO"){
					?>
					<img src="images/<?php echo $rows['image'];?>">
					<?php 
				}?>
				
				<div class="contain">
					<h2><?php echo $rows['category'];?></h2>
				</div>
			</div>
			<div class="lower">
				<h1><?php echo $rows['title'];?></h1>
				<p><?php echo $rows['body'];?></p>
				
				<p><?php echo $rows['posted_by'];?></p>
				<small><?php echo $rows['Post_date'];?></small><a href="https://play.google.com/store/apps/details?id=com.mobimp.manipurpao"><img style="float:right;width:145px;" src="images/googleplay.png"></a>
				<br><br>
			</div>
		</body>
	</html>
	<?php 
}