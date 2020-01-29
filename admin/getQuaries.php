<?php
	include("db_connect.php");
	$db=new DB_connect();
	$con=$db->connect();
	$i=1;
	$qry="select * from PM_User_Query order by id desc";
	$run=mysqli_query($con,$qry);
	$table="";
	$table.="<thead><tr><td>Sr.No</td><td>Quary</td><td>Date/Time</td><td>Status</td><td>View</td></tr></thead><tbody>";
	while($row=mysqli_fetch_array($run)){
		$table.="<tr>";
		$table.="<td>".$i."</td>";
		
		$table.="<td id='logo".$row["ID"]."'><img src='../app/uploads/".$row["Photo"]."' height='80' width='80'/></td>";
		$table.="<td id='datetime".$row["ID"]."'>".$row['ModifiedOn']."</td>";
		$table.="<td id='status".$row["ID"]."'>".$row['Status']."</td>";
		$table.="<td><a href='pgViewQueryDetails.php?id=".$row["ID"]."'>View</a></td>";
		$table.="</tr>";
		$i++;
	}
	$table.="</tbody>";
	echo $table;
	
?>