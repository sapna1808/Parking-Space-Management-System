<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if(isset($_POST['Signin']))
  {
    $adminuser=$_POST['AdminName'];
    $password=md5($_POST['AdminPassword']);
    $query=mysqli_query($con,"SELECT ID from admin where  UserName='$adminuser' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['vpmsaid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    $msg="Login Failed !!";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-Edge">
        <meta name="viewport" content="width-device-width,initial-scale=1.0">
        <title>Admin Login</title>
        
        <link href="styles.css" media="screen, projection" rel="stylesheet" type="text/css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
    
        <div class="wrapper">
            <span class="bg-animate"></span>
                <div class="form-box login">
                    <h2 class="animation" style="--i:0; --j:21;">Admin</h2>
                    <form action="#" method="POST">
                        <div class="input-box animation" style="--i:1; --j:22;">
                            <input type="text" required name="AdminName">
                            <label>Username</label>
                            <i class='bx bxs-user' ></i>
                        </div>
                        <div class="input-box animation" style="--i:2; --j:23;">
                            <input type="password" required name="AdminPassword">
                            <label>Password</label>
                            <i class='bx bxs-lock-alt'></i>
                        </div>
                        <button type="select" name="Signin" class="btn animation" style="--i:3; --j:24;">Sign In
                        </button>
                        <div class="logreg-link animation" style="--i:4; --j:25;">
                            <a href="#">Forgot Password?</a>
                    </form>
                </div>
    
        </div>

       
        <script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

    </body>
</html>