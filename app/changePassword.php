<?php 
include("db_connect.php");
$db=new DB_connect();
$con=$db->connect();
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_REQUEST['username']) && isset($_REQUEST['oldPassword']) && isset($_REQUEST['newPassword'])) {
	$username=$_REQUEST['username'];
	$oldPassword=$_REQUEST['oldPassword'];	
	$newPassword=$_REQUEST['newPassword'];
	
	$count = 0;
	$qry="select count(*) from PM_User_Register where EmailID='".$username."' and Password='".$oldPassword."'";
	$result = mysqli_query($con,$qry);
	//echo $qry;
	$row = mysqli_fetch_array($result);
	$count = $row[0];
	
	if($count==1){
		$qrys="update PM_User_Register set Password='".$newPassword."' where EmailID='".$username."'";
		//echo $qrys;
		$results=mysqli_query($con,$qrys);
		if($results){
			$response['success']=1;
			$response['message']="Password Changed Successfully";
			
			echo json_encode($response);			
		}
		else{
			$response['success']=0;
			$response['message']="Oops! An error occurred.";
			
			echo json_encode($response);
		}
	}
	else{
		//wrong old password 
        	$response["success"] = 2;
        	$response["message"] = "Sorry !! Old Password Mismatch.";
 
        	// echoing JSON response
        	echo json_encode($response);
	}
}else{
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>