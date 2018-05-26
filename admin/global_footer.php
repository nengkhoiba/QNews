
</body>
<script type="text/javascript">
$(document).ready(function(){
	 $('#example').DataTable();
	$('[data-toggle="offcanvas"]').click(function(){
		$("#navigation").toggleClass("hidden-xs");
	});
});

function logout(){
	
	//header("location:../login.php");
	document.location= "../login.php";
}
	</script>
	
	<script src="https://code.jquery.com/jquery-1.12.4.js" rel="stylesheet" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
	</html>