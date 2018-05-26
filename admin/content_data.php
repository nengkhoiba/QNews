<?php
include_once ("config.php");
include ("session_check.php");
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
                <th>Preview</th>
            </tr>
        </thead>
        <tbody>
        <?php 
		 $sql="SELECT con.ID as ID, con.cat_id, con.title as title, con.body as body, con.image as image, 
				con.posted_on as posted_on, con.posted_by as posted_by, con.no_like as no_like, con.isActive as isActive, 
				cat.Name as Name
				FROM content as con 
				LEFT JOIN category as cat on cat.ID = con.cat_id
				WHERE 1 
				 ORDER BY ID DESC";
        $result= mysqli_query($link, $sql);
		if($result){
			while($row = mysqli_fetch_assoc($result)){
				?>
			<tr>
                <td><?php echo $row['ID'];?></td>
                <td><?php echo $row['Name'];?></td>
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
			    <td><i style="cursor: pointer" class="fa fa-remove" onclick="removenews('<?php echo $row['ID'];?>')"></i></td>
			    <td><a onclick="viewNews('<?php echo $row['ID'];?>')"><i class="fa fa-indent"  style="cursor: pointer;" aria-hidden="true"></i></a></td>
           </tr>
				<?php
			}
		}
        ?>
            
       </tbody>
    </table>
    
    <!-- Modal -->
	 <div class="modal fade" id="newsModal" role="dialog">
		<div class="modal-dialog modal-lg">
			 <div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">News Details</h4>
				</div>
			 <div id="newsViewContainer" class="modal-body">
									        
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
	  </div>
	 </div>
	</div>
    
</div>

<?php include ("global_footer.php");?>

<script>
function viewNews(id){

	//document.location= "newsview.php?newsid="+id;
	var url = "newsview.php?newsid="+id;
	 var xmlHttp = GetXmlHttpObject();
	  	if (xmlHttp != null) {
	  		try {
	  			xmlHttp.onreadystatechange=function() {
	  			if(xmlHttp.readyState == 4) {
	  				if(xmlHttp.responseText != null){
	  					document.getElementById('newsViewContainer').innerHTML = xmlHttp.responseText;
	  					$('#newsModal').modal("show");
	  				
	  				}else{
	  					alert("Error");
	  				}
	  			}
	  		}
	  		xmlHttp.open("GET", url, true);
	  		xmlHttp.send(null);
	  	}
	  	catch(error) {
		  	}
	  	}
}

/*function viewNews(id){
	document.getElementById('newsModal').style.display ="show";
}*/


function removenews(id){
		$('#loading').show();
		if(confirm("Confirm Delete?")){
	  	//var url = "delete.php?id="+id+"&flag="+1;
	  	document.location= "delete.php?id="+id+"&flag="+2;
		}
	} 	


</script>


