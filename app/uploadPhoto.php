<?php
	include("db_connect.php");
$db=new DB_connect();
$con=$db->connect();
// array for JSON response
$response = array();
	$filename = $_REQUEST["path"];
	$username = $_REQUEST["email"];
					if(isset($filename) && isset($username)){
					
					$query="select ID from PM_User_Register where EmailID='".$username."'";
					//echo $query;
					$resu=mysqli_query($con,$query); 
					$rowss = mysqli_fetch_array($resu);
					
						$query="INSERT INTO PM_User_Query(`UserID`, `Photo`, `UpdatedPhoto`, `Latitude`, `Longitude`, `Address`, `Status`, `ModifiedIP`, `ModifiedOn`) values ('".$rowss["ID"]."','".$filename."','','".$_REQUEST['latitude']."','".$_REQUEST['longitude']."','".$_REQUEST['address']."','Pending','".$_SERVER['REMOTE_ADDR']."',now())";
							//echo $query;
							$result=mysqli_query($con,$query);
							//echo $result;
							if($result){
								$response["success"]=1;
								$response["message"]="File Uploaded to Server Successfully";
								echo json_encode($response);
							}
						else{
								$response["success"]=0;
								$response["message"]="File Not Saved,Some Thing Went Wrong";
								echo json_encode($response);
							}
							
					}
	
?>
	
	