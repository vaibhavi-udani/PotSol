<?php
	session_start();
	$_SESSION["adminusername"]="";
	$_SESSION["adminpassword"]="";
	session_destroy();
	header("location:index.php");
?>