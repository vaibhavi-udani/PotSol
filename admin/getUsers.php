<?php
	include("db_connect.php");
	$db=new DB_connect();
	$con=$db->connect();
	$i=1;
	$qry="select * from PM_User_Register order by id DESC";
	$run=mysqli_query($con,$qry);
	$table="";
	$table.="<thead><tr><td>Sr.No</td><td>Name</td><td>Mobile No</td><td>Email ID</td><td>Status</td></tr></thead><tbody>";
	while($row=mysqli_fetch_array($run)){
	//$row['ModifiedOn'];
	//$date=explode(" ",$row['ModifiedOn'];)
		$table.="<tr>";
		$table.="<td>".$i."</td>";
		
		$table.="<td >".$row["Name"]."</td>";
		$table.="<td >".$row["MobileNo"]."</td>";
		$table.="<td >".$row['EmailID']."</td>";
		$table.="<td><a href='javascript:void(0)' onclick='changeStatus(".$row["ID"].")'>".$row['Status']."</a></td>";
		//$table.="<td><a href='javascript:void(0)' onclick='deleteR(".$row["ID"].")'>Delete</a></td>";
		$table.="</tr>";
		$i++;
	}
	$table.="</tbody>";
	echo $table;
	
?>