<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="https://www.w3schools.com/howto/img_avatar.png" width="50" class="img-responsive" alt="Icon">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">User</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>

		<form role="search" action="search-results.php" name="search" method="POST" enctype="multipart/form-data">

			<!--  -->

			<div class="form-group">
				<input type="text" class="form-control" id="searchdata" name="searchdata" placeholder="Search Vehicle-Reg">
			</div>

		</form>
		<ul class="nav menu">
			<li class="<?php if($page=="userdashboard") {echo "active";}?>"><a href="userdashboard.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            <li class="<?php if($page=="profile") {echo "active";}?>"><a href="profile.php"><em class="fa fa-user">&nbsp;</em> User Profile</a></li>
			<li class="<?php if($page=="parkingcost") {echo "active";}?>"><a href="parkingcost.php"><em class="fa fa-dollar">&nbsp;</em> Parking Cost</a></li>
			<li class="<?php if($page=="booking") {echo "active";}?>"><a href="booking.php"><em class="fa fa-car">&nbsp;</em> Book Parking</a></li>
			<li class="<?php if($page=="in-vehicle") {echo "active";}?>"><a href="in-vehicles.php"><em class="fa fa-toggle-on">&nbsp;</em> Your Bookings</a></li>
            
			
		</ul>
		
	</div><!--/.sidebar-->

	