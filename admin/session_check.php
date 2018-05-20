<?php
session_start();
if(!$_SESSION["Login"]){
	header("location:../login.php");
}
?>