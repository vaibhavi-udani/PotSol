<?php
	include("db_connect.php");
	$db=new DB_connect();
	$con=$db->connect();
	$i=1;
	$qry="select Status,id from PM_User_Register where id='".$_POST["id"]."'";
	$run=mysqli_query($con,$qry);	
	$row=mysqli_fetch_array($run);
	  	if($row["Status"]=='Off'){
			$qry="update PM_User_Register set Status='On' where id='".$_POST["id"]."'" ;
			//echo $qry;
			  if($run=mysqli_query($con,$qry)){
				  echo "success";
			  }
			  else{
				  echo "error";
			  }
		}
	else{
		$qry="update PM_User_Register set Status='Off' where id='".$_POST["id"]."'";
		//echo $qry;
		  if($run=mysqli_query($con,$qry)){
			  echo "success";
		  }
		  else{
			  echo "error";
		  }
	}
	
?>