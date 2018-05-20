<?php include_once("config.php");
	
	$email= $_POST['email'];
	$password = $_POST['password'];
	
	$sql="SELECT count(*) COUNT FROM `login` WHERE  Email = '$email' AND password='$password'";
	$result= mysqli_query($link, $sql);
	$flag= 0;
	if($result){
		while($row= mysqli_fetch_assoc($result))
		{
			$flag = $row['COUNT'];
		}
	}
	session_start();
	
	if($flag>0){
		$_SESSION["Login"] = true;
		header("location:admin.php");
	}
	else{
		$_SESSION["Login"] = false;
		$_SESSION["Msg"] = "Incorrect Email or Password";
		header("location:../login.php");
	}
		
	


?>
