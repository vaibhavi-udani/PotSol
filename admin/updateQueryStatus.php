<?php
include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
	date_default_timezone_set("Asia/Kolkata");
			if($_POST["time_period"]==""){
				echo "TimePeriod";
			}
			else if($_POST["Status"]==""){
				echo "status";
			}
			else if(!empty($_FILES['file']['name']) && $_POST["Status"]=="Done"){
				$filename="";
				$allowedExts = array("jpeg", "jpg", "png","JPG");
				$date = date_create();
				$timestamp=date_format($date, 'YmdHis');
				$temp = explode(".", $_FILES["file"]["name"]); //image
				$extension = end($temp);
				if (in_array($extension, $allowedExts)){
					$filename = $timestamp.$_FILES['file']['name'];
					move_uploaded_file($_FILES['file']['tmp_name'],"upload/".$filename);
					$query="UPDATE `PM_User_Query` SET `UpdatedPhoto`='".$filename."',`Status`='".$_POST["Status"]."',`ModifiedIP`='".$_SERVER["REMOTE_ADDR"]."',`ModifiedOn`=now(),time_period='".$_POST["time_period"]."' WHERE `ID`='".$_REQUEST['id']."'";
					//echo $query;
					if(mysqli_query($con,$query))	
					{
						echo "Success";
					}
					else
					{
						echo "Error";
					}
				}
				else{
					echo "Invalid";
				}
			}
			else if(empty($_FILES['file']['name']) && $_POST["Status"]!="Done"){
					$query="UPDATE `PM_User_Query` SET `Status`='".$_POST["Status"]."',`ModifiedIP`='".$_SERVER["REMOTE_ADDR"]."',`ModifiedOn`=now(),time_period='".$_POST["time_period"]."' WHERE `ID`='".$_REQUEST['id']."'";
					//echo $query;
					if(mysqli_query($con,$query)){
						echo "Success";
					}
					else{
						echo "Error";
					}
			}
			else{
				echo "file";
			}
?>