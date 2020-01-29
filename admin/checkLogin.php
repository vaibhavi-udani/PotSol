<?php
	session_start();
	include("db_connect.php");
	$db=new DB_connect();
	$con=$db->connect();
	
	$Username=$_REQUEST["username"];
	$Password=$_REQUEST["password"];
	//$_SESSION["adminusername"]="";
	
	$qry="Select count(*) as count from PM_Admin where Username='".$Username."' and Password='".$Password."'";
	//echo $qry;
	$run=mysqli_query($con,$qry);
	$row=mysqli_fetch_array($run);
	if($row["count"]==1){
		$_SESSION["adminusername"]=$Username;
		$_SESSION["adminpassword"]=$Password;
		echo "Success";
	}
	else{
		echo "Error";
	}
?>