<?php

$c=$_POST["uname"];
$c=trim($c);
$i=$_POST["psw"];
$i=trim($i);

if($c=="admin" && $i=="admin")
	{
		header("Location: http://localhost/dashboard.php");
		die();
	}
?>
