<?php
include_once ("config.php");
$id = $_GET['newsid'];

$sql = "SELECT `ID`, `cat_id`, `title`, `body`, `image`, `posted_on`, `posted_by`, `no_like`, `isActive` FROM `content` WHERE ID='$id'";
$result = mysqli_query($link, $sql);
if($result){
	while ($row = mysqli_fetch_assoc($result)){
		?>
		
		<div>Hello Man!</div>
		
		<?php 
	}
}
?>