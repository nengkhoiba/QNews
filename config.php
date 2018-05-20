<?php
$base_url="http://localhost/Qnews";
try
{

	$dbhost= 'localhost';
	$dbuser= 'root';
	$dbpass= 'mysql';
	$db= 'paomi';
	
	
$link= mysqli_connect($dbhost, $dbuser, $dbpass, $db);
	if (!$link)
	{
		die('Could nt connect :'.mysqli_error().' this is error');
	}
	
}
catch(Exeception $e)

{
}

?>