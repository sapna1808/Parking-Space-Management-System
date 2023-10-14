<?php
    session_start();
    error_reporting(0);
    include('includes/dbconn.php');
    if (strlen($_SESSION['vpmsaid']==0)) {
        header('location:logout.php');
        } else {
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MetroPark</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datatable.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>
        <?php include 'includes/navigation.php' ?>
	
		<?php
		$page="reports";
		include 'includes/sidebar.php'
		?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="dashboard.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">View Report</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">Vehicle Management</h1> -->
			</div>
		</div><!--/.row-->
		
		<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Parking Reports</div>

                        <form method="POST" enctype="multipart/form-data" name="datereports" action="generate-reports.php">

                            <div class="panel-body">
            
                                <?php if($msg)
                                echo "<div class='alert bg-danger' role='alert'>
                                <em class='fa fa-lg fa-warning'>&nbsp;</em> 
                                $msg
                                <a href='#' class='pull-right'>
                                <em class='fa fa-lg fa-close'>
                                </em></a></div>" ?> 

                                    <div class="form-group">
                                        
                                        <div class="col-lg-6">
                                        <label for="">From</label>
                                            <input class="form-control" type="date" name="fromdate" id="fromdate" required="true">
                                        </div>

                                    
                                        <div class="col-lg-6">
                                        <label for="">To</label>
                                            <input class="form-control" type="date" name="todate" id="todate" required="true">
                                        </div>
                                        
                                        
                                    </div>    
                                    
                                </div>
                                    <center><button type="submit" class="btn btn-primary" name="submit">Generate Report</button></center>
                        
                        </form>
					</div>
				</div>
				
				
				
			</div><!--/.row-->

			<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								Highlights - IN | OUT 
								
								<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
								<div class="panel-body">
								<div class="canvas-wrapper">
									<canvas class="chart" id="myChart" height="160" ></canvas>

								</div>

							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								Highlights - Vehicle Category
								
								<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
								<div class="panel-body">
								<div class="canvas-wrapper">
									<canvas class="chart" id="myChart2" height="160" ></canvas>

								</div>

							</div>
						</div>
					</div>
				</div> <!-- /.row -->
				
				<?php 

				include 'includes/dbconn.php';
				$ret=mysqli_query($con,"SELECT count(ID) id1 from vehicle_info where Status=''");
				$row5=mysqli_fetch_array($ret);
				
				$ret=mysqli_query($con,"SELECT count(ID) id2 from vehicle_info where Status='Out'");
				$row6=mysqli_fetch_array($ret);

				$ret=mysqli_query($con,"SELECT count(ID) as id1 from vehicle_info where VehicleCategory='Two Wheeler'");
				$row=mysqli_fetch_array($ret);  
					
				$ret=mysqli_query($con,"SELECT count(ID) as id2 from vehicle_info where VehicleCategory='Four Wheeler'");
				$row2=mysqli_fetch_array($ret); 

				$ret=mysqli_query($con,"SELECT count(ID) as id4 from vehicle_info where VehicleCategory='Three Wheeler'");
				$row4=mysqli_fetch_array($ret);
				
				?>
		
		
		

        <?php include 'includes/footer.php'?>
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
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

    <script>
        $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
		
</body>
</html>

<?php }  ?>