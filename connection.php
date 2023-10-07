<?php 
//admin login page connection
$con=mysqli_connect("localhost","root","","adminlogin");

if(mysqli_connect_error())
{
    echo "Cannot connect";
}

//user signin page connection
$host="localhost";
$dbname="vehicle-parking-db";
$username="root";
$password="";
$mysqli=new mysqli($host,$username,$password,$dbname);

if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;

?>