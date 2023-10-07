<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/connection.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: userdashboard.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-Edge">
        <meta name="viewport" content="width-device-width,initial-scale=1.0">
        <title>Login</title>
        
        <link href="styles.css" media="screen, projection" rel="stylesheet" type="text/css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        
    </head>
    <body>
        <!--Header section-->
        

        <!--Login page-->
        <div class="wrapper">
            <span class="bg-animate"></span>
                <span class="bg-animate2"></span>
                <div class="form-box login">
                    <h2 class="animation" style="--i:0; --j:21;">Login</h2>
                    <form method="post">
                        <div class="input-box animation" style="--i:1; --j:22;">
                            <input type="email" required name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                            <label>Email</label>
                            <i class='bx bxs-envelope'></i>
                        </div>
                        <div class="input-box animation" style="--i:2; --j:23;">
                            <input type="password" required name="password" id="password">
                            <label>Password</label>
                            <i class='bx bxs-lock-alt'></i>
                        </div>
                        <button type="select" class="btn animation" style="--i:3; --j:24;">Login
                        </button>
                        
                        <div class="logreg-link animation" style="--i:4; --j:25;">
                            <a href="#">Forgot Password?</a>
                            <p>Don't have an account? <a href="#" class="register-link">Sign Up</a></p>
                        </div>
                    </form>
                </div>
                <div class="info-text login">
                    <h2 class="animation" style="--i:0; --j:20;">Welcome Back!</h2>
                    <p class="animation" style="--i:1; --j:21;">This is a parking space management system.</p>
                </div>
    
                <div class="form-box register">
                    <h2 class="animation" style="--i:17; --j:0;">Sign Up</h2>
                    <form action="./process-signup.php" method="post">
                        <div class="input-box animation" style="--i:18; --j:1;">
                            <input type="text" required name="username">
                            <label>Username</label>
                            <i class='bx bxs-user' ></i>
                        </div>
                        <div class="input-box animation" style="--i:19; --j:2;">
                            <input type="text" required name="email">
                            <label>Email</label>
                            <i class='bx bxs-envelope'></i>
                        </div>
                        <div class="input-box animation" style="--i:20; --j:3;">
                            <input type="password" required name="password">
                            <label>Password</label>
                            <i class='bx bxs-lock-alt'></i>
                        </div>
                        <button type="submit" class="btn animation" style="--i:21; --j:4;">Sign Up</button>
                        <div class="logreg-link animation" style="--i:22; --j:5;">
                       
                            <p>Already have an account? <a href="#" class="login-link">Login</a></p>
                        </div>
                    </form>
                </div>
                <div class="info-text register">
                    <h2 class="animation" style="--i:17; --j:0">Welcome Back!</h2>
                    <p class="animation" style="--i:18; --j:1">This is a parking space management system.</p>
                </div>

        </div>
        

        <script src="script.js"></script>
    </body>
</html>