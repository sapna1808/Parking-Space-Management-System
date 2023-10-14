<?php
session_start();
error_reporting(0);



    if(isset($_POST["submit"])){
        echo "<script>alert('Your Message has been received successfully');</script>";
        echo "<script>window.location.href ='index.php'</script>"; 
    }
    
    



?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE-Edge,chrome=1">
        <meta name="viewport" content="width-device-width,initial-scale=1.0">
        <link rel="shortcut icon" href="../favicon.ico">
        <title>Contact Us</title>
        <link rel="stylesheet" href="helpstyle.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
      <div class="contact-form">
        <h1>        </h1>
        <div class="container">
            <div class="main">
                <div class="content">
                    <h2>Contact Us</h2>
                    <form method="post">
                        <input type="text" name="name" placeholder="Enter your name">
                        <input type="email" name="email" placeholder="Enter your Email id">
                        <textarea name="message" placeholder="Your message"></textarea>
            <button type="submit" name="submit"  class="btn">Send <i class='bx bxs-paper-plane'></i></button>
                    </form>
                </div>
                <div class="form-img">
                    <img src="./files/contact.jpg" alt="">
                </div>
            </div>
        </div>
      </div>





















        <script src="script.js"></script>
        
    </body>
</html>