<?php
include_once 'db_connect.php';
$db=new DB_Connect();
$con=$db->connect();

$sq="select ID From PM_User_Register where EmailID='".$_REQUEST['emailid']."'";
	$rl = mysqli_query($con,$sq);
	$row=mysqli_fetch_array($rl);

$sql = "SELECT * FROM PM_User_Query where Photo='".$_REQUEST['pic']."' and Status='Done' and UserID='".$row['ID']."'";
//echo $sql;
 $r = mysqli_query($con,$sql);
 $result = array();
 $res = mysqli_fetch_array($r);
 
 array_push($result,array("ID"=>$res['ID'] ,"UpdatedPhoto"=>$res['UpdatedPhoto']));
 
 echo json_encode(array("response"=>$result));
 
 mysqli_close($con);
?>