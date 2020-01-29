<?php
	session_start();
	include("db_connect.php");
	$db=new DB_connect();
	$con=$db->connect();
	
	$username=$_SESSION["adminusername"];
	$password=$_SESSION["adminpassword"];
	
	if($password==$_POST["oldPassword"]){
		$qry="Update PM_Admin set Password='".$_POST["newPassword"]."' where username='".$username."'";
		if(mysqli_query($con,$qry)){
			echo "Success";
		}
		else{
			echo "Error";
		}
	}
	else{
		echo "Invalid";
	}
?>