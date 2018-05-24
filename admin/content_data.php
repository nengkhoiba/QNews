<?php
include_once ("config.php");
include ("global_header.php");
?>
<div class="container ">
	<table id="example" class="display" style="width:100%; margin-top:10px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Title</th>
                <th>Body</th>
                <th>Image</th>
                <th>Posted On</th>
                <th>Posted By</th>
                <th>Likes</th>
                <th>isActive</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
        <?php 
		 $sql="SELECT `ID`, `cat_id`, `title`, `body`, `image`, `posted_on`, `posted_by`, `no_like`, `isActive` FROM `content` WHERE 1 ORDER BY ID DESC";
        $result= mysqli_query($link, $sql);
		if($result){
			while($row = mysqli_fetch_assoc($result)){
				?>
			<tr>
                <td><?php echo $row['ID'];?></td>
                <td><?php echo $row['cat_id'];?></td>
                <td><?php echo $row['title'];?></td>
                <td><?php echo $row['body'];?></td>
                <td><?php echo $row['image'];?></td>
                <td><?php echo $row['posted_on'];?></td>
                <td><?php echo $row['posted_by'];?></td>
                <td><?php echo $row['no_like']?></td>
                <?php if($row['isActive']==0){?>
                <td> <a style="cursor: pointer;" href="enable.php?id=<?php echo $row['ID'];?>&flag=3" class="label label-success">Publish</a> </td>
                <?php }else{?>
				<td> <a style="cursor: pointer;" href="enable.php?id=<?php echo $row['ID'];?>&flag=4" class="label label-danger">Unpublish</a> </td>
			<?php }?>
			    <td><i style="cursor: pointer" class="fa fa-remove"></i></td>
           </tr>
				<?php
			}
		}
        ?>
            
       </tbody>
    </table>
</div>

<?php include ("global_footer.php");?>