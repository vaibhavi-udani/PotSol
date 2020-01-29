<?php
	session_start();
	if($_SESSION["adminusername"]==""){
		Header("Location:index.php");
	}
	include("db_connect.php");
	$db=new DB_connect();
	$con=$db->connect();
	$qry="select * from PM_User_Query where ID='".$_REQUEST['id']."'";
	$run=mysqli_query($con,$qry);
	$row=mysqli_fetch_array($run);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PotSol | View Query Details</title>

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
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
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
	
	
	<div class="container">
		<div class="row">
			<div class="slider">
				<div class="img-responsive">
					<!--<ul class="bxslider">				
						<li><img src="img/01.jpg" alt=""/></li>								
						<li><img src="img/01.jpg" alt=""/></li>	
						<li><img src="img/01.jpg" alt=""/></li>			
					</ul>-->
				</div>	
			</div>
		</div>
	</div>
		
	<div class="container" >
		<form method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-12 ">
			<div class="col-md-6">
				<img src="../app/uploads/<?php echo $row['Photo']?>" alt="img" height="400px" width="400px">
			</div>
			<div class="col-md-6">
			<div id="map" style="width:400px;height:400px;"></div>
			</div>
			</div>
			<div class="col-md-12 ">
			<label ><h2>Latitude:</h2> <?php echo $row['Latitude']; ?><br>
					<h2>Longitude: </h2><?php echo $row['Longitude']?><br>
					
					<h2>Address:</h2> <?php echo $row['Address']?><br><br><br>
					
					
			</label><br>
			<label ><h2>Time Period</h2>
			<input type="text" name="txtTimePeriod" id="txtTimePeriod"/>
			</label>
			<br>
			<label ><h2>Status</h2>
			<select id="selectStatus" >
				<option value="">Select</option>
				<option value="Pending">Pending</option>
				<option value="Done">Done</option>
				<option value="Rejected">Rejected</option>
			</select>
			</label>
			<br>
			<label>
			<h2>Choose File:</h2>
		
			<input type="file" name="file" id="file"/>
			</label><br><br>
			<input type="submit" id="btnsubmit" value="SUBMIT" onclick="uplode()"/><br><br><br><br>
			</div>
		</div>
		</form>
		
	</div>	

		<div class="inner-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-4 f-about">
						<a href="index.html"><h1><span>e</span>Nno</h1></a>
						<p>Lorem ipsum dolor sit amet consectetur adipiscing elit Cras suscipit arcu libero
						vestibulum volutpat libero sollicitudin vitae Curabitur ac aliquam  consectetur adipiscing elit Cras suscipit arcu libero
						</p>
					</div>
					<div class="col-md-4 l-posts">
						<h3 class="widgetheading">Latest Posts</h3>
						<ul>
							<li><a href="#">This is awesome post title</a></li>
							<li><a href="#">Awesome features are awesome</a></li>
							<li><a href="#">Create your own awesome website</a></li>
							<li><a href="#">Wow, this is fourth post title</a></li>
						</ul>
					</div>
					<div class="col-md-4 f-contact">
						<h3 class="widgetheading">Stay in touch</h3>
						<a href="#"><p><i class="fa fa-envelope"></i> example@gmail.com</p></a>
						<p><i class="fa fa-phone"></i>  +345 578 59 45 416</p>
						<p><i class="fa fa-home"></i> Enno inc  |  PO Box 23456 
							Little Lonsdale St, New York <br>
							Victoria 8011 USA</p>
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="last-div">
			<div class="container">
				<div class="row">
					<div class="copyright">
						© 2014 eNno Multi-purpose theme | <a target="_blank" href="http://bootstraptaste.com">Bootstraptaste</a>
					</div>	
                    <!-- 
                        All links in the footer should remain intact. 
                        Licenseing information is available at: http://bootstraptaste.com/license/
                        You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=eNno
                    -->		
				</div>
			</div>
			<div class="container">
				<?php include_once "footer.php" ?>
			</div>
			
			<a href="" class="scrollup"><i class="fa fa-chevron-up"></i></a>	
				
			
		</div>	
	</footer>
	<script>
		function initMap() {
  // The location of Uluru
  var uluru = {lat: <?php echo $row['Latitude']; ?>, lng: <?php echo $row['Longitude']; ?>};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
</script>

 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALAdGtKkVc7WSkYpYLTWhNnUxjWOgx23g&callback=initMap">
    </script>
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery-2.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
	<script src="../js/wow.min.js"></script>
	<script src="../js/jquery.easing.1.3.js"></script>
	<script src="../js/jquery.isotope.min.js"></script>
	<script src="../js/jquery.bxslider.min.js"></script>
	<!--<script type="../text/javascript" src="js/fliplightbox.min.js"></script>
	<script src="../js/functions.js"></script>	

	<script type="text/javascript">$('.portfolio').flipLightBox()</script>-->
	<script src="../js/jquery-2.1.1.min.js"></script>
		<script src="../jquery.min.js"></script>
		<script src="../jquery.form.js"></script>
	<script>
	
	$(document).ready(function(){      //ready function
      
	});	
	
		function uplode(){
				$('form').ajaxForm({
					type:"POST",
					url:"updateQueryStatus.php?id=<?php echo $row['ID'] ?>",
					data:{time_period:$("#txtTimePeriod").val(),Status:$("#selectStatus").val()},
					success:function(response){
							console.log(response);
					
						/*if($.trim(response)=="Success"){
							alert("Details Updated Successfully");
							$("#file").val("");
							}
						else if($.trim(response)=="Invalid"){
							alert("Please select jpeg, jpg, png,JPG files only");
							}	
						else{
							alert("some thing wents wrong");
						}*/
					},
					complete:function(response){
						var response = response.responseText;
						if($.trim(response)=="Success"){
							alert("Details Updated Successfully");
							$("#file").val("");
							$("#txtTimePeriod").val("");
							$("#selectStatus").val("");
							}
						else if($.trim(response)=="status"){
							alert("Please select Status");
							}
						else if($.trim(response)=="TimePeriod"){
							alert("Please Enter Time Period");
							}
						else if($.trim(response)=="Invalid"){
							alert("Please select jpeg, jpg, png,JPG files only");
							}
						else if($.trim(response)=="file"){
							alert("Please select file");
							}
						else{
							alert("some thing went wrong");
						}
					}
				});
		}
		
		
		$('#excelfile').change(function() {
			var arr = $('#excelfile').val().split(".");      // Split the string using dot as separator
			var lastVal = $.trim(arr.pop());       // Get last element
			if(lastVal!="xls" && lastVal!="XLS" && lastVal!="xlsx" && lastVal!="XLSX" ){
			alert("Invalid file selected. Please select valid File");
			$('#excelfile').val("");
			}
		});
	</script>
  </body>
</html>