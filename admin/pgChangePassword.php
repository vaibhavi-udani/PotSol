<?php
	session_start();
	if($_SESSION["adminusername"]==""){
		Header("Location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PotSol | Change Password</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/jquery.bxslider.css">
	<link rel="stylesheet" type="text/css" href="../css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="../css/demo.css" />
	<link rel="stylesheet" type="text/css" href="../css/set1.css" />
	<link href="../css/overwrite.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color:#3F51B5">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>PotSol</span></a>
			</div>
			<div class="navbar-collapse collapse">							
				<?php include_once "header.php" ?>
			</div>			
		</div>
	</nav>
	
	
	<!--<div class="container">
		<div class="row">
			<div class="slider">
				<div class="img-responsive">
					<ul class="bxslider">				
						<li><img src="img/01.jpg" alt=""/></li>								
						<li><img src="img/01.jpg" alt=""/></li>	
						<li><img src="img/01.jpg" alt=""/></li>			
					</ul>
				</div>	
			</div>
		</div>
	</div>-->
		
	<div class="container" style="margin-top: 7%;">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="text-center">
					<h2>Change Password</h2><br><br>
					<input type="password" placeholder="Old Password" id="txtOldPassword" style="width:50%"><br><br>
					<input type="password" placeholder="New Password Password" id="txtNewPassword" style="width:50%"><br><br>
					<input type="password" placeholder="Retype Password Password" id="txtConfirmPassword" style="width:50%"><br><br>
				
					<input type="submit" id="btnsubmit" value="SUBMIT" onclick="changePassword()">
				</div>
				<hr>
				
			</div>
		</div>
	</div>
	
	</div>
			</div>
			<div class="container">
				<?php include_once "footer.php" ?>
			</div>
			
			<a href="" class="scrollup"><i class="fa fa-chevron-up"></i></a>	
				
			
		</div>	
	</footer>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery-2.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
	<script src="../js/wow.min.js"></script>
	<script src="../js/jquery.easing.1.3.js"></script>
	<script src="../js/jquery.isotope.min.js"></script>
	<script src="../js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="js/fliplightbox.min.js"></script>
	<script src="../js/functions.js"></script>	
	<script src="../js/jquery.min.js"></script>
	<script type="text/javascript">$('.portfolio').flipLightBox()</script>
	<script>
	function changePassword()
	{
		if($("#txtOldPassword").val()=="")
		{
			alert("Enter Old Password");
		}
		else if($("#txtNewPassword").val()=="")
		{
			alert("Enter New Password");
		}
		else if($("#txtConfirmPassword").val()=="")
		{
			alert("Enter Confirm Password");
		}
		else if ($("#txtOldPassword").val()==$("#txtNewPassword").val())
		{
			alert("New and Old Password Cannot be same");
		}
		else if ($("#txtNewPassword").val()!=$("#txtConfirmPassword").val())
		{
			alert("New and Confirm Password Doesn't match");
		}
		else{
			$.ajax({
				type:"POST",
				url:"changePassword.php",
				data:{
					oldPassword:$("#txtOldPassword").val(), newPassword:$("#txtNewPassword").val()
				},
				success:function(response)
				{
					console.log(response);
					if(response=="Success")
					{
						alert("Password Changed Successfully");
						//window.location.replace("pgLogout.php");
						$(location).attr('href', 'pgLogout.php')
					}
					else if(response=="Invalid"){
						alert("Old password is invalid");
					}
					else{
						alert("Password not changed");
						//$("#txtUserName").val("");
						$("#txtOldPassword").val("");
						$("#txtNewPassword").val("");
						$("#txtConfirmPassword").val("");
					}
				}
				
			});
			
		}
	}
	</script>
  </body>
</html>