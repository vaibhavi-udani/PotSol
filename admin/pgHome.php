<?php
	session_start();
	if($_SESSION["adminusername"]==""){
		Header("Location:index.php");
	}
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
	$qrytotalcount="select count(id) as cnt from pm_user_query";
	$runtotalcount=mysqli_query($con,$qrytotalcount);
	$rowtotalcount=mysqli_fetch_array($runtotalcount);
	$qrycountcomplete="select count(id) as cnt from pm_user_query where Status='Done'";
	$runcountcomplete=mysqli_query($con,$qrycountcomplete);
	$rowcountcomplete=mysqli_fetch_array($runcountcomplete);
	$qrycountpending="select count(id) as cnt from pm_user_query where Status='Pending'";
	$runcountpending=mysqli_query($con,$qrycountpending);
	$rowcountpending=mysqli_fetch_array($runcountpending);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PotSol | Home</title>

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
	<style>
		th {
			text-align: center;
		}
	</style>
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
			<div class="navbar-collapse collapse" >							
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
			<div class="col-md-12">
				<div class="text-center">
					<table border=1 width="100%" style="text-align:center;">
						<tr><th> Total Count </th><th> Total Completed </th><th> Total In Progress </th></tr>
						<tr><td> <?php echo $rowtotalcount["cnt"];?> </td><td> <?php echo $rowcountcomplete["cnt"];?> </td><td> <?php echo $rowcountpending["cnt"];?> </td></tr>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="text-center">
					<img style=" display: inline-block;
					vertical-align: middle;" src="IMG-20190122-WA0018.jpg"  class="img-responsive" alt=""/>
				</div>
				<div class="text-center">
					<b>Aim</b><br/>
					<p>The aim is to easily manage the entire process of pot hole management. Hereby managing and dealing with pot holes. To minimize the risk of human life.</p>
					<b>Objective</b><br/>
					<p>To reduce risk of human life<br/>
					Good result in effective manner</p>
					<p>Pothole creates a major issue in India. Every year in India nearly 3,597 deaths occur due to pothole. The major reason is the people facing the problem of pothole are unable to register this problem in a proper way. And sometimes registered problems are not heard.</p>
					<p>So our application "PotSol" has brought the solution to this problem.</p>
					<p>"PotSol" application enables you to upload the images of pothole you have stumbled on.</p>
					<p>The image will be reviewed by the concerned authority and status of the registered pothole will be updated. You can check whether your register problem is solved and thus by coming together we can solve this problem.</p><br>
					<span><b><a href="tel:18001807777">Contact No:1800 180 7777</a></b><br />
					<b><a href="mailto:dummy@potsol.com">Email ID-dummy@potsol.com</a></b></span><br>
					<br><br><br>
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
			
			<a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a>	
				
			
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
				function checkLogin(){ 
				if($("#txtusername").val()==""){
					alert("Please Enter Name");
				}
				else if($("#txtpassword").val()==""){
					alert("Please Enter Password");
				}
				else{
					$.ajax({
						type:"POST",
						url:"checkLogin.php",
						data:{username:$("#txtusername").val(),password:$("#txtpassword").val()},
						success:function(response){
							//console.log(response);
							if($.trim(response)=="Success"){
							alert('Login Successful');	
							$("#txtusername").val("");
							$("#txtpassword").val("");
							$(location).attr('href','pgHome.php');
							}
							else{
								alert("Invalid Username / Password");
								$("#txtusername").val("");
								$("#txtpassword").val("");
							}
						}
					});
				}
			}
	</script>
  </body>
</html>