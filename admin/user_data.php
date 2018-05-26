<?php
include_once("config.php");
include ("session_check.php");
include ("global_header.php");

?>
<div class="container-fluid">
	<table id="example" class="display" style="width:100%; margin-top:10px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Facebook ID</th>
                <th>Profile URL</th>
                <th>isActive</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $sql="SELECT `ID`, `name`, `profile_url`, `facebook_id`, `isActive` FROM `user` WHERE 1";
		$result= mysqli_query($link, $sql);
		if($result){
			while($row = mysqli_fetch_assoc($result)){
				?>
			<tr>
                <td><?php echo $row['ID'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['profile_url'];?></td>
                <td><?php echo $row['facebook_id'];?></td>
                <?php if($row['isActive']==1){?>
                <td> <a style="cursor: pointer;" href="enable.php?id=+<?php echo $row['ID'];?>&flag=2" class="label label-success">Active</a> </td>
                <?php }else{?>
				<td> <a style="cursor: pointer;" href="enable.php?id=+<?php echo $row['ID'];?>&flag=1" class="label label-danger">Deactivate</a> </td>
			<?php }?>
			    <td><a href="#"><i style="cursor: pointer" onclick="removeuser('<?php echo $row['ID'];?>')"class="fa fa-remove"></i></a></td>
           </tr>
				<?php
			}
		}
        ?>
            
       </tbody>
    </table>
</div>

<?php include ("global_footer.php");?>
 <script>
 function removeuser(id){
		$('#loading').show();
		if(confirm("Confirm Delete?")){
	  	//var url = "delete.php?id="+id+"&flag="+1;
	  	document.location= "delete.php?id="+id+"&flag="+1;
		}
	} 	

 </script>