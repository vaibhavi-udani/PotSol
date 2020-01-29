<?
function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);

}
$curpage = curPageName();
?>
<div class="menu">
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="<?php if($curpage=="pgHome.php"){echo "active";} else { }?>"><a href="pgHome.php">Home</a></li>
		<li role="presentation"  class="<?php if($curpage=="pgViewQueries.php" || $curpage=="pgViewQueryDetails.php"){echo "active";} else { }?>"><a href="pgViewQueries.php">View Queries</a></li>
		<li role="presentation"  class="<?php if($curpage=="pgViewQueries.php" || $curpage=="pgViewQueryDetails.php"){echo "active";} else { }?>"><a href="pgViewUsers.php">View Users</a></li>
		<!--<li role="presentation"><a href="pgAddSubject.php">Add Subject</a></li>
		<li role="presentation"><a href="pgUploadAttendance.php">Upload Attendance</a></li>-->
		<li role="presentation"  class="<?php if($curpage=="pgChangePassword.php"){echo "active";} else { }?>"><a href="pgChangePassword.php">ChangePassword</a></li>
		<li role="presentation"  class="<?php if($curpage=="pgLogout.php"){echo "active";} else { }?>"><a href="pgLogout.php">Logout</a></li>						
	</ul>
</div>