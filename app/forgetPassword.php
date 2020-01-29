<?php
	session_start();
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
	
	if(isset($_REQUEST["EmailID"])){
		$EmailID=$_REQUEST["EmailID"];
	//	echo $EmailID;
		//$EmailID='sameen@gmail.com';
		$qry="SELECT count(*) as cnt,Password,EmailID FROM PM_User_Register where (EmailID='".$EmailID."' OR MobileNo='".$EmailID."')";
		//echo $qry;
		$result=mysqli_query($con,$qry);
		$row=mysqli_fetch_array($result);
		if($row["cnt"]==1){
			$to=$row["EmailID"];
			//$to="sameenkhans809@gmail.com";

			$subject = ' Your Password';

			$headers = "From:sameenirfan809@gmail.com \r\n";
			$headers .= "Reply-To:sameenirfan809@gmail.com \r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


			//$headers .= "MIME-Version: 1.0\r\n";
			//$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$headers .= "X-Mailer: PHP/" . phpversion();
			$headers .= "X-Priority: 1" . "\r\n";

			$message = '<html><body>';

			$message .='<div style="background:#03a9f4;color:#FFFFFF;width:100%;"><center>Update Password</center><h3 style="padding-left:2px;"></h3><h1 style="padding-left:2px:">Your Password</h1><br></div><br>';
			$message .='<div style="background:#FFFFFF;color:#000000;width:100%;">'.$row["Password"].'<br><br></div></body></html>';
			if($to!=""){
				mail($to, $subject, $message, $headers);
				$response["success"] = 1;
				$response["message"] = "Your Password has been Send To your Email Id Successfully!!!";
				echo json_encode($response);
			}
			else{
				echo "Error";
			}
		}
		else{
			$response["success"] = 0;
        	$response["message"] = "No Such User Found With This Email!!";
			echo json_encode($response);
		}
	}
	else{
		// required field is missing
			$response["success"] = 0;
			$response["message"] = "Required field(s) is missing.";
 
			// echoing JSON response
			echo json_encode($response);
	}
?>