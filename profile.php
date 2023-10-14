<?php
	session_start();
	error_reporting(0);
	include('includes/dbconn.php');
	if (strlen($_SESSION['vpmsaid']==1)) {
	header('location:logout.php');
	} else {

	if(isset($_POST['submit-details'])) {
		$userfullname=$_POST['userfullname'];
		$gen=$_POST['gen'];
		$emailid=$_POST['emailid'];
		$usercontno=$_POST['usercontno'];
		
			
		$query=mysqli_query($con, "INSERT INTO `userdetail`(`name`, `Email`, `gender`, `Phone no`) VALUES ('$userfullname','$emailid','$gen','$usercontno')");
		if ($query) {
			echo "<script>alert('User Details has been updated');</script>";
			echo "<script>window.location.href ='userdashboard.php'</script>";
		} else {
			echo "<script>alert('Something Went Wrong');</script>";       
		}
	}
  ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MetroPark</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>
        <?php include 'includes/navigation.php' ?>
	
		<?php
		$page="profile";
		include 'includes/sidebar1.php'
		?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="userdashboard.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">User Profile</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">Vehicle Management</h1> -->
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-default">
					<div class="panel-heading">Profile Update</div>
					<div class="panel-body">

						<div class="col-md-12">
						<?php if($msg)
						echo "<div class='alert bg-info' role='alert'>
						<em class='fa fa-lg fa-warning'>&nbsp;</em> 
						$msg</div>" ?> 

							<form method="POST">
							
								<div class="form-group">
									<label>Full Name</label>
									<input type="text" class="form-control" placeholder="Name" id="userfullname" name="userfullname" required>
								</div>

								<div class="form-group">
									<label>Gender</label>
									<input type="text" class="form-control" placeholder="Gender" id="gen" name="gen" required>
								</div>
								
								<div class="form-group">
									<label>Email</label>
									<input type="text" class="form-control" placeholder="Email Id" id="emailid" name="emailid" required>
								</div>

								<div class="form-group">
									<label>Contact Number</label>
									<input type="text" class="form-control" placeholder="Enter Here" maxlength="10" pattern="[0-9]+" id="usercontno" name="usercontno" required>
								</div>

									<button type="submit" class="btn btn-success" name="submit-details">Submit</button>
									<button type="reset" class="btn btn-default">Reset</button>
								</div> <!--  col-md-12 ends -->
								
							</form>
						</div> 
					</div>
		
		
		

        <?php include 'includes/footer.php'?>
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
		var chart1 = document.getElementById("line-chart").getContext("2d");
		window.myLine = new Chart(chart1).Line(lineChartData, {
		responsive: true,
		scaleLineColor: "rgba(0,0,0,.2)",
		scaleGridLineColor: "rgba(0,0,0,.05)",
		scaleFontColor: "#c5c7cc"
		});
};
	</script>
		
</body>
</html>

<?php }  ?>